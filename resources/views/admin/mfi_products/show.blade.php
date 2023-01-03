@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
mfi_product
@parent
@stop

@section('content')
<section class="content-header">
    <h1>Mfi Products</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>mfi_products</li>
        <li class="active">mfi_products</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    mfi_product {{ $mfi_product->id }}'s details
                </h4>
            </div>
            <br />
            <div class="panel-body">
                <table class="table">
                    <tr><td>id</td><td>{{ $mfi_product->id }}</td></tr>
                     <tr><td>name</td><td>{{ $mfi_product['name'] }}</td></tr>
					<tr><td>details</td><td>{{ $mfi_product['details'] }}</td></tr>
					
                </table>
            </div>
        </div>
    </div>
</div>
@stop