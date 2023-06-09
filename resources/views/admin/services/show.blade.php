@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
service
@parent
@stop

@section('content')
<section class="content-header">
    <h1>Services</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>services</li>
        <li class="active">services</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    service {{ $service->id }}'s details
                </h4>
            </div>
            <br />
            <div class="panel-body">
                <table class="table">
                    <tr><td>id</td><td>{{ $service->id }}</td></tr>
                     <tr><td>name</td><td>{{ $service['name'] }}</td></tr>
					<tr><td>service_type_id</td><td>{{ $service['service_type_id'] }}</td></tr>
					<tr><td>code</td><td>{{ $service['code'] }}</td></tr>
					<tr><td>status_code</td><td>{{ $service['status_code'] }}</td></tr>
					
                </table>
            </div>
        </div>
    </div>
</div>
@stop