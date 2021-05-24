<!-- Begin page -->
<div id="wrapper">

    <!-- Topbar Start -->
    <div class="navbar-custom">
        <ul class="list-unstyled topnav-menu float-right mb-0">

            @if(Auth::check())
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                  <i class="fa fa-user"></i>
                    <span class="pro-user-name ml-1">
                        {{ Auth::user()->username }} <i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">

                    <a href="{{ route('change.password') }}" class="dropdown-item notify-item">
                        <i class="fas fa-pencil-alt"></i>
                        <span>เปลี่ยนรหัสผ่าน</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a href="{{ route('logout') }}" class="dropdown-item notify-item" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                        <i class="fe-log-out"></i>
                        <span>ออกจากระบบ</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </div>
            </li>
            @endif
        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="{{ url('home') }}" class="logo text-center">
                <span class="logo-lg">
                    <img src="{{ asset('assets/images/logo.jpg')}}" alt="" height="69" width="230">
                    <!-- <span class="logo-lg-text-light">Upvex</span> -->
                </span>
              <!--  <span class="logo-sm">
                     <span class="logo-sm-text-dark">X</span>
                    <img src="{{ asset('assets/images/logo-sm.png')}}" alt="" height="28">
                </span> -->
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </li>

          <ul class="pull-right">
            <li class="dropdown d-none d-lg-block">
                <a class="nav-link dropdown-toggle waves-effect" href="{{url('/')}}" role="button" >
                    หน้าแรก
                </a>
            </li>
          </ul>
        </ul>
    </div>
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">

        <div class="slimscroll-menu">

            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul class="metismenu" id="side-menu">
                  @if(Auth::check())
                    <li>
                        <a href="javascript: void(0);">
                            <i class="fas fa-edit"></i>
                            <span> จัดการข้อมูล </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">

                            <li>
                                <a href="{{ url('durables') }}">ครุภัณฑ์</a>
                            </li>
                            <li>
                                <a href="{{ url('orders') }}">รายการยืมครุภัณฑ์</a>
                            </li>
                            <li>
                                <a href="{{ url('categories') }}">หมวดหมู่</a>
                            </li>
                            <li>
                                <a href="{{ url('orders/showorderlogs') }}">จำนวนการยืมครุภัณฑ์</a>
                            </li>
                            {{-- <li>
                                <a href="{{ url('line/sentLine') }}">LineToken</a>
                            </li> --}}
                            {{-- <li>
                                <a href="{{ url('catagories') }}">สถานที่ครุภัณฑ์</a>
                            </li> --}}
                            {{-- <li>
                                <a href="{{ url('users') }}">ข้อมูลพนักงาน</a>
                            </li> --}}
                        </ul>
                       
                    </li>
                <li>
                    <a href="{{ url('users') }}">
                        <i class="fas fa-address-book"></i>
                        <span> ข้อมูลผู้ดูแลระบบ </span>
                        {{-- <span class="menu-arrow"></span> --}}
                    </a>
                </li>
                <li>
                    <a href="{{ url('orders/showordermount') }}">
                        <i class="fas fa-book-open"></i>
                        <span> รายการยืมประจำเดือน </span>
                        {{-- <span class="menu-arrow"></span> --}}
                    </a>
                </li>
                <li>
                    <a href="{{ url('orders/showorder') }}">
                        <i class="fas fa-list"></i>
                        <span> สถิติการยืมทั้งหมด </span>
                        {{-- <span class="menu-arrow"></span> --}}
                    </a>
                </li>
                    @endif

                    {{-- <li>
                        <a href="{{url('home')}}">
                            <i class="fa fa-list"></i>
                            <span> รายการครุภัณฑ์ </span>
                        </a>
                    </li> --}}

                    {{-- <li>
                        <a href="{{url('orders')}}">
                            <i class="fas fa-clipboard-list"></i>
                            <span> รายการยืมครุภัณฑ์ </span>
                        </a>
                    </li> --}}
                    {{-- <li>
                        <a href="{{url('orders')}}">
                            <i class="fas fa-clipboard-list"></i>
                            <span> ข้อมูลพนักงาน </span>
                        </a>
                    </li> --}}
                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->
