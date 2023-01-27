@extends('layouts/clear')

{{-- Page title --}}
@section('title')
Jiisajili
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <!--end of global css-->
    <!--page level css starts-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/iCheck/css/all.css')}}" />
    
@stop


{{-- Page content --}}
@section('content')

     @if ($message = Session::get('error'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="content paddingleft_right15 container">
        <!--Content Section Start -->
        <div class="row">
            <div class="">
                
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
                        <label class="sr-only"> Jina la Kwanza</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Jina la Kwanza"
                               value="{!! old('first_name') !!}" required>
                        {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group {{ $errors->first('last_name', 'has-error') }}">
                        <label class="sr-only"> Jina la Pili</label>
                        <input type="text" class="form-control" id="second_name" name="second_name" placeholder="Jina la Pili"
                               value="{!! old('second_name') !!}" required>
                        {!! $errors->first('second_name', '<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group {{ $errors->first('last_name', 'has-error') }}">
                        <label class="sr-only"> Jina la Mwisho</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Jina la Mwisho"
                               value="{!! old('last_name') !!}" required>
                        {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group {{ $errors->first('phone_number', 'has-error') }}">
                        <label class="sr-only"> Namba ya Simu</label>
                        <input type="number" class="form-control" id="phone_number" name="phone_number" placeholder="Namba ya Simu"
                               value="{!! old('phone_number') !!}" required>
                        {!! $errors->first('phone_number', '<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group {{ $errors->first('date_of_birth', 'has-error') }}" style="text-align:left  ">
                        <div style="text-align:left">Tarehe ya Kuzaliwa</div>

                        {!! Form::selectYear('year', 2005, 1930) !!}
                        {!! Form::selectMonth('month') !!}
                        {!! Form::selectRange('day', 1, 31) !!}

                    </div>

                    <div class="form-group {{ $errors->first('nida_number', 'has-error') }}">
                        <label class="sr-only"> Namba ya NIDA</label>
                        <input type="text" class="form-control" id="nida" name="nida_number" placeholder="Namba ya NIDA"
                               value="{!! old('nida_number') !!}">
                        {!! $errors->first('nida_number', '<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group {{ $errors->first('region', 'has-error') }}">
                        <label class="sr-only"> Mkoa</label>
                        <select type="text" class="form-control" id="region" name="region" placeholder="Mkoa" value="{!! old('region') !!}">
                            <option>Chagua Mkoa</option>
                                @foreach($regions as $region)
                                  <option value="{{ $region->id }}">{{$region->name}}</option>
                                @endforeach
                        </select>

                    </div>

                    <div class="form-group {{ $errors->first('region', 'has-error') }}">
                        <label class="sr-only"> Wilaya</label>
                        <select type="select" class="form-control" id="district" name="district" placeholder="Wilaya" value="{!! old('district') !!}">
                            <option>Chagua Wilaya</option>
                                
                        </select>
                    </div>

                    <div class="form-group {{ $errors->first('employment_status', 'has-error') }}">
                        <label class="sr-only"> Hali ya Ajira</label>
                        <select type="select" class="form-control" id="employment_status" name="employment_status" placeholder="Hali ya Ajira" value="{!! old('employment_status') !!}">
                            <option>Chagua Hali ya Ajira</option>
                            <option value="employed">Nimeajiriwa</option>
                            <option value="selfemployed">Mfanya Biashara</option>
                            <option value="nonemployed">Sina Ajira</option>
                        </select>
                    </div>

                    <div class="form-group {{ $errors->first('employer', 'has-error') }}">
                        <div id="employer_div" class="hidden">
                            <label class="sr-only"> Mwajiri Wako</label>
                            <input type="text-area" class="form-control" id="employer" name="employer" placeholder="Mwajiri wako">
                            {!! $errors->first('employer', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->first('business_type', 'has-error') }}">
                        <div id="business_type" class="hidden">
                            <select type="select" class="form-control" id="business_type" name="business_type" placeholder="Aina ya Biashara">
                                <option>Aina ya Biashara</option>
                                <option value="chakula">Chakula</option>
                                <option value="genge">Genge</option>
                                <option value="duka">Duka/Kioski</option>
                            </select>

                            {!! $errors->first('business_type', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->first('business_earning', 'has-error') }}">
                        <div id="business_income" class="hidden">
                            <input type="text" class="form-control" id="income" name="income" placeholder="Kipato Kwa Wiki Kwenye Biashara">
                            {!! $errors->first('income', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->first('gender', 'has-error') }}">
                        <label class="sr-only">Jinsia</label>
                        <label class="radio-inline">
                            <input type="radio" name="gender" id="inlineRadio1" value="male"> Mme
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="gender" id="inlineRadio2" value="female"> Mke
                        </label>
                        {!! $errors->first('gender', '<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group {{ $errors->first('clubfanatic', 'has-error') }}">
                        <label class="">Klabu yako Pendwa</label>
                        <label class="radio-inline">
                            <input type="radio" name="club" id="club" value="1"> Simba
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="club" id="club" value="2"> Yanga
                        </label>
                        {!! $errors->first('clubfanatic', '<span class="help-block">:message</span>') !!}
                    </div>


                    <div class="form-group {{ $errors->first('password', 'has-error') }}">
                        <label class="sr-only"> Neno Siri</label>
                        <input type="password" class="form-control" id="Password1" name="password" placeholder="Neno Siri">
                        {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group {{ $errors->first('password_confirm', 'has-error') }}">
                        <label class="sr-only"> Rudia Neno Siri</label>
                        <input type="password" class="form-control" id="Password2" name="password_confirm"
                               placeholder="Rudia Neno Siri">
                        {!! $errors->first('password_confirm', '<span class="help-block">:message</span>') !!}
                    </div>
                    
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" checked name="subscribed" >Nakubali <a href="#"> Vigezo na Masharti</a>
                        </label>
                    </div>
                    <input type="submit" class="btn btn-block btn-primary" value="Tuma" name="submit">
                    <!-- Already have an account? Please <a href="{{ route('login') }}"> Sign In</a> -->
                </form>
            </div>
        </div>
        <!-- //Content Section End -->
    </div>
@stop

    <!--global js starts-->
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
    <!--global js end-->

    <script type="text/javascript">
        $(document).ready(function () {
            $("input[type='checkbox'],input[type='radio']").iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });

            $('select[name="year"]').addClass('form-control');
            $('select[name="month"]').addClass('form-control');
            $('select[name="day"]').addClass('form-control');

            $('#employment_status').on('change', function(){
                console.log("select change");
                var employed = $("#employment_status").val();
                console.log("selected value: "+employed);
                if ($("#employment_status").val() == "employed"){
                    
                    $('#employer_div').removeClass('hidden');
                    $('#business_income').addClass('hidden');
                    $('#business_type').addClass('hidden');

                }else if ($("#employment_status").val() == "selfemployed"){
                    $('#business_income').removeClass('hidden');
                    $('#business_type').removeClass('hidden');
                    $('#employer_div').addClass('hidden');

                }else{
                    console.log("no employment");
                    $('#business_income').addClass('hidden');
                    $('#employer_div').addClass('hidden');
                    $('#business_type').addClass('hidden');
                    
                }
            });

            $('#region').on('change', function () {
                var regionId = this.value;
                $('#district').html('');
                $.ajax({
                    url: '{{ route('getdistricts') }}?region_id='+regionId,
                    type: 'get',
                    success: function (res) {
                        $('#district').html('<option value="">Chagua Wilaya</option>');
                        $.each(res, function (key, value) {
                            $('#district').append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        //$('#city').html('<option value="">Select City</option>');
                    }
                });
            });
        });
    </script>

</html>
