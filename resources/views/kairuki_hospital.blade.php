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
            <h2>Hospitali ya Kairuki</h2>
            <ul class="list-group">
                <li href="#" class="list-group-item" id="#">Zungumza na mtoa huduma</li>
                <li href="#" class="list-group-item" id="#">Huduma za kila siku</li>
                <li href="#" class="list-group-item" id="#">Operation Mbalimbali</li>
                <li href="#" class="list-group-item" id="#">Huduma Zilizopo muda huu</li>
                <li href="#" class="list-group-item" id="#">Madaktari waliopo muda huu</li>
                <li href="#" class="list-group-item" id="#">Jiandikishe kwa huduma</li>
                <li href="#" class="list-group-item" id="#">Upatikanaji wa dawa</li>
                <li href="#" class="list-group-item" id="#">Weka miadi na daktari (Appointment)</li>
                <li href="#" class="list-group-item" id="#">Kiwanda cha Dawa (KPL)</li>
                <li href="#" class="list-group-item" id="#">Andika dalili zako upate msaada sasa</li>
                <li href="#" class="list-group-item" id="#">Radiology</li>
                <li href="#" class="list-group-item" id="#">IVF</li>
                <li href="#" class="list-group-item" id="#">Ratiba za wauguzi</li>
                <li href="#" class="list-group-item" id="#">Ratiba za wodini</li>
                <li href="#" class="list-group-item" id="#">Tupe maoni yako</li>

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
