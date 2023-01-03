@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Edit a order_item
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
        <li class="active">Create New order_item</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title"> <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Edit order_item
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

                    {!! Form::model($order_item, ['method' => 'PATCH', 'action' => ['Order ItemsController@update', $order_item->id]]) !!}

                    <div class="form-group">
                        {!! Form::label('order_code', 'Order Code: ') !!}
                        {!! Form::text('order_code', null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('product_id', 'Product: ') !!}
                        {!! Form::select('product_id', $product,  null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('service_id', 'Service: ') !!}
                        {!! Form::select('service_id', $service,  null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('quantity', 'Quantity: ') !!}
                        {!! Form::text('quantity', null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('price', 'Price: ') !!}
                        {!! Form::text('price', null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('total', 'Total: ') !!}
                        {!! Form::text('total', null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('member_id', 'Member: ') !!}
                        {!! Form::select('member_id', $member,  null, ['class' => 'form-control']) !!}
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