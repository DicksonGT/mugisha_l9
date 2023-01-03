@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
expense
@parent
@stop

@section('content')
<section class="content-header">
    <h1>Expenses</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>expenses</li>
        <li class="active">expenses</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    expense {{ $expense->id }}'s details
                </h4>
            </div>
            <br />
            <div class="panel-body">
                <table class="table">
                    <tr><td>id</td><td>{{ $expense->id }}</td></tr>
                     <tr><td>client_id</td><td>{{ $expense['client_id'] }}</td></tr>
					<tr><td>item</td><td>{{ $expense['item'] }}</td></tr>
					<tr><td>paid_on</td><td>{{ $expense['paid_on'] }}</td></tr>
					<tr><td>payment_method</td><td>{{ $expense['payment_method'] }}</td></tr>
					<tr><td>amount</td><td>{{ $expense['amount'] }}</td></tr>
					
                </table>
            </div>
        </div>
    </div>
</div>
@stop