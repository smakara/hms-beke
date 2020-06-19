@include('includes.header')
@include('includes.sidebar0')

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
                                         <form action="{{url('createplage')}}" method="post">
                                        <input type="hidden" name="_donationid" value="{{$id}}" />
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                        <div class="row">

                                            <div class="form-group  col-sm-12">
                                                <input class="form-control" type="text" name="donorname" placeholder="full name" required="true" />
                                            </div>

                                               <div class="form-group  col-sm-12">
                                                <input class="form-control" type="email" name="donoremail" placeholder="email" required="true" />
                                            </div>

                                            <div class="form-group  col-sm-12">
                                                <input class="form-control" type="text" name="donorphone" placeholder="phonenumber" required="true" />
                                            </div>

                                             <div class="form-group  col-sm-12">
                                                 <textarea class="form-control" type="text" name="donordesc" placeholder="Description of your pledge" required="true" ></textarea>
                                            </div>
                                            </div>



                                        </div>

                                        <p>
                                            <button  class="btn btn-block btn-primary" type="submit"><i class="icon-plus"></i> Save </button>

                                        </p>

                                    </form>
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
