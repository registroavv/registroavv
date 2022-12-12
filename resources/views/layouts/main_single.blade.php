<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href=" {{ asset('css/css.css') }} " />
    <link rel="stylesheet" href=" {{ asset('css/font-awesome.min.css') }} ">
    <!-- CSS Files -->
    <link href="{{ asset('css/material-dashboard.css?v=2.1.1') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    {{-- <link href="{{ asset('material') }}/demo/demo.css" rel="stylesheet" /> --}}


    </head>
    <body class="{{ $class ?? '' }}">

        @include('layouts.page_templates.single')

        <script src="{{ public_path('js/core/jquery.min.js') }}"></script>
        <script src="{{ public_path('js/core/popper.min.js') }}"></script>
        <script src="{{ public_path('js/core/bootstrap-material-design.min.js') }}"></script>
        <script src="{{ public_path('js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
        
        <script src="{{ public_path('js/plugins/moment.min.js') }}"></script>
        
        <script src="{{ public_path('js/plugins/sweetalert2.js') }}"></script>
        
        <script src="{{ public_path('js/plugins/jquery.validate.min.js') }}"></script>
        
        <script src="{{ public_path('js/plugins/jquery.bootstrap-wizard.js') }}"></script>
        
        <script src="{{ public_path('js/plugins/bootstrap-selectpicker.js') }}"></script>
        
        <script src="{{ public_path('js/plugins/bootstrap-datetimepicker.min.js') }}"></script>
        
        <script src="{{ public_path('js/plugins/jquery.dataTables.min.js') }}"></script>
        
        <script src="{{ public_path('js/plugins/bootstrap-tagsinput.js') }}"></script>
        
        <script src="{{ public_path('js/plugins/jasny-bootstrap.min.js') }}"></script>
        
        <script src="{{ public_path('js/plugins/fullcalendar.min.js') }}"></script>
        
        <script src="{{ public_path('js/plugins/jquery-jvectormap.js') }}"></script>
        
        <script src="{{ public_path('js/plugins/nouislider.min.js') }}"></script>
        
        <script src="{{public_path('js/core/core.js')}}"></script>
        
        <script src="{{ public_path('js/plugins/arrive.min.js') }}"></script>
        
        <script src="{{ public_path('js/plugins/chartist.min.js') }}"></script>
        
        <script src="{{ public_path('js/plugins/bootstrap-notify.js') }}"></script>
        
        <script src="{{ public_path('js/material-dashboard.js?v=2.1.1') }}" type="text/javascript"></script>
        
        <script src="{{ public_path('js/settings.js') }}"></script>

        <link href="{{public_path('css/bootstrap-toggle.min.css')}}" rel="stylesheet">
        <script src="{{public_path('js/bootstrap-toggle.min.js')}}"></script>
        {{-- <script src="{{ asset('js/Chart.js') }}" type="text/javascript"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        @stack('js')

    </body>
</html>