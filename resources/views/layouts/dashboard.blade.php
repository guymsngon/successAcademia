<!DOCTYPE html>
<html>

<!-- Mirrored from thememakker.com/templates/swift/hospital/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 05 Sep 2020 22:29:00 GMT -->
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>E-Learning</title>
<link rel="icon" href="admin/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="{{asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css')}}"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" type="text/css">
<link rel="stylesheet" href="{{asset('admin/assets/plugins/morrisjs/morris.css')}}"/>
<link rel="stylesheet" href="{{asset('admin/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}"/>
<link rel="stylesheet" href="{{asset('admin/assets/plugins/waitme/waitMe.css')}}" />
<link rel="stylesheet" href="{{asset('admin/assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>

<!-- Custom Css -->
<link rel="stylesheet" href="{{asset('admin/assets/css/main.css')}}"/>
</head>

<body class="theme-cyan">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-cyan">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- #Float icon -->

<ul id="f-menu" class="mfbc-br mfb-zoomin" data-mfb-toggle="hover">
    <li class="mfbc_wrap">
        <a href="javascript:void(0);" class="mfbcb-main g-bg-cyan">
            <i class="mfbcm-icon-resting zmdi zmdi-plus"></i>
            <i class="mfbcm-icon-active zmdi zmdi-close"></i>
        </a>
        <ul class="mfbc_list">
            <li><a href="#" data-mfb-label="Doctor Schedule" class="mfb-child bg-blue"><i class="zmdi zmdi-calendar mfbc_icon"></i></a></li>
            <li><a href="#" data-mfb-label="Patients List" class="mfb-child bg-orange"><i class="zmdi zmdi-account-o mfbc_icon"></i></a></li>
            <li><a href="#" data-mfb-label="Payments" class="mfb-child bg-purple"><i class="zmdi zmdi-balance-wallet mfbc_icon"></i></a></li>
        </ul>
    </li>
</ul>


<!-- Top Bar -->
<nav class="navbar clearHeader">
    <div class="col-12">
        <div class="navbar-header"> <a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand" href="{{route('home')}}">{{(App\Establishment::find(auth()->user()->id_school))->name}}</a> </div>
        <ul class="nav navbar-nav navbar-right">
            <!-- Notifications -->
            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-notifications"></i> <span class="label-count"></span> </a>
                
            </li>
            <!-- #END# Notifications --> 
            <!-- Tasks -->
            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-flag"></i><span class="label-count"></span> </a>
                
            </li>
            <!-- #END# Tasks -->
            <li><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings"></i></a></li>
        </ul>
    </div>
</nav>
<!-- #Top Bar -->
<section> 
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar"> 
        <!-- User Info -->
        <div class="user-info">
            <div class="admin-image"> <img src="{{asset('admin/assets/images/user-demo.png')}}" alt=""> </div>
            <div class="admin-action-info"> <span>Welcome</span>
                <h3>{{auth()->user()->first_name}} {{auth()->user()->last_name}}</h3>
                <ul>
                    <li><a href="{{route('users.show',auth()->user()->id)}}" title="Go to Profile"><i class="zmdi zmdi-account"></i></a></li>
                    <li><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings"></i></a></li>
                    <li><a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit()"; title="sign out" ><i class="zmdi zmdi-sign-in"></i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <!-- #User Info --> 
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active open"><a href="index-2.html"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                @if(auth()->user()->role == 'ADM')
                <li class="header">ADMINISTRATOR</li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Manage Systeme</span> </a>
                    <ul class="ml-menu">
                        <li><a href="{{route('users.index')}}">Users Accounts</a></li>
                        <li><a href="{{route('school.index')}}">Establishments</a></li>
                    </ul>
                </li>
                @endif
                @if(auth()->user()->role == 'HEAD')
                <li class="header">HEAD OF INSTITUTE</li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Manage Institute</span> </a>
                    <ul class="ml-menu">
                        <li><a href="{{route('school.index')}}">School Setting</a></li>
                        <li><a href="{{route('supervisor')}}">Supervisor</a></li>
                        <li><a href="{{route('teachter')}}">Teachers</a></li>
                    </ul>
                </li>
                @endif
                @if(auth()->user()->role == 'HEAD' || auth()->user()->role == 'SUP')
                <li class="header">SUPERVISOR</li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Manage Branches</span> </a>
                    <ul class="ml-menu">
                        <li><a href="{{route('branches.index')}}">List All Branches</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Manage Classes</span> </a>
                    <ul class="ml-menu">
                        <li><a href="{{route('classes.index')}}">List All Classes</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Manage Courses</span> </a>
                    <ul class="ml-menu">
                        <li><a href="{{route('courses.index')}}">List All Courses</a></li>
                        <li><a href="{{route('class_courses.index')}}">Assign Course Class</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Manage Teachers</span> </a>
                    <ul class="ml-menu">
                        <li><a href="{{route('teacher_courses.index')}}">Assign Course Teachers</a></li>
                        <li><a href="{{route('users.index')}}">Consulte Statistiques Teachers</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Manage Students</span> </a>
                    <ul class="ml-menu">
                        <li><a href="{{route('student')}}"> Create Students</a></li>
                        <li><a href="{{route('class_user_index')}}">Assign Class Student</a></li>
                        <li><a href="{{route('users.index')}}">Consulte Statistiques</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account"></i><span>Time Table</span> </a>
                    <ul class="ml-menu">
                        <li><a href="#" data-toggle="modal" data-target="#largeModal1">Upload Time Table</a></li>
                    </ul>
                </li>
                @endif
                <li> <a href="javascript:void(0);"><i ></i><span></span> </a> </li>
                <li> <a href="javascript:void(0);"><i ></i><span></span> </a> </li>
                <li> <a href="javascript:void(0);"><i ></i><span></span> </a> </li>
            </ul>
        </div>
    </aside>
</section>
<div class="modal fade" id="largeModal1" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md">
        <form action="{{route('upload')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="largeModal1Label">Upload Time Table</h4>
                </div>
                <div class="modal-body"> 
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="">Select Classes</label>
                                    <select class="form-control"  name="classe" id="">
                                        @foreach($classes as $classe)
                                            <option value="{{$classe->id}}">{{$classe->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Select Time Table</label>
                                <div class="form-line">
                                    <input class="form-control" type="file" name="file" id="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-link waves-effect">UPLOAD</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </form>
    </div>
</div>

@yield('content')

<div class="color-bg"></div>
<!-- Jquery Core Js --> 
<script src="{{asset('admin/assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('admin/assets/bundles/vendorscripts.bundle.js')}}"></script>

<script src="{{asset('admin/assets/bundles/chartscripts.bundle.js')}}"></script>
<script src="{{asset('admin/assets/bundles/sparklinescripts.bundle.js')}}"></script>

<script src="{{asset('admin/assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('admin/assets/js/pages/index.js')}}"></script>
<script src="{{asset('admin/assets/js/pages/charts/sparkline.min.js')}}"></script>
<script src="{{asset('admin/assets/js/pages/forms/basic-form-elements.js')}}"></script>
<script src="{{asset('admin/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
<script src="{{asset('admin/assets/plugins/dropzone/dropzone.js')}}"></script>
<script src="{{asset('admin/assets/plugins/momentjs/moment.js')}}"></script>
<script src="{{asset('admin/assets/plugins/autosize/autosize.js')}}"></script>
<script src="{{asset('admin/assets/js/pages/ui/modals.js')}}"></script> 
</body>

<!-- Mirrored from thememakker.com/templates/swift/hospital/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 05 Sep 2020 22:31:56 GMT -->
</html>