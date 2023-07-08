<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>darkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ 'frontend/img/favicon.ico' }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ 'frontend/libowlcarousel/assets/owl.carousel.min.css" rel="stylesheet' }}">
    <link href="{{ 'frontend/libtempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet' }}" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ 'frontend/css/bootstrap.min.css' }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ 'frontend/css/style.css' }}" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">



        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>darkPan</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img src="{{ 'frontend/img/user.jpg' }}" class="rounded-circle" alt=""
                            style="width: 40px; height: 40px;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Jhon Doe</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="" class="nav-item nav-link active"><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    @role('employer')
                        @include('partials.employer-menu')
                    @endrole
                    @role('admin')
                        @include('partials.admin-menu')
                    @endrole
                    @role('writer')
                        @include('partials.writer-menu')
                    @endrole
                    
                    <div class="nav-item dropdown">
                        <a href="{{ route('logout') }}" class="nav-link"
                            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="far fa-file-alt me-2"></i>Log out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>
                </div>
        </div>
        </nav>
    </div>
    @yield('content')
    <!-- Sidebar End -->




    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ 'frontend/libchart/chart.min.js' }}"></script>
    <script src="{{ 'frontend/libeasing/easing.min.js' }}"></script>
    <script src="{{ 'frontend/libwaypoints/waypoints.min.js' }}"></script>
    <script src="{{ 'frontend/libowlcarousel/owl.carousel.min.js' }}"></script>
    <script src="{{ 'frontend/libtempusdominus/js/moment.min.js' }}"></script>
    <script src="{{ 'frontend/libtempusdominus/js/moment-timezone.min.js' }}"></script>
    <script src="{{ 'frontend/libtempusdominus/js/tempusdominus-bootstrap-4.min.js' }}"></script>

    <!-- Template Javascript -->
    <script src="{{ 'frontend/js/main.js' }}"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
</body>

</html>

{{-- sielewi why haileti hio toastr but tutaona nikifika.. guess have solved the usse you had? yeah
    thanks
    sawa sawa see you in a few ndo natoka probably in 45-1 hours time okay
    nikuletee nini kfc
    kwisha mimi.. bye  bye
     --}}
