<!DOCTYPE html>
<html lang="en">

<!-- index.html  Tue, 07 Jan 2020 03:35:33 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    {{-- {{ $title }}  --}}
    <title> Admin -</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/components.min.css') }}">

    {{-- Including Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- End Including Font Awesome --}}

    {{-- Including Jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    {{-- End Including Jquery --}}


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

</head>

<body class="layout-4">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>

    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <!-- Start app top navbar -->
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                      
                    </ul>
                </form>
                @php
                if (session('super_admin_id')) {
                        $superAdminProfile = App\Models\admins::find(session('super_admin_id'));
                    }
                    elseif (session('admin_id')) {
                        $adminprofile = App\Models\admins::find(session('admin_id'));
                    }
                @endphp
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            @if (session('super_admin_id'))
                                <div class="d-sm-none d-lg-inline-block">{{ ucfirst($superAdminProfile->name) }}</div>
                            @elseif(session('admin_id'))
                                <div class="d-sm-none d-lg-inline-block">{{ ucfirst($adminprofile->name) }}</div>
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            @if (session('super_admin_id'))
                                <a href="{{ Route('admin.profile', ['id' => session('super_admin_id')]) }}"
                                    class="dropdown-item has-icon"><i class="fas fa-cog"></i>
                                    Settings</a>
                            @elseif(session('admin_id'))
                                <a href="{{ Route('admin.profile', ['id' => session('admin_id')]) }}"
                                    class="dropdown-item has-icon"><i class="fas fa-cog"></i>
                                    Settings</a>
                            @endif
                            <div class="dropdown-divider"></div>
                            <a href="{{ Route('admin.logout') }}" class="dropdown-item has-icon text-danger"><i
                                    class="fas fa-sign-out-alt"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </nav>
