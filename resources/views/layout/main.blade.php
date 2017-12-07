<!DOCTYPE HTML>
<html>
<head>
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="kcrm, CRM" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="{{ URL::asset('css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="{{ URL::asset('css/style.css') }}" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="{{ URL::asset('css/lines.css') }}" rel='stylesheet' type='text/css' />
<link href="{{ URL::asset('css/font-awesome.css') }}" rel="stylesheet"> 
<!-- jQuery -->
<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Nav CSS -->
<link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="{{ URL::asset('js/metisMenu.min.js') }}"></script>
<script src="{{ URL::asset('js/custom.js') }}"></script>
<!-- Graph JavaScript -->
<script src="{{ URL::asset('js/d3.v3.js') }}"></script>
<script src="{{ URL::asset('js/rickshaw.js') }}"></script>
</head>
<body>
<div id="wrapper">
     <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('home')}}">KCRM</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
	        		<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-comments-o"></i><span class="badge">4</span></a>
	        		<ul class="dropdown-menu">
						<li class="dropdown-menu-header">
							<strong>Messages</strong>
							<div class="progress thin">
							  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
							    <span class="sr-only">40% Complete (success)</span>
							  </div>
							</div>
						</li>
						<li class="avatar">
							<a href="#">
								<img src="images/1.png" alt=""/>
								<div>New message</div>
								<small>1 minute ago</small>
								<span class="label label-info">NEW</span>
							</a>
						</li>
						<li class="avatar">
							<a href="#">
								<img src="images/2.png" alt=""/>
								<div>New message</div>
								<small>1 minute ago</small>
								<span class="label label-info">NEW</span>
							</a>
						</li>
						<li class="avatar">
							<a href="#">
								<img src="images/3.png" alt=""/>
								<div>New message</div>
								<small>1 minute ago</small>
							</a>
						</li>
						<li class="avatar">
							<a href="#">
								<img src="images/4.png" alt=""/>
								<div>New message</div>
								<small>1 minute ago</small>
							</a>
						</li>
						<li class="avatar">
							<a href="#">
								<img src="images/5.png" alt=""/>
								<div>New message</div>
								<small>1 minute ago</small>
							</a>
						</li>
						<li class="avatar">
							<a href="#">
								<img src="images/pic1.png" alt=""/>
								<div>New message</div>
								<small>1 minute ago</small>
							</a>
						</li>
						<li class="dropdown-menu-footer text-center">
							<a href="#">View all messages</a>
						</li>	
	        		</ul>
	      		</li>
			    <li class="dropdown">
	        		<a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><img src="images/1.png"><span class="badge">9</span></a>
	        		<ul class="dropdown-menu">
						<li class="dropdown-menu-header text-center">
							<strong>Account</strong>
						</li>
						<li class="m_2"><a href="#"><i class="fa fa-bell-o"></i> Updates <span class="label label-info">42</span></a></li>
						<li class="dropdown-menu-header text-center">
							<strong>Settings</strong>
						</li>
						<li class="m_2"><a href="#"><i class="fa fa-user"></i> Profile</a></li>
						<li class="m_2"><a href="#"><i class="fa fa-wrench"></i> Settings</a></li>
						<li class="m_2"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-lock"></i> Logout</a></li>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>	
	        		</ul>
	      		</li>
			</ul>
			<form class="navbar-form navbar-right">
              <input type="text" class="form-control" value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search...';}">
            </form>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        @if(Auth::user()->status == 1)
                        <li>
                            <a href="{{ route('home') }}"><i class="fa fa-dashboard fa-fw nav_icon"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('project.index') }}"><i class="fa fa-laptop nav_icon"></i>Project</a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{ route('contract.index') }}"><i class="fa fa-laptop nav_icon"></i>Contract</a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{ route('ticketing.index') }}"><i class="fa fa-ticket nav_icon"></i>Ticket</a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{ route('company.index') }}"><i class="fa fa-building-o nav_icon"></i>Company</a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{ route('client.index') }}"><i class="fa fa-user nav_icon"></i>User</a>
                            <!-- /.nav-second-level -->
                        </li>
                        @else
                        <li>
                            <a href="{{ route('home') }}"><i class="fa fa-dashboard fa-fw nav_icon"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('project.index') }}"><i class="fa fa-laptop nav_icon"></i>Project</a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{ route('contract.index') }}"><i class="fa fa-laptop nav_icon"></i>Contract</a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{ route('ticketing.index') }}"><i class="fa fa-ticket nav_icon"></i>Ticket</a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{ route('company.index') }}"><i class="fa fa-building-o nav_icon"></i>Company</a>
                            <!-- /.nav-second-level -->
                        </li>
                        @endif
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

    <div id="page-wrapper">
        <div class="graphs">
            @yield('content')

            <div class="copy">
                <p>Copyright &copy; 2017 Kulkul. All Rights Reserved </p>
            </div>
        </div>
    </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        @stack('script')
    </script>
</body>
</html>
