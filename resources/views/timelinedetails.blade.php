@include('includes.header')
@include('includes.sidebar')

<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">

    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> Issue
                            <small>Timeline</small>
                        </div>
                        <div class="card-body">
                            <div id="accordion" role="tablist">
                                <div class="card mb-0">
                                    <div class="card-header" id="headingOne" role="tab">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Issue history </a>
                                        </h5>
                                    </div>
                                    <div class="collapse show" id="collapseOne" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="container-fluid">
                                            <div class="animated fadeIn">
                                                <br>
                                                <div class="row">

                                                    @foreach($timeline as $data)
                                                    <div class="col-lg-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <i class="fa fa-align-justify"></i>{{$data->name}} {{$data->surname}}</div>
                                                            <div class="card-body">
                                                                <table class="table table-responsive-sm">
                                                                    <thead>

                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>Subject</td>
                                                                            <td>
                                                                                {{$data->iss_subject}}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Date</td>
                                                                            <td>
                                                                                {{$data->iss_date}}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>From </td>
                                                                            <td>
                                                                                {{$data->iss_from}}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>  Status  </td>
                                                                            <td>
                                                                                <span class="badge badge-success">{{$data->ih_status}}</span>
                                                                            </td>
                                                                        </tr>


                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <!-- /.row-->

                                                <!-- /.row-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
@include('includes.footer')