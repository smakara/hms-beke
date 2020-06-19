@include('includes.header')
@include('includes.sidebar')

<style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
</style>
<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">
            <a >System Reports</a>
        </li>

        <!-- Breadcrumb Menu-->
        <li class="breadcrumb-menu d-md-down-none">

        </li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> System Reports
                            <div class="card-header-actions">

                            </div>
                        </div>
                        <div class="card-body">
                            <p>
                                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Reports By Diagnosis</a>

                            </p>
                            <p>
                                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExamplePendingDonations" aria-expanded="false" aria-controls="collapseExample">Reports By Donations</a>

                            </p>
                            <p>
                                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExamplepatientstatus" aria-expanded="false" aria-controls="collapseExample">Reports By Patient Status</a>

                            </p>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                   
                                    <div id="container" style="width: 100%;">
                                        <canvas id="canvas"></canvas>
                                    </div>

                                </div>
                            </div>
                            <div class="collapse" id="collapseExamplePendingDonations">
                                <div class="card card-body">
                                <table class="table  table-striped  table-responsive-sm table-hover table-outline mb-0">

                                    <tbody>

                                        @foreach($donations as $data)
                                        <tr>
                                            <td class="text-justify">
                                                <a>{{$data->don_title}} </a>
                                            </td>
                                            <td class="text-justify">
                                                <a > {{$data->count}}</a>
                                            </td>
                                        </tr>

                                        @endforeach

                                            <tr  bgcolor="pink">
                                                <td class="text-justify">
                                                    <a>Total Donations  </a>
                                                </td>
                                                <td class="text-justify">
                                                    <a > {{$totaldonations}}</a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                   

                                </div>
                            </div>
                            <div class="collapse" id="collapseExamplepatientstatus">
                                <div class="card card-body">
                                <table class="table  table-striped  table-responsive-sm table-hover table-outline mb-0">

                                    <tbody>

                                        @foreach($reportpatientstatus as $data)
                                        <tr>
                                            <td class="text-justify">
                                                <a>{{$data->pat_status}} </a>
                                            </td>
                                            <td class="text-justify">
                                                <a > {{$data->count}}</a>
                                            </td>
                                        </tr>

                                        @endforeach

                                            <tr  bgcolor="pink">
                                                <td class="text-justify">
                                                    <a>Total Donations  </a>
                                                </td>
                                                <td class="text-justify">
                                                    <a > {{$totalpatward}}</a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                   

                                </div>
                            </div>


                        </div>
                    </div>

                </div>
                <div class="col-sm-12 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> System Reports
                            <small>By Status</small>
                        </div>
                        <div class="card-body">
                            <div id="accordion" role="tablist">
                                <div class="card mb-0">
                                    <div class="card-header" id="headingOne" role="tab">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Report By Ward</a>
                                        </h5>
                                    </div>
                                    <div class="collapse show" id="collapseOne" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <table class="table  table-striped  table-responsive-sm table-hover table-outline mb-0">

                                                <tbody>

                                                    @foreach($pat_ward as $data)
                                                    <tr>
                                                        <td class="text-justify">
                                                            <a>{{$data->pat_ward}} </a>
                                                        </td>
                                                        <td class="text-justify">
                                                            <a > {{$data->count}}</a>
                                                        </td>
                                                    </tr>

                                                    @endforeach

                                                    <tr  bgcolor="pink">
                                                        <td class="text-justify">
                                                            <a>Total Patients  </a>
                                                        </td>
                                                        <td class="text-justify">
                                                            <a > {{$totalpatward}}</a>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-0">
                                    <div class="card-header" id="headingTwo" role="tab">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Report by Referral </a>
                                        </h5>
                                    </div>
                                    <div class="collapse" id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">

                                            <table class="table  table-striped  table-responsive-sm table-hover table-outline mb-0">

                                                <tbody>

                                                    @foreach($referredby as $data)
                                                    <tr>
                                                        <td class="text-justify">
                                                            <a>{{$data->referredby}} </a>
                                                        </td>
                                                        <td class="text-justify">
                                                            <a > {{$data->count}}</a>
                                                        </td>
                                                    </tr>

                                                    @endforeach

                                                    <tr  bgcolor="pink">
                                                        <td class="text-justify">
                                                            <a>Total Patients  </a>
                                                        </td>
                                                        <td class="text-justify">
                                                            <a > {{$totalpatward}}</a>
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

                </div>
            </div>
        </div>
    </div>
</main>

@include('includes.footer')