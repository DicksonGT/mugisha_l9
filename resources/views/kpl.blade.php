@extends('layouts/clear')

{{-- Page title --}}
@section('title')
Home
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
    <!-- Container Section Start -->
    <div class="container">
        <div class="row" style="padding: 10px;">
            <!-- Contact form Section Start -->
            <h2><strong>Kairuki Pharmaceuticals Limited</strong> (KPL)</h2>
            <img src="assets/images/24-20201122100557.jpg" width="100%" />
            <p>Kairuki Pharmaceuticals Limited (KPL) ni kiwanda cha kisasa kilicho Zegeleni Industrial Area katika eneo la mraba 5,800Sqm. Kiwanda kina mitambo ya kisasa ya kuzalisha bidhaa mbalimbali kwa viwango vya kimataifa.</p>

            <p>Baadhi ya bidhaa tunazozalisha ni pamoja na:</p>
            <ul>
                <li>1. Ringer’s lactate (RL)</li>

                <li>2. Sodium chloride 0.9% 9 N/S</li>

                <li>3. Sodium chloride with 5% Dextrose (DNS)</li>

                <li>4. Dextrose 5%</li>

                5. Metronidazole</li>

                <li>6. Fluconazole IV</li>

                <li>7. Paracetamol IV</li>

                <li>8. Ciprofloxacin IV</li>

                <li>9. Plasma Expanders</li>

                <li>10. Dialysate Solution</li>

                <li>11. Acid Concentrate for Hemodialysis</li>

                <li>12. Other fluids including maintanance rehydration and special solutions.</li>

            </ul>

        <a href="kairuki_distributor_reg">Bonyeza haha kujisajili kama Msambazani</a>
        <h3>Jaza fomu Upate Bidhaa Zetu</h3>       
        <form>
            <div class="form-group {{ $errors->first('facility_name', 'has-error') }}">
                <label class="sr-only"> Jina Kituo</label>
                <input type="text" class="form-control" id="facility_name" name="facility_name" placeholder="Jina la Kituo"
                       value="{!! old('facility_name') !!}" required>
                {!! $errors->first('facility_name', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->first('region', 'has-error') }}">
                <label class="sr-only"> Mkoa</label>
                <input type="text" class="form-control" id="mkoa" name="mkoa" placeholder="Mkoa"
                       value="{!! old('mkoa') !!}" required>
                {!! $errors->first('mkoa', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->first('phone_number', 'has-error') }}">
                <label class="sr-only"> Namba ya Simu</label>
                <input type="number" class="form-control" id="phone_number" name="phone_number" placeholder="Namba ya Simu"
                       value="{!! old('phone_number') !!}" required>
                {!! $errors->first('phone_number', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->first('contact_person', 'has-error') }}">
                <label class="sr-only"> Jina la Muhusika</label>
                <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Jina la Muhusika"
                       value="{!! old('contact_person') !!}" required>
                {!! $errors->first('contact_person', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->first('product', 'has-error') }}">
                <label class="sr-only"> Bidhaa</label>
                <input type="text-area" class="form-control" id="product" name="product" placeholder="Bidhaa"
                       value="{!! old('product') !!}" required>
                {!! $errors->first('product', '<span class="help-block">:message</span>') !!}
            </div>

            <input type="submit" class="btn btn-block btn-primary" value="Tuma" name="submit">

        </form>
        <h3><center> Karibu tukuhudumie</center></h3>
        <p>
            <img src="assets/images/horizon.jpeg">
            <img src="assets/images/middle.jpeg">
            <img src="assets/images/mbagala.jpeg">
        </p>
    </div>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <!-- page level js starts-->
    <script type="text/javascript">
        
    </script>
    <!--page level js ends-->

@stop
