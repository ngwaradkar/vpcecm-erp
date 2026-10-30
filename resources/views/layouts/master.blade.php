<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta id="csrf-token" name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Nilesh Waradkar">

    <title> @yield('page_title') | {{ config('app.name') }} </title>

    @include('partials.inc_top')
</head>

<body class="{{ in_array(Route::currentRouteName(), ['payments.invoice', 'marks.tabulation', 'marks.show', 'ttr.manage', 'ttr.show']) ? 'sidebar-xs' : '' }}">

@include('partials.top_menu')
<div class="page-content">
    @include('partials.menu')
    <div class="content-wrapper">
        @include('partials.header')

        <div class="content">
            {{--Error Alert Area--}}
            @if($errors->any())
                <div class="alert alert-danger border-0 alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>

                        @foreach($errors->all() as $er)
                            <span><i class="icon-arrow-right5"></i> {{ $er }}</span> <br>
                        @endforeach

                </div>
            @endif
            <div id="ajax-alert" style="display: none"></div>

            @yield('content')
        </div>

        <div class="navbar navbar-expand-lg navbar-light border-top mt-auto">
            <span class="navbar-text">
                &copy; {{ date('Y') }}. <a href="#">Vidya Prabodhini College of Commerce, Education, Computer and Management</a> by <a href="#" class="font-weight-semibold text-primary">Nilesh Waradkar</a>
            </span>

            <ul class="navbar-nav ml-lg-auto">
                <li class="nav-item"><a href="{{ route('privacy_policy') }}" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Privacy Policy</a></li>
                <li class="nav-item"><a href="{{ route('terms_of_use') }}" class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i> Terms of Use </a></li>
            </ul>
        </div>

    </div>
</div>

@include('partials.inc_bottom')
@yield('scripts')
</body>
</html>
