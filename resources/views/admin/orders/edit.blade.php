@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Edit a order
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
        <li class="active">Create New order</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title"> <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Edit order
                    </h4>
                </div>
                <div class="panel-body">
                     @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    {!! Form::model($order, ['method' => 'PATCH', 'action' => ['OrdersController@update', $order->id]]) !!}

                    <div class="form-group">
                        {!! Form::label('order_code', 'Order Code: ') !!}
                        {!! Form::text('order_code', null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('date', 'Date: ') !!}
                        {!! Form::date('date', null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('total', 'Total: ') !!}
                        {!! Form::text('total', null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('tranx_code', 'Tranx Code: ') !!}
                        {!! Form::text('tranx_code', null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('client_id', 'Client: ') !!}
                        {!! Form::select('client_id', $client,  null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('paid_on', 'Paid On: ') !!}
                        {!! Form::date('paid_on', null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('item_count', 'Item Count: ') !!}
                        {!! Form::text('item_count', null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('payment_status', 'Payment Status: ') !!}
                        {!! Form::text('payment_status', null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('status_code', 'Status Code: ') !!}
                        {!! Form::select('status_code', $status,  null, ['class' => 'form-control']) !!}
                    </div>

					

                    <div class="form-group">
                        {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</section>
@stop