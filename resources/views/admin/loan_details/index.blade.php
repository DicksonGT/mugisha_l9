@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
loan_details List
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
    <h1>Loan Details</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>loan_details</li>
        <li class="active">loan_details</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Loan Details List
                </h4>
                <div class="pull-right">
                    <a href="{{ route('loan_details.create') }}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
                </div>
            </div>
            <br />
            <div class="panel-body">
                <table class="table table-bordered " id="table">
                    <thead>
                        <tr class="filters">
                            <th>ID</th>
                            <th>Member</th>
							<th>Amount Requested</th>
							<th>Amount Granted</th>
							<th>Request Date</th>
							<th>Funding Date</th>
							<th>Mfi</th>
							<th>Mfi Product</th>
							<th>Status Code</th>
							<th>Comment</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($loan_details as $loan_detail)
                        <tr>
                            <td>{!! $loan_detail->id !!}</td>
                            <td>{!! $loan_detail->member->name !!}</td>
							<td>{!! $loan_detail->amount_requested !!}</td>
							<td>{!! $loan_detail->amount_granted !!}</td>
							<td>{!! $loan_detail->request_date !!}</td>
							<td>{!! $loan_detail->funding_date !!}</td>
							<td>{!! $loan_detail->mfi->name !!}</td>
							<td>{!! $loan_detail->mfi_product->name !!}</td>
							<td>{!! $loan_detail->status->name !!}</td>
							<td>{!! $loan_detail->comment !!}</td>
                            <td>
                                <a href="{{ route('loan_details.show', $loan_detail->id) }}">
                                    <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view loan_detail"></i>
                                </a>
                                <a href="{{ route('loan_details.edit', $loan_detail->id) }}">
                                    <i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="edit loan_detail"></i>
                                </a>
                                <a href="{{ route('admin.loan_details.confirm-delete', $loan_detail->id) }}" data-toggle="modal" data-target="#delete_confirm">
                                    <i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete loan_detail"></i>
                                </a>
                            </td>
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
