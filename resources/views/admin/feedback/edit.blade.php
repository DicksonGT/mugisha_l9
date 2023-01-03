@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Edit a feedback
@parent
@stop


@section('content')
<section class="content-header">
    <h1>Feedback</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>feedback</li>
        <li class="active">Create New feedback</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title"> <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Edit feedback
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

                    {!! Form::model($feedback, ['method' => 'PATCH', 'action' => ['FeedbackController@update', $feedback->id]]) !!}

                    <div class="form-group">
                        {!! Form::label('member_id', 'Member: ') !!}
                        {!! Form::select('member_id', $member,  null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('offer_id', 'Offer: ') !!}
                        {!! Form::select('offer_id', $offer,  null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('comment', 'Comment: ') !!}
                        {!! Form::text('comment', null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('rating', 'Rating: ') !!}
                        {!! Form::text('rating', null, ['class' => 'form-control']) !!}
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