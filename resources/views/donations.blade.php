@include('includes.header')
@include('includes.sidebar0')


<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">

        <li class="breadcrumb-item active">Donations Dashboard</li>
        <!-- Breadcrumb Menu-->

    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">


            <div class="row">

                @foreach($donations as $data)
                <div class="col-sm-6 col-md-4">
                    <div class="card">
                        <div class="card-header"> <a href="{{url('dpledges/' . $data->don_id)}}"> {{$data->don_title}}</a>

                        </div>
                        <div class="card-body">{{$data->don_desc}}</div>
                    </div>
                </div>
                <!-- /.col-->
                @endforeach
                <!-- /.col-->
            </div>
            <!-- /.row-->

            <!-- /.row-->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Modal title</h4>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>One fine body…</p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" type="button">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content-->
                </div>
                <!-- /.modal-dialog-->
            </div>
        </div>
    </div>
</main>
@include('includes.footer')
