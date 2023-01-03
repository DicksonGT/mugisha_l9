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
            <h2>Mikopo Ya Taasisi</h2>
            <ul class="list-group">
                <li class="list-group-item" onclick="location.href='crdb_loan_form'" id="crdb">Kopa na CRDB</li>
                <li class="list-group-item" onclick="location.href='akiba_loan_form'" id="akiba_comm">Kopa na Akiba Commercial Bank</li>
                <li class="list-group-item" style="text-color:#FF3322" onclick="location.href='mfi_loan_form'" id="micro_finance_A">Kopa na Micro Finance A</li>
                <li class="list-group-item" onclick="location.href='mfi_loan_form'" id="micro_finance_B">Kopa na Micro Finance B</li>
                <li class="list-group-item" onclick="location.href='mfi_loan_form'" id="micro_finance_C">Kopa na Micro Finance C</li>
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
