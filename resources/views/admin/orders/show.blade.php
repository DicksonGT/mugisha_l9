@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
order
@parent
@stop

@section('content')
<section class="content-header">
    <h1>Orders</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>orders</li>
        <li class="active">orders</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    order {{ $order->id }}'s details
                </h4>
            </div>
            <br />
            <div class="panel-body">
                <table class="table">
                    <tr><td>id</td><td>{{ $order->id }}</td></tr>
                     <tr><td>order_code</td><td>{{ $order['order_code'] }}</td></tr>
					<tr><td>date</td><td>{{ $order['date'] }}</td></tr>
					<tr><td>total</td><td>{{ $order['total'] }}</td></tr>
					<tr><td>tranx_code</td><td>{{ $order['tranx_code'] }}</td></tr>
					<tr><td>client_id</td><td>{{ $order['client_id'] }}</td></tr>
					<tr><td>paid_on</td><td>{{ $order['paid_on'] }}</td></tr>
					<tr><td>item_count</td><td>{{ $order['item_count'] }}</td></tr>
					<tr><td>payment_status</td><td>{{ $order['payment_status'] }}</td></tr>
					<tr><td>status_code</td><td>{{ $order['status_code'] }}</td></tr>
					
                </table>
            </div>
        </div>
    </div>
</div>
@stop