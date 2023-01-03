<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Lang;

class TransactionsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$transactions = Transaction::latest()->get();
		return view('admin.transactions.index', compact('transactions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$txn = \App\Models\Txn::pluck('name','id');
		$company = \App\Models\Company::pluck('name','id');
		$member = \App\Models\Member::pluck('name','id');
		$offer = \App\Models\Offer::pluck('name','id');
		
		return view('admin.transactions.create', compact('txn','company','member','offer'));
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		transaction::create($request->all());
		return redirect('admin/transactions')->with('success', Lang::get('message.success.create'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$transaction = Transaction::findOrFail($id);
		return view('admin.transactions.show', compact('transaction'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$transaction = Transaction::findOrFail($id);
		return view('admin.transactions.edit', compact('transaction'));
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
		$transaction = Transaction::findOrFail($id);
		$transaction->update($request->all());
		return redirect('admin/transactions')->with('success', Lang::get('message.success.update'));
	}

	/**
	 * Delete confirmation for the given Transaction.
	 *
	 * @param  int      $id
	 * @return View
	 */
	public function getModalDelete($id = null)
	{
        $error = '';
        $model = '';
        $confirm_route =  route('admin.transactions.delete',['id'=>$id]);
        return View('admin/layouts/modal_confirmation', compact('error','model', 'confirm_route'));

	}

	/**
	 * Delete the given Transaction.
	 *
	 * @param  int      $id
	 * @return Redirect
	 */
	public function getDelete($id = null)
	{
		$transaction = Transaction::destroy($id);

        // Redirect to the group management page
        return redirect('admin/transactions')->with('success', Lang::get('message.success.delete'));

	}

}