$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


//========================Global Variables===========================
var studentNumber_empno = "";
var billArray = new Array();
var globalBalance = "";
var canteenmealid = "";
var canteenmealname = "";
var dynamicBalance = 0;
var currentBalance = 0;
var globalDate = "";
var userid = "";

$(document).ready(function () {


    $('#calendarr').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        dayClick: function (date, jsEvent, view) {

            $("#example-modal").modal('show');
            globalDate = date.format();
        },
        eventClick: function (calEvent, jsEvent, view) {

            alert('Event: ' + calEvent.title);
            alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
            alert('View: ' + view.name);
            // change the border color just for fun
            $(this).css('border-color', 'red');
        },
        navLinks: true, // can click day/week names to navigate views
        selectable: true,
        selectHelper: true,
//            select: function(start, end) {
//            var title = prompt('Event Title:');
//            var eventData;
//            if (title) {
//            eventData = {
//            title: title,
//                    start: start,
//                    end: end
//            };
//            $('#calendarr').fullCalendar('renderEvent', eventData, true); // stick? = true
//            }
//            $('#calendarr').fullCalendar('unselect');
//            },
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        events: function (start, end, timezone, callback) {
            $.ajax({
                type: 'GET',
                url: 'getEvents',
                dataType: 'JSON',
                success: function (data) {
                    var events = [];
//                $(doc).find('event').each(function() {
//                    events.push({
//                        title: $(this).attr('title'),
//                        start: $(this).attr('start') // will be parsed
//                    });
//                });
                    $.each(data.events, function (key, value) {
                        events.push({
                            title: value.description,
                            start: value.date // will be parsed
                        });
                    });
                    callback(events);
                }
            });
        }
    });
    $("#addEventLink").on('click', function () {

        $('#addEvent').modal('show');
        $("#example-modal").modal('hide');
    });
});

$("#btnsaveEvent").on('click', function () {


    var event = $('#event').val();
    var locale = $('#locale').val();


    alert(globalDate);
    $.ajax({
        type: 'POST',
        url: '/addEvents',
        dataType: 'JSON',
        data: {event: event, locale: locale, date: globalDate},
        success: function (data) {
            $('#addEvent').modal('hide');
//               
        }
    });


});




$("#selectedEvent").on('change', function () {

    var selectedEvent = $('#selectedEvent').find(":selected").text();
    $("#selectedrace option").remove();
    $.ajax({
        type: 'POST',
        url: '/getraces',
        dataType: 'JSON',
        data: {selectedEvent: selectedEvent},
        success: function (data) {
            $.each(data.races, function (index, value) { // Iterates through a collection
                $('#selectedrace').append("<option>" + value.race_description + "</option>");
                console.log(data);
            });


//               
        }
    });


});


$("#btneditprofile").on('click', function () {


    var firstname = $('#pfirstname').val();
    var surname = $('#psurname').val();
    var email = $('#pemail').val();
    var password = $('#p    password').val();

    var height = $('#height').val();
    var weight = $('#weight').val();
    var dob = $('#dob').val();
    var gender = $('#gender').val();

    $.ajax({
        type: 'POST',
        url: '/updateprofile',
        dataType: 'JSON',
        data: {userid: userid, firstname: firstname, surname: surname, email: email,
            password: password, height: height, weight: weight, dob: dob,gender:gender},
        success: function (data) {

            $("#editprofilemodal").modal('hide');

            console.log(data);
        }
    });

    console.log(data);
});



$("#editprofile").on('click', function () {


    $.ajax({
        type: 'POST',
        url: '/getprofile',
        dataType: 'JSON',
        success: function (data) {

            $('#pfirstname').val(data.firstname);
            $('#psurname').val(data.surname);
            $('#pemail').val(data.email);
            $('#ppassword').val(data.password);

            userid = data.userid;
            $('#height').val(data.Height);
            $('#weight').val(data.Weight);
            $('#dob').val(data.DOB);
            $("#editprofilemodal").modal('show');



        }
    });
});

