@extends('layouts/clear')

{{-- Page title --}}
@section('title')
Home
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/home.css') }}">
    <!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
    <!-- Container Section Start -->
    <div class="container">
        <div class="row">
            <!-- Contact form Section Start -->
            <h2>Huduma Bora</h2>
            <ul class="list-group">
                <li onclick="location.href='hospitals'" class="list-group-item" id="hospitali">Hospitali</li>
                <li class="list-group-item" id="usafiri">Usafiri</li>
            </ul>
    </div>
    
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <!-- page level js starts-->
    <script type="text/javascript">
        
    </script>
    <!--page level js ends-->

@stop
