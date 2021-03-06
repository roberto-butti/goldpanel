<!-- Main Header -->
<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('') }}" class="logo"><b>G</b>old <b>P</b>anel</a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-tasks"></i>
                        <span class="label label-success">{{ $count_todo }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have {{ $count_todo }} to do</li>
                        <li class="header">You have {{ $count_todo_today }} to do today</li>
                        <li>
                            <!-- inner menu: contains the messages -->
                            <ul class="menu">
                            @if ($tasks!=null)
                            @foreach ($tasks as $t )
                                <li><!-- start message -->
                                    <a href="#">

                                        <div class="pull-left">
                                            <!-- User Image -->
                                            <!--img src="{{ asset("/bower_components/AdminLTE/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image"/-->
                                        </div>
                                        <!-- Message title and timestamp -->
                                        <h4>
                                            {{ $t->name }}
                                            <small><i class="fa fa-clock-o"></i>{{ $t->deadline }}</small>
                                        </h4>
                                        <!-- The message -->
                                        <p>[{{ $t->status }}] {{ $t->note }}</p>
                                    </a>
                                </li><!-- end message -->
                            @endforeach
                            @endif
                            </ul><!-- /.menu -->
                        </li>
                        <li class="footer"><a href="{{ url('/tasks') }}">See All Tasks</a></li>
                    </ul>
                </li><!-- /.messages-menu -->

                <!-- Notifications Menu -->
                <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>
                            <!-- Inner Menu: contains the notifications -->
                            <ul class="menu">
                                <li><!-- start notification -->
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                    </a>
                                </li><!-- end notification -->
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>
                <!-- Tasks Menu -->
                <li class="dropdown tasks-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 9 tasks</li>
                        <li>
                            <!-- Inner menu: contains the tasks -->
                            <ul class="menu">
                                <li><!-- Task item -->
                                    <a href="#">
                                        <!-- Task title and progress text -->
                                        <h3>
                                            Design some buttons
                                            <small class="pull-right">20%</small>
                                        </h3>
                                        <!-- The progress bar -->
                                        <div class="progress xs">
                                            <!-- Change the css width attribute to simulate progress -->
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li><!-- end task item -->
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">View all tasks</a>
                        </li>
                    </ul>
                </li>
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <!-- img src="{{ asset("/bower_components/AdminLTE/dist/img/avatar5.png") }}" class="user-image" alt="User Image"/ -->
                            <img src="http://www.gravatar.com/avatar/{{ md5(Auth::user()->email) }}?s=200" class="user-image" alt="{{ Auth::user()->name }}">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        @endif
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->

                        <li class="user-header">
                            @if (Auth::guest())
                                <li><a href="{{ url('/login') }}">Login</a></li>
                                <li><a href="{{ url('/register') }}">Register</a></li>
                            @else
                                <img src="{{ asset("/bower_components/admin-lte/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image" />
                                <p>
                                    {{ Auth::user()->name }}
                                    <small>Member since Nov. 2012</small>
                                </p>
                            @endif
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="#" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>