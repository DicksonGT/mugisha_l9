@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
status
@parent
@stop

@section('content')
<section class="content-header">
    <h1>Statuses</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>statuses</li>
        <li class="active">statuses</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    status {{ $status->id }}'s details
                </h4>
            </div>
            <br />
            <div class="panel-body">
                <table class="table">
                    <tr><td>id</td><td>{{ $status->id }}</td></tr>
                     <tr><td>type</td><td>{{ $status['type'] }}</td></tr>
					<tr><td>code</td><td>{{ $status['code'] }}</td></tr>
					<tr><td>name</td><td>{{ $status['name'] }}</td></tr>
					
                </table>
            </div>
        </div>
    </div>
</div>
@stop