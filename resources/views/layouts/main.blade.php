<!DOCTYPE html>
<html lang="en">
<head>
@include('layouts.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div>
    @include('layouts.nav')
    @include('layouts.sidebar')
    <div class="content-wrapper">
        @include('layouts.header')
        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
    </div>
    @include('layouts.footer')
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>
@include('layouts.script')
</body>
</html>
