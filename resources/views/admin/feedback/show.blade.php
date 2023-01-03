@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
feedback
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
        <li class="active">feedback</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    feedback {{ $feedback->id }}'s details
                </h4>
            </div>
            <br />
            <div class="panel-body">
                <table class="table">
                    <tr><td>id</td><td>{{ $feedback->id }}</td></tr>
                     <tr><td>member_id</td><td>{{ $feedback['member_id'] }}</td></tr>
					<tr><td>offer_id</td><td>{{ $feedback['offer_id'] }}</td></tr>
					<tr><td>comment</td><td>{{ $feedback['comment'] }}</td></tr>
					<tr><td>rating</td><td>{{ $feedback['rating'] }}</td></tr>
					
                </table>
            </div>
        </div>
    </div>
</div>
@stop