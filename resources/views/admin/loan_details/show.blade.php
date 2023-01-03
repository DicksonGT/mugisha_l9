@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
loan_detail
@parent
@stop

@section('content')
<section class="content-header">
    <h1>Loan Details</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>loan_details</li>
        <li class="active">loan_details</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    loan_detail {{ $loan_detail->id }}'s details
                </h4>
            </div>
            <br />
            <div class="panel-body">
                <table class="table">
                    <tr><td>id</td><td>{{ $loan_detail->id }}</td></tr>
                     <tr><td>member_id</td><td>{{ $loan_detail['member_id'] }}</td></tr>
					<tr><td>amount_requested</td><td>{{ $loan_detail['amount_requested'] }}</td></tr>
					<tr><td>amount_granted</td><td>{{ $loan_detail['amount_granted'] }}</td></tr>
					<tr><td>request_date</td><td>{{ $loan_detail['request_date'] }}</td></tr>
					<tr><td>funding_date</td><td>{{ $loan_detail['funding_date'] }}</td></tr>
					<tr><td>mfi_id</td><td>{{ $loan_detail['mfi_id'] }}</td></tr>
					<tr><td>mfi_product_id</td><td>{{ $loan_detail['mfi_product_id'] }}</td></tr>
					<tr><td>status_code</td><td>{{ $loan_detail['status_code'] }}</td></tr>
					<tr><td>comment</td><td>{{ $loan_detail['comment'] }}</td></tr>
					
                </table>
            </div>
        </div>
    </div>
</div>
@stop