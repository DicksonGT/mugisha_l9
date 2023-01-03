<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Loan_detail;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Lang;

class Loan_detailsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$loan_details = Loan_detail::latest()->get();
		return view('admin.loan_details.index', compact('loan_details'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$member = \App\Models\Member::pluck('name','id');
		$mfi = \App\Models\Mfi::pluck('name','id');
		$mfi_product = \App\Models\Mfi_product::pluck('name','id');
		$status = \App\Models\Status::pluck('name','id');
		
		return view('admin.loan_details.create', compact('member','mfi','mfi_product','status'));
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		loan_detail::create($request->all());
		return redirect('admin/loan_details')->with('success', Lang::get('message.success.create'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$loan_detail = Loan_detail::findOrFail($id);
		return view('admin.loan_details.show', compact('loan_detail'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$loan_detail = Loan_detail::findOrFail($id);
		return view('admin.loan_details.edit', compact('loan_detail'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		//$this->validate($request, ['name' => 'required']); // Uncomment and modify if needed.
		$loan_detail = Loan_detail::findOrFail($id);
		$loan_detail->update($request->all());
		return redirect('admin/loan_details')->with('success', Lang::get('message.success.update'));
	}

	/**
	 * Delete confirmation for the given Loan_detail.
	 *
	 * @param  int      $id
	 * @return View
	 */
	public function getModalDelete($id = null)
	{
        $error = '';
        $model = '';
        $confirm_route =  route('admin.loan_details.delete',['id'=>$id]);
        return View('admin/layouts/modal_confirmation', compact('error','model', 'confirm_route'));

	}

	/**
	 * Delete the given Loan_detail.
	 *
	 * @param  int      $id
	 * @return Redirect
	 */
	public function getDelete($id = null)
	{
		$loan_detail = Loan_detail::destroy($id);

        // Redirect to the group management page
        return redirect('admin/loan_details')->with('success', Lang::get('message.success.delete'));

	}

}