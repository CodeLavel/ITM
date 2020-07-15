<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ระบบจัดการครุภัณฑ์ พทส.</title>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="author" content="Themesdesign" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/logo.jpg') }}">

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

        <!-- Material Icon -->
        <link rel="stylesheet" type="text/css" href="css/materialdesignicons.min.css" />

        <!-- owl carousel -->
        <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css" />
        <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css" />

        <!-- Custom  sCss -->
        <link rel="stylesheet" type="text/css" href="css/style.css" />

    </head>

    <body>

        <!--Navbar Start-->
        <nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky navbar-light sticky-dark">
            <div class="container">
                <!-- LOGO -->
                <a class="logo text-uppercase " href="{{url('/')}}">
                    <img src="{{ asset('assets/images/logo.jpg')}}" class="logo-light" alt="" height="60" width="190">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-menu"></i>
                </button>
                @if (Route::has('login'))
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto navbar-center" id="mySidenav">
                      @auth
                        <li class="nav-item active">
                            <a href="{{ url('/home') }}" class="nav-link">หน้าหลัก</a>
                        </li>
                    </ul>
                    @else
                      <a href="{{ route('login') }}" class="btn btn-success btn-rounded navbar-btn" title="สำหรับผู้ดูแลระบบ">ล็อคอิน</a>
                <!--      @if (Route::has('register'))
                          <a href="{{ route('register') }}" class="btn btn-success btn-rounded navbar-btn">สมัครสมาชิก</a>
                      @endif -->
                    @endauth
                </div>
                @endif
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Hero section Start -->
        <section class="hero-section-5" id="home">
            <div class="bg-overlay">
                  <img src="..\images\iTMuseum.jpg" width="100%" height="100%">
            </div>
              <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="hero-wrapper text-center mb-4">
                            <br><br><br>
                            <h1 class="hero-title text-white mb-4">กองนิทรรศการ พิพิธภัณฑ์เทคโนโลยีสารสนเทศ</h1>

                            <h4 class="text-white-50">ระบบจัดการครุภัณฑ์กองนิทรรศการ พิพิธภัณฑ์เทคโนโลยีสารสนเทศ</h4>

                            <div class="mt-4">
                                <a href="{{ url('/home') }}" class="btn btn-primary mt-2 mr-2">เข้าสู่ระบบ</a>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- end row -->
              </div>
            <!-- end container -->
        </section>

        <!-- Javascript -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.easing.min.js"></script>
        <script src="js/scrollspy.min.js"></script>
        <script src="js/feather.min.js"></script>

        <!-- owl carousel -->
        <script src="js/owl.carousel.min.js"></script>

        <!-- app js -->
        <script src="js/app.js"></script>

    </body>

  </html>
