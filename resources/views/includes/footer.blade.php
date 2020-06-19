</div>
<footer class="app-footer">
    <div>
        <a href="https://coreui.io">CoreUI</a>
        <span>&copy; 2018 creativeLabs.</span>
    </div>
    <div class="ml-auto">
        <span>Powered by</span>
        <a href="https://coreui.io">CoreUI</a>
    </div>
</footer>


<!-- /.modal-->

<!-- /.modal-->
<div class="modal fade" id="primaryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create System User</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('adduser')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="card">
                        <div class="card-header">
                            <strong>Add</strong> User</div>
                        <div class="card-body">

                            <div class="row">

                                <div class="form-group  col-sm-6">
                                    <input class="form-control" id="name" type="text" name="name" placeholder="Enter name..">
                                </div>
                                <div class="form-group col-sm-6">
                                    <input class="form-control" id="surname" type="text" name="surname" placeholder="Enter surname..">
                                </div>
                                <div class="form-group  col-sm-6">
                                    <input class="form-control" id="username" type="text" name="username" placeholder="Enter username..">
                                </div>
                                <div class="form-group col-sm-6">
                                    <input class="form-control" id="password" type="text" name="password" placeholder="Enter password..">
                                </div>

                                <div class="form-group col-sm-12">
                                    <select name="role" class="form-control" id="ccmonth">
                                        <option value="HIO">P.R.O</option>
                                        <option value="Doctor">Clinician</option>
                                        <!-- <option value="Metron">Metron</option> -->

                                        <option value="Administrator">Administrator</option>

                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        <button  type="submit" class="btn btn-primary" type="button">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content-->
        </div>
        <!-- /.modal-dialog-->
    </div>
</div>
<!-- /.modal-->


<!-- /.modal-->
<div class="modal fade" id="donationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Donation </h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('createdonations')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="card">
                        <div class="card-header">
                            <strong>Add</strong> Item</div>
                        <div class="card-body">

                            <div class="row">

                                <div class="form-group  col-sm-12">
                                    <input class="form-control"  type="text" name="dontittle" placeholder="Enter Title..">
                                </div>

                                <div class="form-group col-sm-12" rows="6">
                                    <textarea class="form-control"  type="text" name="dondesc" placeholder="Desscription.."> </textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        <button  type="submit" class="btn btn-primary" type="button">Save </button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content-->
        </div>
        <!-- /.modal-dialog-->
    </div>
</div>
<!-- /.modal-->

<!-- /.modal-->
<div class="modal fade" id="patientModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-warning" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Patient</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('savepatientdetails')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="card">
                        <div class="card-header">
                            <strong>New</strong> Patient Details</div>
                        <div class="card-body">

                            <div class="row">

                                <div class="form-group  col-sm-12">
                                    <input class="form-control"  type="text" name="pname" placeholder="Type the name..">
                                </div>
                                <div class="form-group  col-sm-12">
                                    <input class="form-control"  type="text" name="psurname" placeholder="Type the surname..">
                                </div>
                                <div class="form-group  col-sm-12">
                                    <input class="form-control"  type="date" name="pdob" placeholder="Type the dob..">
                                </div>

                                <div class="form-group  col-sm-12">
                                    <input class="form-control"  type="text" name="preferral" placeholder="Patient Address..">
                                </div>



                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <strong>New</strong> Next of Kin Details</div>
                        <div class="card-body">

                            <div class="row">

                                <div class="form-group  col-sm-12">
                                    <input class="form-control"  type="text" name="nokname" placeholder="Type the nok name..">
                                </div>
                                <div class="form-group  col-sm-12">
                                    <input class="form-control"  type="text" name="noksurname" placeholder="Type the nok surname..">
                                </div>
                                <div class="form-group  col-sm-12">
                                    <input class="form-control"  type="text" name="nokphone" placeholder="Type the phone..">
                                </div>


                                <div class="form-group col-sm-12">
                                    <textarea class="form-control"  type="text" name="paddress" placeholder="Adress.."></textarea>
                                </div>


                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header">
                            <strong>NOK</strong> Login Credentials</div>
                        <div class="card-body">

                            <div class="row">

                                <div class="form-group  col-sm-12">
                                    <input class="form-control"  type="text" name="nokusername" placeholder="Type the nok login username..">
                                </div>
                                <div class="form-group  col-sm-12">
                                    <input class="form-control"  type="text" name="nokpassword" placeholder="Type the nok login password..">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <strong>Admission</strong>  Details</div>
                        <div class="card-body">

                            <div class="row">
                                <div class="form-group  col-sm-12">
                                    <input class="form-control"  type="text" name="pdiag" placeholder="Type the patient's Diagnosis..">
                                </div>

                                <div class="form-group  col-sm-12">
                                    <select name="pward" class="form-control" id="ccmonth">
                                        <option value="St Marrys wards">St Marrys ward</option>
                                        <option value="Khumalo ward">Khumalo ward</option>
                                        <option value="Mambo ward">Mambo Ward</option>
                                        <option value="JW Villa">JW Villa ward</option>
                                        <option value="Dowson ward">Dowson ward</option>
                                        <option value="Mzilikazi ward">Mzilikazi ward</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        <button  type="submit" class="btn btn-primary" type="button">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content-->
        </div>
        <!-- /.modal-dialog-->
    </div>
</div>
<!-- /.modal-->





<!-- /.modal-->
<div class="modal fade" id="requestmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Request</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('compose')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="card">
                        <div class="card-header">
                            <strong>New</strong> Request</div>
                        <div class="card-body">

                            <div class="row">

                                <div class="form-group  col-sm-12">
                                    <input class="form-control" id="issuesubject" type="text" name="issuesubject" placeholder="Type the subject..">
                                </div>
                                <div class="form-group col-sm-12">
                                    <textarea class="form-control" id="iss_desc" type="text" name="iss_desc" placeholder="Description.."></textarea>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        <button  type="submit" class="btn btn-primary" type="button">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content-->
        </div>
        <!-- /.modal-dialog-->
    </div>
</div>
<!-- /.modal-->

<!-- CoreUI and necessary plugins-->
<script src="{{asset('template/vendors/jquery/js/jquery.min.js')}}"></script>
<script src="{{asset('template/vendors/popper.js/js/popper.min.js')}}"></script>
<script src="{{asset('template/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('template/vendors/pace-progress/js/pace.min.js')}}"></script>
<script src="{{asset('template/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('template/vendors/@coreui/coreui/js/coreui.min.js')}}"></script>
<!-- Plugins and scripts required by this view-->
<script src="{{asset('template/vendors/chart.js/js/Chart.min.js')}}"></script>
<script src="{{asset('template/vendors/@coreui/coreui-plugin-chartjs-custom-tooltips/js/custom-tooltips.min.js')}}"></script>
<script src="{{asset('template/js/main.js')}}"></script>
<script src="{{asset('template/pointofsale.js')}}"></script>



<script src="{{asset('template/Chart.min.js')}}"></script>
<script src="{{asset('template/utils.js')}}"></script>

<script>
var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
var color = Chart.helpers.color;


window.onload = function () {

    $.ajax({
        type: 'GET',
        url: 'reports2',
        dataType: 'JSON',
        success: function (doc) {
            var labelsdata = [];
            var graphdata = [];

            console.log(doc.pat_diagnosis);
            $.each(doc.pat_diagnosis, function (key, value) {

                labelsdata.push(value.pat_diagnosis);
                graphdata.push(value.count);
//        events.push({
//        title: value.booking_patientNumber,
//                start: value.booking_startDate // will be parsed
//        });
            });

            var barChartData = {

                labels: labelsdata,
                datasets: [{
                        label: 'Diagnosis',
                        backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                        borderColor: window.chartColors.red,
                        borderWidth: 1,
                        data: graphdata
                    }]

            };

            var ctx = document.getElementById('canvas').getContext('2d');
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Diagnosis Report'
                    }
                }
            });

        }
    });

};
var colorNames = Object.keys(window.chartColors);
document.getElementById('addDataset').addEventListener('click', function () {
    var colorName = colorNames[barChartData.datasets.length % colorNames.length];
    var dsColor = window.chartColors[colorName];
    var newDataset = {
        label: 'Dataset ' + (barChartData.datasets.length + 1),
        backgroundColor: color(dsColor).alpha(0.5).rgbString(),
        borderColor: dsColor,
        borderWidth: 1,
        data: []
    };
    for (var index = 0; index < barChartData.labels.length; ++index) {
        newDataset.data.push(randomScalingFactor());
    }

    barChartData.datasets.push(newDataset);
    window.myBar.update();
});






</script>

</body>
</html>
