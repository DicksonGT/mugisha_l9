@extends('layouts/clear')

{{-- Page title --}}
@section('title')
Ratiba ya Madaktari Leo
@parent
@stop

@section('content')
<section class="content-header">
    <h1>Ratiba ya Madaktari Leo</h1>
    
</section>

<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Ratiba ya Madaktari Leo
                </h4>
            </div>
            <br />
            <div class="panel-body">
                <table class="styled-table table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Jina</th>
                            <th>Taaluma</th>
                            <th>Chumba</th>
                            <th>Muda</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Dr Ngweno</td>
                            <td>Physician</td>
                            <td>5</td>
                            <td>10AM- 4PM</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Dr Muhenga</td>
                            <td>Gynecologist</td>
                            <td>1</td>
                            <td>9AM- 2PM</td>
                        </tr>
                        <tr class="active-row">
                            <td>3</td>
                            <td>Dr Mariam</td>
                            <td>Surgen</td>
                            <td>4</td>
                            <td>11AM- 3PM</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop