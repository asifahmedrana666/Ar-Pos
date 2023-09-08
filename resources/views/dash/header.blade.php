<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{ asset('dash/css/styles.css') }}" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="/dashboard">{{$header}}</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        @if(auth()->user()->user_role=='Admin')
                        <li><a class="dropdown-item" href="setting">Settings</a></li>
                      @endif
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="{{ route('logout')}}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
                            <a class="nav-link" href="{{route('dashbord')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            
                            <a class="nav-link" href="{{route('order')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Product
                            </a>
                            @if(auth()->user()->user_role=='Admin')
                            <a class="nav-link" href="{{route('catagory')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Category
                            </a>
                            @endif
                        </a>
                        <a class="nav-link" href="{{route('pos')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Point of Sale (POS)
                        </a>
                        @if(auth()->user()->user_role=='Admin')
                        <a class="nav-link" href="{{route('report')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Sale Report
                        </a>
                        @endif
                        @if(auth()->user()->user_role=='Admin')
                            <a class="nav-link" href="{{route('users')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Users
                            </a>
                            @endif
                            @if(auth()->user()->user_role=='Admin')
                            <a class="nav-link" href="{{route('setting')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Setting
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Welcome</div>
                    </div>
                </nav>
            </div>