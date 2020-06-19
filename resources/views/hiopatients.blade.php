@include('includes.header')
@include('includes.sidebar')

<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">
            <!--<a href="{{url('/allrequests')}}">Health Information Officers's Portal - All Requests</a>-->
        </li>

    </ol>
    

    <div class="container-fluid">
        <div class="animated fadeIn">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Public Relations Officer </div>
                        <div class="card-body">
                            <!-- /.row-->
                            
                             <div class="row ">
                       

                    </div>
                            <br>
                            <table class="table table-responsive-sm table-hover table-outline mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                      

                                        <th>Patient</th>
                                        <th>Details</th>
                                        <th >Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($issues as $data)
                                    <tr>
                                        <td class="text-center">
                                            <a href="{{url('/hiopatientdetails/'.$data->pat_person_id)}}"> {{$data->pat_person_id}}</a>
                                        </td>
                                      
                                        <td>
                                           {{$data->name}} {{$data->surname}}
                                        </td>
                                        <td>
                                            <div> <strong>{{$data->pat_ward}}</strong></div>
                                            <div class="small text-muted">
                                                <span  class="label bg-danger">Referred By</span> {{$data->referredby}}</div>
                                        </td>

                                       
                                       
                                        <td >
                                            <div >

                                                <span class="label bg-green"> {{$data->pat_status}}</span>
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