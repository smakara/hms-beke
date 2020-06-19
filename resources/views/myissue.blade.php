

@include('includes.header')
@include('includes.sidebar')


<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>

        <li class="breadcrumb-item active">Request</li>
        <!-- Breadcrumb Menu-->

    </ol>

    <br>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="card">
                <div class="card-body">


                    <div class="row">

                        <div   class="col-sm-12">
                            <div class="btn-group">
                                <button type="button" class="btn btn-success">Issue Status</button>
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{url('/close/'.$iss_id)}}">Rejected</a>
                                    </li>
                                    <li><a href="{{url('/pending/'.$iss_id)}}">Accepted</a>
                                    </li>


                                </ul>
                            </div>


                            <div class="btn-group" role="group">
                                <button class="btn btn-secondary dropdown-toggle" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Assign To</button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    @foreach($users as $data)


                                    <a class="dropdown-item" href="{{url('/assignto/'.$data->person_id."/".$iss_id)}}">{{$data->name}} {{$data->surname}}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>



                </div>

            </div>
        </div>
        <div class="row">

            <div class="col-sm-12 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Request
                        <small>Details</small>
                    </div>
                    <div class="card-body">
                        <div id="accordion" role="tablist">
                            <div class="card mb-0">
                                <div class="card-header" id="headingOne" role="tab">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Details</a>
                                    </h5>
                                </div>
                                <div class="collapse show" id="collapseOne" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                    <table class="table table-striped table-responsive-sm ">

                                        <tbody>
                                            <tr>
                                                <td>From</td>
                                                <td class="pull-right">{{$iss_from}}</td>

                                            </tr>
                                            <tr>
                                                <td>Assigned to</td>
                                                <td class="pull-right">{{$assignedto}}</td>

                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td class="pull-right"><span class="badge badge-danger">{{$iss_status}}</span></td>

                                            </tr>
                                            <tr>
                                                <td>Date    </td>
                                                <td class="pull-right">{{$iss_date}}</td>

                                            </tr>

                                            <tr>
                                                <td>Progess    </td>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                                                    </div>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>

            <div class="col-sm-12 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Request
                        <small>Description</small>
                    </div>
                    <div class="card-body">
                        <div id="accordion" role="tablist">
                            <div class="card mb-0">
                                <div class="card-header" id="headingOne" role="tab">
                                    <h5 class="mb-0" >
                                        <a style="color: red" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Subject: {{$subject}}</a>
                                    </h5>
                                </div>
                                <div class="collapse show" id="collapseOne" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                    <textarea class="form-control" id="textarea-input" name="textarea-input" rows="9"  placeholder="Content..">{{$iss_desc}}</textarea>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</main>

@include('includes.footer')