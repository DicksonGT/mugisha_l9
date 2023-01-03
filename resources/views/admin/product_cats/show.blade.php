@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
product_cat
@parent
@stop

@section('content')
<section class="content-header">
    <h1>Product Cats</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>product_cats</li>
        <li class="active">product_cats</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    product_cat {{ $product_cat->id }}'s details
                </h4>
            </div>
            <br />
            <div class="panel-body">
                <table class="table">
                    <tr><td>id</td><td>{{ $product_cat->id }}</td></tr>
                     <tr><td>name</td><td>{{ $product_cat['name'] }}</td></tr>
					<tr><td>code</td><td>{{ $product_cat['code'] }}</td></tr>
					<tr><td>business_type_id</td><td>{{ $product_cat['business_type_id'] }}</td></tr>
					
                </table>
            </div>
        </div>
    </div>
</div>
@stop