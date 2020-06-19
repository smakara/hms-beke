@include('includes.header')
@include('includes.sidebar')

<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">
            <a href="{{url('/allrequests')}}">Users</a>
        </li>

    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="card">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-md-2 ">
                            <button class="btn btn-block btn-primary" type="button" data-toggle="modal" data-target="#primaryModal"><i class="icon-plus"></i> Add User</button>
                        </div>

                    </div>

                </div>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">All Users</div>
                        <div class="card-body">
                            <!-- /.row-->
                            <br>
                            <table class="table  table-striped  table-responsive-sm table-hover table-outline mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>


                                        <th class="text-center">Name</th>
                                        <th>Surname</th>

                                        <th>Username</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $data)
                                    <tr>
                                        <td class="text-center">
                                            <a > {{$data->id}}</a>
                                        </td>
                                        <td class="text-center">
                                            <a > {{$data->name}}</a>
                                        </td>

                                        <td>
                                            {{$data->surname}}
                                        </td>
                                          <td>
                                            {{$data->username}}
                                        </td>
                                        @if($data->role=="HIO")
                                        <td>P.R.O
                                        </td>
                                        @else
                                         <td>
                                            {{$data->role}}
                                        </td>
                                        @endif
                                        <td>


                                            <a class="btn btn-default"  onclick="edituser('{{$data->person_id}}','{{$data->role}}','{{$data->name}}','{{$data->surname}}','{{$data->password}}','{{$data->username}}','{{ csrf_token() }}');"><i class="fa fa-pencil"></i></a>
                                            <a class="btn btn-danger" href="{{url('/deleteuser/'.$data->person_id)}}"><i class="fa fa-trash"></i></a>
                                        </td>
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
<!-- /.modal-->
<div class="modal fade" id="edituserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit System User</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('edituser')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <input type="hidden" id="person_id" name="person_id" value="" />
                    <div class="card">
                        <div class="card-header">
                            <strong>Add</strong> User</div>
                        <div class="card-body">

                            <div class="row">

                                <div class="form-group  col-sm-6">
                                    <input class="form-control" id="ename" type="text" name="ename"  placeholder="Enter name..">
                                </div>
                                <div class="form-group col-sm-6">
                                    <input class="form-control" id="esurname" type="text" name="esurname"  placeholder="Enter surname..">
                                </div>
                                <div class="form-group  col-sm-6">
                                    <input class="form-control" id="eusername" type="text" name="eusername" placeholder="Enter username..">
                                </div>
                                <div class="form-group col-sm-6">
                                    <input class="form-control" id="epassword" type="text" name="epassword" placeholder="Enter password..">
                                </div>

                                <div class="form-group col-sm-12">
                                    <input class="form-control" id="erole" type="text" name="erole" placeholder="role">
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

<script type="text/javascript">
    function edituser (person_id, role, name, surname, password, username, token){
    $('#person_id').val(person_id);
    $('#erole').val(role);
    $('#ename').val(name);
    $('#esurname').val(surname);
    $('#epassword').val(password);
    $('#eusername').val(username);
    $('#edituserModal').modal('show');
    }
</script>

@include('includes.footer')