
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ $title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="">


    <!-- App css -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/app-creative.min.css') }}" rel="stylesheet" type="text/css" />

    @yield('head')
</head>

<body data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
<!-- Begin page -->

@include('admin.layouts.sidebar')

<div class="wrapper">

    @include('admin.layouts.header')

    <div class="content-page">

        @include('admin.auth.alert')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Start -->
        @include('admin.layouts.footer')
        <!-- end Footer -->

    </div>

</div>
<!-- bundle -->
<script src="{{ asset("js/vendor.min.js") }}"></script>
<script src="{{ asset("js/app.min.js") }}"></script>

</body>
</html>
