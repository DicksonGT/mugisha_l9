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
            <h2>Yanga</h2>
            <ul class="list-group">
                <li onclick="location.href='#'" class="list-group-item" id="yanga_member_reg">Jiandikishe Uanachama</li>
                <li onclick="location.href='#'" class="list-group-item" id="yanga_fee_payment">Lipia Ada</li>
                <li onclick="location.href='products'" class="list-group-item" id="products">Nunua Bidhaa</li>

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
