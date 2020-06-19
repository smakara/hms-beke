<div class="app-body">
    <div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('home')}}">
                        <i class="nav-icon icon-speedometer"></i> Dashboard
                    </a>
                </li>


                @if(Session::get('role')=='Administrator')
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/patients')}}">
                        <i class="nav-icon icon-drop"></i>All Patients</a>
                </li>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="nav-icon icon-puzzle"></i> Users</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/users')}}">
                                <i class="nav-icon icon-puzzle"></i> All Users</a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="nav-icon icon-cursor"></i> Reports</a>
                    <ul class="nav-dropdown-items">

                         <li class="nav-item">
                            <a class="nav-link" href="{{url('/reports')}}">
                                <i class="nav-icon icon-puzzle"></i> All Reports</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('docpatients')}}">
                        <i class="nav-icon icon-pie-chart"></i> Clinician's Portal</a>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link" href="{{url('hiopatients')}}">
                        <i class="nav-icon icon-pie-chart"></i> P.R.O's Portal</a>
                </li> -->

               <!--  <li class="nav-item">
                    <a class="nav-link" href="">
                        <i class="nav-icon icon-pie-chart"></i> NOK's Portal</a>
                </li>
 -->
                <li class="nav-item">
                    <a class="nav-link" href="{{url('donationsman')}}">
                        <i class="nav-icon icon-pie-chart"></i> Donations</a>
                </li>

                  <li class="nav-item">
                    <a class="nav-link" href="{{url('donations')}}">
                        <i class="nav-icon icon-pie-chart"></i>Donations Appeal</a>
                </li>


                @elseif(Session::get('role')=='HIO')

                <li class="nav-item">
                    <a class="nav-link" href="{{url('donationsman')}}">
                        <i class="nav-icon icon-pie-chart"></i> Donations</a>
                </li>

                  <li class="nav-item">
                    <a class="nav-link" href="{{url('donations')}}">
                        <i class="nav-icon icon-pie-chart"></i>Donation Appeals</a>
                </li>


                @elseif(Session::get('role')=='Doctor')
                <li class="nav-item">
                    <a class="nav-link" href="{{url('docpatients')}}">
                        <i class="nav-icon icon-pie-chart"></i> Clinician's Portal</a>
                </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/patients')}}">
                        <i class="nav-icon icon-drop"></i>All Patients</a>
                </li>

                @elseif(Session::get('role')=='Metron')


                <li class="nav-item">
                    <a class="nav-link" href="{{url('donationsman')}}">
                        <i class="nav-icon icon-pie-chart"></i> Donations</a>
                </li>

                  <li class="nav-item">
                    <a class="nav-link" href="{{url('donations')}}">
                        <i class="nav-icon icon-pie-chart"></i>View Donations</a>
                </li>

                @else

                  <li class="nav-item">
                    <a class="nav-link" href="{{url('donations')}}">
                        <i class="nav-icon icon-pie-chart"></i>View Donations</a>
                </li>

                @endif



                <li class="nav-item">
                    <a  class="nav-link" href="{{url('/')}}">
                        <i class="nav-icon icon-pie-chart"></i> Logout</a>
                </li>

            </ul>
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    </div>
