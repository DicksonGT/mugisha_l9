@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
member
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
        <li class="active">members</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    member {{ $member->id }}'s details
                </h4>
            </div>
            <br />
            <div class="panel-body">
                <table class="table">
                    <tr><td>id</td><td>{{ $member->id }}</td></tr>
                     <tr><td>First Name</td><td>{{ $member['first_name'] }}</td></tr>
					<tr><td>Second Name</td><td>{{ $member['second_name'] }}</td></tr>
					<tr><td>Last Name</td><td>{{ $member['last_name'] }}</td></tr>
					<tr><td>Phone Number</td><td>{{ $member['phone_number'] }}</td></tr>
					<tr><td>NIDA Number</td><td>{{ $member['nida_number'] }}</td></tr>
					<tr><td>Employment Status</td><td>{{ $member['employment_status'] }}</td></tr>
					<tr><td>Employer</td><td>{{ $member['employer'] }}</td></tr>
					<tr><td>Region_id</td><td>{{ $member['region_id'] }}</td></tr>
					<tr><td>District</td><td>{{ $member['district_id'] }}</td></tr>
					<tr><td>Date of Birth</td><td>{{ $member['date_of_birth'] }}</td></tr>
					
                </table>
            </div>
        </div>
    </div>
</div>
@stop