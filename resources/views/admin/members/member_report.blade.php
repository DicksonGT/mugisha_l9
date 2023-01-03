@extends('layouts/clear')

{{-- Page title --}}
@section('title')
Member report
@parent
@stop

@section('content')
<section class="content-header">
    <h1>Member Report</h1>
    
</section>

<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    {{ $member->first_name }}'s details
                </h4>
            </div>
            <br />
            <div class="panel-body">
                <table class="table report-table">
                    
                     <tr><td>First name</td><td>{{ $member['first_name'] }}</td></tr>
                    <tr><td>Second name</td><td>{{ $member['second_name'] }}</td></tr>
                    <tr><td>Last name</td><td>{{ $member['last_name'] }}</td></tr>
                    <tr><td>Phone number</td><td>{{ $member['phone_number'] }}</td></tr>
                    <tr><td>Nida Number</td><td>{{ $member['nida_number'] }}</td></tr>
                    <tr><td>Employment Status</td><td>{{ $member['employment_status'] }}</td></tr>
                    <tr><td>Employer</td><td>{{ $member['employer'] }}</td></tr>
                    <tr><td>Region</td><td>{{ $member['region']['name'] }}</td></tr>
                    <tr><td>District</td><td>{{ $member['district']['name'] }}</td></tr>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <table class="table report-table">
            <th>Item</th>
            <th>Date</th>
            <th style="text-align:right; margin-right: 4px;">Payment Mode</th>
            <th style="text-align:right;">Amount</th>

            @foreach ($expense as $exp) 
            <tr>
                <td> {{ $exp->item }} </td>
                <td> {{ $exp->paid_on }} </td>
                <td style="text-align:right;">
                    @if ($exp->payment_method == 1 )
                        Cash
                    @elseif ($exp->payment_method == 2)
                        Kadi

                    @elseif ($exp->payment_method == 3)
                        Mkopo
                    @elseif ($exp->payment_method == 4)
                        QR Code
                    @endif
                </td>
                <td style="text-align:right;"> {{ number_format($exp->amount) }} </td>
            </tr>

            @endforeach
        </table>
    </div>

@stop