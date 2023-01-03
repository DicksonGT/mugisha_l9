@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
service_type
@parent
@stop

@section('content')
<section class="content-header">
    <h1>Service Types</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>service_types</li>
        <li class="active">service_types</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    service_type {{ $service_type->id }}'s details
                </h4>
            </div>
            <br />
            <div class="panel-body">
                <table class="table">
                    <tr><td>id</td><td>{{ $service_type->id }}</td></tr>
                     <tr><td>name</td><td>{{ $service_type['name'] }}</td></tr>
					
                </table>
            </div>
        </div>
    </div>
</div>
@stop