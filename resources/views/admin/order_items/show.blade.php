@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
order_item
@parent
@stop

@section('content')
<section class="content-header">
    <h1>Order Items</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>order_items</li>
        <li class="active">order_items</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    order_item {{ $order_item->id }}'s details
                </h4>
            </div>
            <br />
            <div class="panel-body">
                <table class="table">
                    <tr><td>id</td><td>{{ $order_item->id }}</td></tr>
                     <tr><td>order_code</td><td>{{ $order_item['order_code'] }}</td></tr>
					<tr><td>product_id</td><td>{{ $order_item['product_id'] }}</td></tr>
					<tr><td>service_id</td><td>{{ $order_item['service_id'] }}</td></tr>
					<tr><td>quantity</td><td>{{ $order_item['quantity'] }}</td></tr>
					<tr><td>price</td><td>{{ $order_item['price'] }}</td></tr>
					<tr><td>total</td><td>{{ $order_item['total'] }}</td></tr>
					<tr><td>member_id</td><td>{{ $order_item['member_id'] }}</td></tr>
					
                </table>
            </div>
        </div>
    </div>
</div>
@stop