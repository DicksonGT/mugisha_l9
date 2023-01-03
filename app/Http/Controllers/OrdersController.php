<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Lang;

class OrdersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$orders = Order::latest()->get();
		return view('admin.orders.index', compact('orders'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$client = \App\Models\Client::pluck('name','id');
		$status = \App\Models\Status::pluck('name','id');
		
		return view('admin.orders.create', compact('client','status'));
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		order::create($request->all());
		return redirect('admin/orders')->with('success', Lang::get('message.success.create'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$order = Order::findOrFail($id);
		return view('admin.orders.show', compact('order'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$order = Order::findOrFail($id);
		return view('admin.orders.edit', compact('order'));
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
		$order = Order::findOrFail($id);
		$order->update($request->all());
		return redirect('admin/orders')->with('success', Lang::get('message.success.update'));
	}

	/**
	 * Delete confirmation for the given Order.
	 *
	 * @param  int      $id
	 * @return View
	 */
	public function getModalDelete($id = null)
	{
        $error = '';
        $model = '';
        $confirm_route =  route('admin.orders.delete',['id'=>$id]);
        return View('admin/layouts/modal_confirmation', compact('error','model', 'confirm_route'));

	}

	/**
	 * Delete the given Order.
	 *
	 * @param  int      $id
	 * @return Redirect
	 */
	public function getDelete($id = null)
	{
		$order = Order::destroy($id);

        // Redirect to the group management page
        return redirect('admin/orders')->with('success', Lang::get('message.success.delete'));

	}

}