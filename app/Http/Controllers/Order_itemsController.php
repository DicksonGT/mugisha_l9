<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Order_item;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Lang;

class Order_itemsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$order_items = Order_item::latest()->get();
		return view('admin.order_items.index', compact('order_items'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$product = \App\Models\Product::pluck('name','id');
		$service = \App\Models\Service::pluck('name','id');
		$member = \App\Models\Member::pluck('name','id');
		
		return view('admin.order_items.create', compact('product','service','member'));
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		order_item::create($request->all());
		return redirect('admin/order_items')->with('success', Lang::get('message.success.create'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$order_item = Order_item::findOrFail($id);
		return view('admin.order_items.show', compact('order_item'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$order_item = Order_item::findOrFail($id);
		return view('admin.order_items.edit', compact('order_item'));
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
		$order_item = Order_item::findOrFail($id);
		$order_item->update($request->all());
		return redirect('admin/order_items')->with('success', Lang::get('message.success.update'));
	}

	/**
	 * Delete confirmation for the given Order_item.
	 *
	 * @param  int      $id
	 * @return View
	 */
	public function getModalDelete($id = null)
	{
        $error = '';
        $model = '';
        $confirm_route =  route('admin.order_items.delete',['id'=>$id]);
        return View('admin/layouts/modal_confirmation', compact('error','model', 'confirm_route'));

	}

	/**
	 * Delete the given Order_item.
	 *
	 * @param  int      $id
	 * @return Redirect
	 */
	public function getDelete($id = null)
	{
		$order_item = Order_item::destroy($id);

        // Redirect to the group management page
        return redirect('admin/order_items')->with('success', Lang::get('message.success.delete'));

	}

}