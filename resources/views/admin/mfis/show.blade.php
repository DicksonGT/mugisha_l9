@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
mfi
@parent
@stop

@section('content')
<section class="content-header">
    <h1>Mfis</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>mfis</li>
        <li class="active">mfis</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    mfi {{ $mfi->id }}'s details
                </h4>
            </div>
            <br />
            <div class="panel-body">
                <table class="table">
                    <tr><td>id</td><td>{{ $mfi->id }}</td></tr>
                     <tr><td>name</td><td>{{ $mfi['name'] }}</td></tr>
					<tr><td>address</td><td>{{ $mfi['address'] }}</td></tr>
					<tr><td>phone_number</td><td>{{ $mfi['phone_number'] }}</td></tr>
					<tr><td>region_id</td><td>{{ $mfi['region_id'] }}</td></tr>
					<tr><td>district_id</td><td>{{ $mfi['district_id'] }}</td></tr>
					
                </table>
            </div>
        </div>
    </div>
</div>
@stop