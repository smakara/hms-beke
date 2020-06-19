@include('includes.header')
@include('includes.sidebar')

<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="card">

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Approved Requests</div>
                        <div class="card-body">
                            <!-- /.row-->
                            <br>
                            <table class="table  table-striped  table-responsive-sm table-hover table-outline mb-0">

                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-justify">From</th>
                                        <th class="text-justify">Request</th>
                                        <th>Status</th>
                                        <th>Approved By</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($issues as $data)
                                    <tr>
                                        <td class="text-justify">
                                            <a>{{$data->iss_from}} </a>
                                        </td>
                                        <td class="text-justify">
                                            <a > {{$data->iss_subject}}</a>
                                        </td>
                                        <td class="text-justify">
                                            <a > {{$data->iss_status}}</a>
                                        </td>
                                        <td class="text-justify">
                                            <a >{{$data->name}} {{$data->surname}}- {{$data->role}}</a>
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