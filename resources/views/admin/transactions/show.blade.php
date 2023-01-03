@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
transaction
@parent
@stop

@section('content')
<section class="content-header">
    <h1>Transactions</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>transactions</li>
        <li class="active">transactions</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    transaction {{ $transaction->id }}'s details
                </h4>
            </div>
            <br />
            <div class="panel-body">
                <table class="table">
                    <tr><td>id</td><td>{{ $transaction->id }}</td></tr>
                     <tr><td>txn_id</td><td>{{ $transaction['txn_id'] }}</td></tr>
					<tr><td>type</td><td>{{ $transaction['type'] }}</td></tr>
					<tr><td>company_id</td><td>{{ $transaction['company_id'] }}</td></tr>
					<tr><td>member_id</td><td>{{ $transaction['member_id'] }}</td></tr>
					<tr><td>offer_id</td><td>{{ $transaction['offer_id'] }}</td></tr>
					<tr><td>amount</td><td>{{ $transaction['amount'] }}</td></tr>
					<tr><td>details</td><td>{{ $transaction['details'] }}</td></tr>
					
                </table>
            </div>
        </div>
    </div>
</div>
@stop