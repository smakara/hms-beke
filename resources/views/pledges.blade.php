@include('includes.header')
@include('includes.sidebar')

<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">
            <a >Pledge Details</a>
        </li>

        <!-- Breadcrumb Menu-->
        <li class="breadcrumb-menu d-md-down-none">

        </li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-sm-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> Donor's Details
                            <small>accordion</small>
                        </div>
                        <div class="card-body">
                            <div id="accordion" role="tablist">
                                <div class="card mb-0">
                                    <div class="card-header" id="headingOne" role="tab">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Donor's Details</a>
                                        </h5>
                                    </div>
                                    <div class="collapse show" id="collapseOne" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <table class="table table-responsive-sm  table-borderless table-striped table-outline mb-0">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>
                                                            Full Name
                                                        </th>


                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th >Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>




                                                    @foreach($pledges as $data)
                                                    <tr>
                                                        <td >
                                                            {{$data->p_fullname}}
                                                        </td>

                                                        <td>
                                                            {{$data->p_email}}
                                                        </td>

                                                        <td>
                                                            {{$data->p_phone}}
                                                        </td>

                                                        <td>
                                                            {{$data->p_date}}
                                                        </td>

                                                    </tr>   

                                                    @endforeach

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