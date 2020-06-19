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
                
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Status Report</div>
                        <div class="card-body">
                            <!-- /.row-->
                            <br>
                            <table class="table  table-striped  table-responsive-sm table-hover table-outline mb-0">

                                <tbody>
                                    <tr>
                                        <td class="text-justify">
                                            <a>Total Number of Accepted Requests </a>
                                        </td>
                                        <td class="text-justify">
                                            <a > {{$accepted}}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-justify">
                                            <a>Total Number of Rejected Requests </a>
                                        </td>
                                        <td class="text-justify">
                                            <a > {{$rejected}}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-justify">
                                            <a>Total Number of Pending Requests </a>
                                        </td>
                                        <td class="text-justify">
                                            <a > {{$Pending}}</a>
                                        </td>
                                    </tr>
                                    <tr  bgcolor="pink">
                                        <td class="text-justify">
                                            <a>Total Number of Requests </a>
                                        </td>
                                        <td class="text-justify">
                                            <a > {{$issues}}</a>
                                        </td>
                                    </tr>

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