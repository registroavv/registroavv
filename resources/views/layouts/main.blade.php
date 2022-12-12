<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('Material Dashboard Laravel - Free Frontend Preset for Laravel') }}</title>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/icon.png') }}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href=" {{ asset('css/css.css') }} " />
    <link rel="stylesheet" href=" {{ asset('css/font-awesome.min.css') }} ">
    <!-- CSS Files -->
    <link href="{{ asset('css/material-dashboard.css?v=2.1.1') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    {{-- <link href="{{ asset('material') }}/demo/demo.css" rel="stylesheet" /> --}}
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.page_templates.auth')
        @endauth
        @guest()
            @include('layouts.page_templates.guest')
        @endguest
        {{-- @if (auth()->check())
        <div class="fixed-plugin">
          <div class="dropdown show-dropdown">
            <a href="#" data-toggle="dropdown">
              <i class="fa fa-cog fa-2x"> </i>
            </a>
            <ul class="dropdown-menu">
              <li class="header-title"> Sidebar Filters</li>
              <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger active-color">
                  <div class="badge-colors ml-auto mr-auto">
                    <span class="badge filter badge-purple " data-color="purple"></span>
                    <span class="badge filter badge-azure" data-color="azure"></span>
                    <span class="badge filter badge-green" data-color="green"></span>
                    <span class="badge filter badge-warning active" data-color="orange"></span>
                    <span class="badge filter badge-danger" data-color="danger"></span>
                    <span class="badge filter badge-rose" data-color="rose"></span>
                  </div>
                  <div class="clearfix"></div>
                </a>
              </li>
              <li class="header-title">Images</li>
              <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                  <img src="{{ asset('img/sidebar-1.jpg') }}" alt="">
                </a>
              </li>
              <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                  <img src="{{ asset('img/sidebar-2.jpg') }}" alt="">
                </a>
              </li>
              <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                  <img src="{{ asset('img/sidebar-3.jpg') }}" alt="">
                </a>
              </li>
              <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                  <img src="{{ asset('img/sidebar-4.jpg') }}" alt="">
                </a>
              </li>
              <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard-laravel" target="_blank" class="btn btn-primary btn-block">Free Download</a>
              </li>
              <!-- <li class="header-title">Want more components?</li>
                  <li class="button-container">
                      <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                        Get the pro version
                      </a>
                  </li> -->
              <li class="button-container">
                <a href="https://material-dashboard-laravel.creative-tim.com/docs/getting-started/laravel-setup.html" target="_blank" class="btn btn-default btn-block">
                  View Documentation
                </a>
              </li>
              <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard-pro-laravel" target="_blank" class="btn btn-danger btn-block btn-round">
                  Upgrade to PRO
                </a>
              </li>
              <li class="button-container github-star">
                <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard-laravel" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
              </li>
              <li class="header-title">Thank you for 95 shares!</li>
              <li class="button-container text-center">
                <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
                <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot; 50</button>
                <br>
                <br>
              </li>
            </ul>
          </div>
        </div>
        @endif --}}
        <script src="{{ asset('js/core/jquery.min.js') }}"></script>
        <script src="{{ asset('js/core/popper.min.js') }}"></script>
        <script src="{{ asset('js/core/bootstrap-material-design.min.js') }}"></script>
        <script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
        
        <script src="{{ asset('js/plugins/moment.min.js') }}"></script>
        
        <script src="{{ asset('js/plugins/sweetalert2.js') }}"></script>
        
        <script src="{{ asset('js/plugins/jquery.validate.min.js') }}"></script>
        
        <script src="{{ asset('js/plugins/jquery.bootstrap-wizard.js') }}"></script>
        
        <script src="{{ asset('js/plugins/bootstrap-selectpicker.js') }}"></script>
        
        <script src="{{ asset('js/plugins/bootstrap-datetimepicker.min.js') }}"></script>
        
        <script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
        
        <script src="{{ asset('js/plugins/bootstrap-tagsinput.js') }}"></script>
        
        <script src="{{ asset('js/plugins/jasny-bootstrap.min.js') }}"></script>
        
        <script src="{{ asset('js/plugins/fullcalendar.min.js') }}"></script>
        
        <script src="{{ asset('js/plugins/jquery-jvectormap.js') }}"></script>
        
        <script src="{{ asset('js/plugins/nouislider.min.js') }}"></script>
        
        <script src="{{asset('js/core/core.js')}}"></script>
        
        <script src="{{ asset('js/plugins/arrive.min.js') }}"></script>
        
        <script src="{{ asset('js/plugins/chartist.min.js') }}"></script>
        
        <script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>
        
        <script src="{{ asset('js/material-dashboard.js?v=2.1.1') }}" type="text/javascript"></script>
        
        <script src="{{ asset('js/settings.js') }}"></script>

        <link href="{{asset('css/bootstrap-toggle.min.css')}}" rel="stylesheet">
        <script src="{{asset('js/bootstrap-toggle.min.js')}}"></script>
        <script src="{{ asset('js/functions3.js')}}" type="text/javascript"></script>
        {{-- <script src="{{ asset('js/Chart.js') }}" type="text/javascript"></script> --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

        @stack('js')
    </body>
</html>