@include('includes.header')
@include('includes.sidebar')

<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">
            <a >Patient Details</a>
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
                            <i class="fa fa-align-justify"></i> Patient Details
                            <div class="card-header-actions">

                            </div>
                        </div>
                        <div class="card-body">
                            <p>
                                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Click to view Details</a>
                                <!--<a class="btn btn-primary" data-toggle="collapse" href="#collapseExampleward" aria-expanded="false" aria-controls="collapseExample">Update Patient Ward</a>-->
                            </p>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">

                                    <table class="table table-responsive-sm  table-borderless table-striped table-outline mb-0">
                                        <thead class="thead-light">

                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>
                                                    Patient Number
                                                </td>

                                                <td>
                                                    {{$pat->id}} 
                                                </td>

                                            </tr>

                                            <tr>
                                                <td >
                                                    Name
                                                </td>

                                                <td>
                                                    {{$pat->name}} {{$pat->surname}}
                                                </td>

                                            </tr>   

                                            <tr>
                                                <td >
                                                    Pataient Status
                                                </td>

                                                <td>
                                                    {{$pat->pat_status}} 
                                                </td>

                                            </tr>   

                                            <tr>
                                                <td >
                                                    Referred by
                                                </td>

                                                <td>
                                                    {{$pat->referredby}} 
                                                </td>

                                            </tr>   

                                            <tr>
                                                <td >
                                                    Date Created
                                                </td>

                                                <td>
                                                    {{$pat->pat_date}}  
                                                </td>

                                            </tr>   


                                            <tr>
                                                <td >
                                                    Ward
                                                </td>

                                                <td>
                                                    {{$pat->pat_ward}}  
                                                </td>

                                            </tr>   


                                        </tbody>
                                    </table>

                                </div>
                            </div>

                            <div class="collapse" id="collapseExampleward">
                                <div class="card card-body">

                                    <form action="{{url('updateward')}}" method="post">
                                        <input type="hidden" name="_patientid" value="{{$pat->id}}" />
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                        <div class="row">

                                            <div class="form-group  col-sm-12">
                                                <select name="puward" class="form-control" id="ccmonth">
                                                    <option value="Juvenile">Juvenile  Ward</option>
                                                    <option value="Mambo">Mambo Ward</option>
                                                    <option value="Villa">Villa</option>
                                                    <option value="Dowson">Dowson</option>
                                                    <option value="Mzilikhazi">Mzilikhazi</option>

                                                </select>
                                            </div>



                                        </div>

                                        <p>
                                            <button  class="btn btn-block btn-primary" type="submit"><i class="icon-plus"></i> Update Status</button>

                                        </p>

                                    </form>

                                </div>


                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-12 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> Patient Details
                            <small>accordion</small>
                        </div>
                        <div class="card-body">
                            <div id="accordion" role="tablist">
                                <div class="card mb-0">
                                    <div class="card-header" id="headingOne" role="tab">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Next Of Kin</a>
                                        </h5>
                                    </div>
                                    <div class="collapse show" id="collapseOne" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <table class="table table-responsive-sm  table-borderless table-striped table-outline mb-0">
                                                <thead class="thead-light">

                                                </thead>
                                                <tbody>



                                                    <tr>
                                                        <td >
                                                            Name
                                                        </td>

                                                        <td>
                                                            {{$pat->nok_name}} {{$pat->nok_surname}}
                                                        </td>

                                                    </tr>   

                                                    <tr>
                                                        <td >
                                                            NOK Phone
                                                        </td>

                                                        <td>
                                                            {{$pat->nok_phone}} 
                                                        </td>

                                                    </tr>   

                                                    <tr>
                                                        <td >
                                                            NOK Address
                                                        </td>

                                                        <td>
                                                            {{$pat->nok_address}} 
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
                                            <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Current Medical Assessment</a>
                                        </h5>
                                    </div>
                                    <div class="collapse" id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            <table class="table table-responsive-sm  table-borderless table-striped table-outline mb-0">
                                                <thead class="thead-light">

                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td >
                                                            Examination Date
                                                        </td>

                                                        <td>
                                                            {{$pat->pat_date}}
                                                        </td>

                                                    </tr>   

                                                    <tr>
                                                        <td >
                                                            Doctor/Nurse
                                                        </td>

                                                        <td>
                                                            {{$pat->pa_doctor}}
                                                        </td>

                                                    </tr>   

                                                    <tr>
                                                        <td >
                                                            Temperature
                                                        </td>

                                                        <td>
                                                            {{$pat->pa_temp}} 
                                                        </td>

                                                    </tr>   

                                                    <tr>
                                                        <td >
                                                            Weight
                                                        </td>

                                                        <td>
                                                            {{$pat->pat_weight}} 
                                                        </td>

                                                    </tr>   

                                                </tbody>
                                            </table>
                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                    <textarea class="form-control"  disabled="true" rows="5" placeholder="{{$pat->pat_presc}}"  ></textarea>
                                                </div>

                                                <div class="form-group col-sm-12">
                                                    <textarea class="form-control"  disabled="true"  rows="5" placeholder="{{$pat->pat_notes}}"  ></textarea>
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
        </div>
    </div>
</main>

@include('includes.footer')