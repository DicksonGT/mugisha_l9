@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
business_type
@parent
@stop

@section('content')
<section class="content-header">
    <h1>Business Types</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>business_types</li>
        <li class="active">business_types</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    business_type {{ $business_type->id }}'s details
                </h4>
            </div>
            <br />
            <div class="panel-body">
                <table class="table">
                    <tr><td>id</td><td>{{ $business_type->id }}</td></tr>
                     <tr><td>name</td><td>{{ $business_type['name'] }}</td></tr>
					<tr><td>code</td><td>{{ $business_type['code'] }}</td></tr>
					<tr><td>status_code</td><td>{{ $business_type['status_code'] }}</td></tr>
					
                </table>
            </div>
        </div>
    </div>
</div>
@stop