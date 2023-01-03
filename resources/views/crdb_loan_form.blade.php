@extends('layouts/clear')

{{-- Page title --}}
@section('title')
CRDB Loan Form
@parent

@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/home.css') }}">
    <!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
<img src="{{ asset('assets/images/crdb_logo.png') }}" style="align-content: center; margin-left: 100px;">
    <!-- Container Section Start -->
    <div class="container">
        <div class="row">
            <!-- Contact form Section Start -->
            <h2>CRDB Loan Form</h2>
            <h3 class="text-primary">Jisajili</h3>
            <!-- Notifications -->
            @include('notifications')
            @if (isset($errors) && !$errors->isEmpty())
                @foreach ($errors->all() as $error)
                    <div class="text-danger">{{ $error }}</div>
                @endforeach
            @endif
            <form action="{{ route('register') }}" method="POST">
                <!-- CSRF Token -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <div class="form-group {{ $errors->first('first_name', 'has-error') }}">
                    <label class="sr-only"> Matumizi ya Mkopo</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Matumizi ya Mkopo"
                           value="{!! old('first_name') !!}" required>
                    {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->first('region', 'has-error') }}">
                    <label class="sr-only"> Mkoa</label>
                    <select type="text" class="form-control" id="region" name="region" placeholder="Mkoa" value="{!! old('region') !!}">
                        <option>Chagua Aina Ya Mkopo</option>
                            @foreach($loan_products as $product)
                              <option value="{{ $product->id }}">{{ $product->name  }}</option>
                            @endforeach
                    </select>

                </div>

                <div class="form-group {{ $errors->first('amount', 'has-error') }}">
                    
                    <select type="select" class="form-control" id="loan_amount" name="loan_amount" placeholder="Kiasi Cha Mkopo" value="{!! old('amount') !!}">
                        <option>Chagua Muda wa Marejesho</option>
                        <option>Kila Wiki</option>
                        <option>Kila Wiki Mbili</option>
                        <option>Kila Mwezi</option>

                    </select>
                </div>

                <label > Kiasi cha Rejesho: TShs. 15,700 </label>
                <div class="form-group {{ $errors->first('employer', 'has-error') }}">    
                    <label class="sr-only"> Kiasi Cha Mkopo</label>
                    <input type="text-area" class="form-control" id="employer" name="employer" placeholder="Kiasi Cha Mkopo">
                    {!! $errors->first('employer', '<span class="help-block">:message</span>') !!}
                
                </div>

                <div class="form-group {{ $errors->first('gender', 'has-error') }}">
                    <label class="radio-inline">
                        <input type="radio" name="gender" id="inlineRadio1" value="male"> Nakubali Mkopo
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="gender" id="inlineRadio2" value="female"> Sijakubali Mkopo
                    </label>
                    {!! $errors->first('gender', '<span class="help-block">:message</span>') !!}
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" checked name="subscribed" >Nakubali <a href="#"> Vigezo na Masharti</a>
                    </label>
                </div>
                <input type="submit" class="btn btn-block btn-primary" value="Tuma Maombi" name="submit">
                <!-- Already have an account? Please <a href="{{ route('login') }}"> Sign In</a> -->
            </form>
    </div>
    
@stop

{{-- page level scripts --}}
@section('footer_scripts')

@stop
