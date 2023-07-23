<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{asset('backend')}}/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{asset('backend')}}/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="{{asset('backend')}}/assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <link href="{{asset('public_directory')}}/alertify/css/alertify.min.css" rel="stylesheet">
    <link href="{{asset('public_directory')}}/alertify/css/default.min.css" rel="stylesheet">
    <link href="{{asset('public_directory')}}/alertify/css/semantic.min.css" rel="stylesheet">
    <!-- PLUGINS STYLES-->
    <link href="{{asset('backend')}}/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="{{asset('public_directory')}}/dropzone/dropzone.min.css" rel="stylesheet">
    <link href="{{asset('backend')}}/assets/css/main.min.css" rel="stylesheet" />
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    <script src="{{asset('public_directory')}}/dropzone/dropzone.min.js"></script>
    <script src="{{asset('public_directory')}}/alertify/alertify.min.js"></script>

    <!-- PAGE LEVEL STYLES-->
</head>

<body class="fixed-navbar">
<div class="page-wrapper">
    <!-- START HEADER-->
    <header class="header">
        <div class="page-brand">
            <a class="link" href="">
                    <span class="brand">Özdemir
                        <span class="brand-tip">Software</span>
                    </span>
                <span class="brand-mini">Soft</span>
            </a>
        </div>
        <div class="flexbox flex-1">
            <!-- START TOP-LEFT TOOLBAR-->
            <ul class="nav navbar-toolbar">
                <li>
                    <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
                </li>

            </ul>
            <!-- END TOP-LEFT TOOLBAR-->
            <!-- START TOP-RIGHT TOOLBAR-->
            <ul class="nav navbar-toolbar">


                <li class="dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                        <img src="{{asset('public_directory')}}/icon/user.png" />
                        <span></span>Hesabım<i class="fa fa-angle-down m-l-5"></i></a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href=""><i class="fa fa-user"></i>Profile</a>
                        <li class="dropdown-divider"></li>
                        <a class="dropdown-item" href=""><i class="fa fa-power-off"></i>Logout</a>
                    </ul>
                </li>
            </ul>
            <!-- END TOP-RIGHT TOOLBAR-->
        </div>
    </header>
    <!-- END HEADER-->
    <!-- START SIDEBAR-->
    <nav class="page-sidebar" id="sidebar">
        <div id="sidebar-collapse">
            <div class="admin-block d-flex">
                <div>
                        <img src="{{asset('public_directory')}}/icon/user.png" class="rounded-circle" width="45px" />
                </div>
                <div class="admin-info">
                    <div class="font-strong">Alp Eren Özdemir</div><small>Yönetici</small></div>
            </div>
            <ul class="side-menu metismenu">
                <li>
                    <a class="active" href=""><i class="sidebar-item-icon fa fa-th-large"></i>
                        <span class="nav-label">Ana Ekran</span>
                    </a>
                </li>
                <li class="heading">Menü</li>
                <li>
                    <a href=""><i class="sidebar-item-icon fa fa-user"></i>
                        <span class="nav-label">Kullanıcı İşlemleri</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                        <span class="nav-label">Kategoriler</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="">Kategori Listesi</a>
                        </li>
                        <li>
                            <a href="">Kategori Ekle</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                        <span class="nav-label">Ürün İşlemleri</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="">Ürün Listesi</a>
                        </li>
                        <li>
                            <a href="">Ürün Ekle</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                        <span class="nav-label">Sipariş İşlemleri</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="">Tüm Siparişler</a>
                        </li>
                        <li>
                            <a href="">Tedarik Edilen Siparişler</a>
                        </li>
                        <li>
                            <a href="">Kargodaki Siparişler</a>
                        </li>
                        <li>
                            <a href="">Teslim Edilen Siparişler</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                        <span class="nav-label">Banner İşlemleri</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="">Banner Listesi</a>
                        </li>
                        <li>
                            <a href="">Banner Ekle</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                        <span class="nav-label">Slider İşlemleri</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="">Slider Listesi</a>
                        </li>
                        <li>
                            <a href="">Slider Ekle</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- END SIDEBAR-->
<div class="content-wrapper">

    @yield('content')

    <footer class="page-footer">
        <div class="font-13">2023 © <b>OzdemirSoftware</b> - Tüm hakları saklıdır</div>
        <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
    </footer>
</div>
</div>
<!-- BEGIN PAGA BACKDROPS-->
<div class="sidenav-backdrop backdrop"></div>
<div class="preloader-backdrop">
    <div class="page-preloader">Loading</div>
</div>
<!-- END PAGA BACKDROPS-->
<!-- CORE PLUGINS-->
@yield('js')
<script src="{{asset('backend')}}/assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="{{asset('backend')}}/assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
<script src="{{asset('backend')}}/assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{asset('backend')}}/assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
<script src="{{asset('backend')}}/assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- PAGE LEVEL PLUGINS-->
<script src="{{asset('backend')}}/assets/vendors/chart.js/dist/Chart.min.js" type="text/javascript"></script>
<script src="{{asset('backend')}}/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
<script src="{{asset('backend')}}/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<script src="{{asset('backend')}}/assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js" type="text/javascript"></script>
<!-- CORE SCRIPTS-->
<script src="{{asset('backend')}}/assets/js/app.min.js" type="text/javascript"></script>
<!-- PAGE LEVEL SCRIPTS-->
<script src="{{asset('backend')}}/assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
</body>

</html>
