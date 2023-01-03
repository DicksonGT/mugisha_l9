@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Edit a member
@parent
@stop


@section('content')
<section class="content-header">
    <h1>Members</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>members</li>
        <li class="active">Create New member</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title"> <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Edit member
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

                    {!! Form::model($member, ['method' => 'PATCH', 'action' => ['MembersController@update', $member->id]]) !!}

                    <div class="form-group">
                        {!! Form::label('first_name', 'First Name: ') !!}
                        {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('second_name', 'Second Name: ') !!}
                        {!! Form::text('second_name', null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('last_name', 'Last Name: ') !!}
                        {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('phone_number', 'Phone Number: ') !!}
                        {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('nida_number', 'Nida Number: ') !!}
                        {!! Form::text('nida_number', null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('employment_status', 'Employment Status: ') !!}
                        {!! Form::text('employment_status', null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('employer', 'Employer: ') !!}
                        {!! Form::text('employer', null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('region_id', 'Region: ') !!}
                        {!! Form::select('region_id', $region,  null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('district_id', 'District: ') !!}
                        {!! Form::select('district_id', $district,  null, ['class' => 'form-control']) !!}
                    </div>

					<div class="form-group">
                        {!! Form::label('club_name', 'Club Name: ') !!}
                        {!! Form::text('club_name', null, ['class' => 'form-control']) !!}
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