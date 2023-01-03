@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Edit a loan_detail
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
        <li class="active">Create New loan_detail</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title"> <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Edit loan_detail
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

                    {!! Form::model($loan_detail, ['method' => 'PATCH', 'action' => ['Loan DetailsController@update', $loan_detail->id]]) !!}

                    <div class="form-group">
                        {!! Form::label('member_id', 'Member: ') !!}
                        {!! Form::select('member_id', $member,  null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('amount_requested', 'Amount Requested: ') !!}
                        {!! Form::text('amount_requested', null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('amount_granted', 'Amount Granted: ') !!}
                        {!! Form::text('amount_granted', null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('request_date', 'Request Date: ') !!}
                        {!! Form::date('request_date', null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('funding_date', 'Funding Date: ') !!}
                        {!! Form::date('funding_date', null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('mfi_id', 'Mfi: ') !!}
                        {!! Form::select('mfi_id', $mfi,  null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('mfi_product_id', 'Mfi Product: ') !!}
                        {!! Form::select('mfi_product_id', $mfi_product,  null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('status_code', 'Status Code: ') !!}
                        {!! Form::select('status_code', $status,  null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('comment', 'Comment: ') !!}
                        {!! Form::textarea('comment', null, ['class' => 'form-control', 'rows' => 3]) !!}
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