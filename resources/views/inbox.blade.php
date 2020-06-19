@include('includes.header')
@include('includes.sidebar')

<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">
            <a href="{{url('/allrequests')}}">My Requests</a>
        </li>

    </ol>
    

    <div class="container-fluid">
        <div class="animated fadeIn">

            <div class="row">
                <div class="col-md-12">
                     <div class="card">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-md-2 ">
                            <button class="btn btn-block btn-primary" type="button" data-toggle="modal" data-target="#requestmodal"><i class="icon-plus"></i> Open Request</button>
                        </div>
                       
                    </div>
                    
                </div>
            </div>
                    <div class="card">
                        <div class="card-header">My Inbox</div>
                        <div class="card-body">
                            <!-- /.row-->
                            <br>
                            <table class="table table-responsive-sm table-hover table-outline mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th class="text-center">
                                            <i class="icon-people"></i>
                                        </th>

                                        <th>From</th>
                                        <th>Subject</th>
                                        <th></th>
                                        <th class="text-center"></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($issues as $data)
                                    <tr>
                                        <td class="text-center">
                                            <a href="{{url('/myissue_admin/'.$data->iss_id)}}"> {{$data->iss_id}}</a>
                                        </td>
                                        <td class="text-center">
                                            <div class="avatar">
                                                <img class="img-avatar" src="{{asset('template/img/avatars/5.jpg')}}" alt="admin@bootstrapmaster.com">
                                                <span class="avatar-status badge-success"></span>
                                            </div>
                                        </td>
                                        <td>
                                            {{$data->iss_from}}
                                        </td>
                                        <td>
                                            <div> <strong>{{$data->iss_subject}}</strong></div>
                                            <div class="small text-muted">
                                                <span  class="label bg-danger">Assigned to</span> | {{$data->name}} {{$data->surname}}</div>
                                        </td>

                                        <td>
                                            <div class="clearfix">
                                                <div class="pull-left">
                                                    <small class="text-muted"> Issue Progress</small>
                                                </div>

                                            </div>

                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            {{$data->iss_date}}
                                        </td>
                                        <td class="text-center">
                                            <div class="pull-right">

                                                <span class="label bg-green"> {{$data->iss_status}}</span>
                                            </div>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.col-->
            </div>
            <!-- /.row-->
        </div>
    </div>
</main>

@include('includes.footer')