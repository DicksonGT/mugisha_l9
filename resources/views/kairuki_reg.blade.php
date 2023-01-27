@extends('layouts/clear')

{{-- Page title --}}
@section('title')
members List
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
                
                <h3 class="text-primary">Jisajili Kwa Huduma</h3>
                <!-- Notifications -->
                @include('notifications')

                @if (isset($errors) && !$errors->isEmpty())
                    @foreach ($errors->all() as $error)
                        <div class="text-danger">{{ $error }}</div>
                    @endforeach
                @endif
                <form action="{{ route('kairuki_register') }}" method="POST">
                    <!-- CSRF Token -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <div class="form-group {{ $errors->first('full_name', 'has-error') }}">
                        <label class="sr-only"> Jina la Kamili</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Jina la Kamili"
                               value="{!! old('full_name') !!}" required>
                        {!! $errors->first('full_name', '<span class="help-block">:message</span>') !!}
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

                    <div class="form-group {{ $errors->first('tribe', 'has-error') }}">
                        <label class="sr-only"> Kabila</label>
                        <input type="text" class="form-control" id="tribe" name="tribe" placeholder="Kabila"
                               value="{!! old('tribe') !!}" required>
                        {!! $errors->first('tribe', '<span class="help-block">:message</span>') !!}
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

                    <div class="form-group {{ $errors->first('doctor', 'has-error') }}">
                        <label class="sr-only"> Daktari Unayetaka Kumwona</label>
                        <input type="text" class="form-control" id="doctor" name="doctor" placeholder="Daktari Unayetaka Kumwona"
                               value="{!! old('doctor') !!}" required>
                        {!! $errors->first('doctor', '<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group {{ $errors->first('residence', 'has-error') }}">
                        <label class="sr-only"> Unaishi wapi?</label>
                        <input type="text" class="form-control" id="residence" name="residence" placeholder="Unaishi wapi?"
                               value="{!! old('residence') !!}" required>
                        {!! $errors->first('residence', '<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group {{ $errors->first('payment', 'has-error') }}">
                        <label class="sr-only"> Malipo</label>
                        <select type="select" class="form-control" id="payment" name="payment" placeholder="payment" value="{!! old('payment') !!}">
                            <option>Chagua Aina ya Malipo</option>
                            <option>Bima (NHIF)</option>
                            <option>Bima (Strategis) </option>
                            <option>Bima (AAR)</option>
                            <option>Cash</option>
                        </select>
                    </div>

                    <input type="submit" onclick="submit()" class="btn btn-block btn-primary" value="Tuma" name="submit">
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
        
        function submit() {  
            alert("Taarifa zako zimepokelewa, karibu hospitalini");  
            return true;
        } 
    </script>

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
