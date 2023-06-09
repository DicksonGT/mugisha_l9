@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
district
@parent
@stop

@section('content')
<section class="content-header">
    <h1>Districts</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>districts</li>
        <li class="active">districts</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    district {{ $district->id }}'s details
                </h4>
            </div>
            <br />
            <div class="panel-body">
                <table class="table">
                    <tr><td>id</td><td>{{ $district->id }}</td></tr>
                     <tr><td>name</td><td>{{ $district['name'] }}</td></tr>
					<tr><td>region_id</td><td>{{ $district['region_id'] }}</td></tr>
					
                </table>
            </div>
        </div>
    </div>
</div>
@stop