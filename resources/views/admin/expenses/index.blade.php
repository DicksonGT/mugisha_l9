@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
expenses List
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
@stop


{{-- Page content --}}
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
                <h4 class="panel-title pull-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Expenses List
                </h4>
                <div class="pull-right">
                    <a href="{{ route('expenses.create') }}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
                </div>
            </div>
            <br />
            <div class="panel-body">
                <table class="table table-bordered " id="table">
                    <thead>
                        <tr class="filters">
                            <th>ID</th>
                            <th>Client</th>
							<th>Item</th>
							<th>Paid On</th>
							<th>Payment Method</th>
							<th style="text-align:right;">Amount</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($expenses as $expense)
                        <tr>
                            <td>{!! $expense->id !!}</td>
                            <td>{!! $expense->member->first_name .' '.$expense->member->last_name !!}</td>
							<td>{!! $expense->item !!}</td>
							<td>{!! $expense->paid_on !!}</td>
							<td style="text-align:center;">
                                @if ($expense->payment_method == 1 )
                                    Cash
                                @elseif ($expense->payment_method == 2)
                                    Kadi

                                @elseif ($expense->payment_method == 3)
                                    Mkopo
                                @elseif ($expense->payment_method == 4)
                                    QR Code
                                @endif
                            </td>
							<td style="text-align: right;">{!! number_format($expense->amount) !!}</td>
                            
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>    <!-- row-->
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}" ></script>

<script>
$(document).ready(function() {
    $('#table').DataTable({
        "pageLength": 25,
        "order": [0,"desc"]
    });
});
</script>


<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    </div>
  </div>
</div>
<script>$(function () {$('body').on('hidden.bs.modal', '.modal', function () {$(this).removeData('bs.modal');});});</script>
@stop
