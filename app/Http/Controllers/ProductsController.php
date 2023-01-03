<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Lang;

class ProductsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Product::latest()->get();
		return view('admin.products.index', compact('products'));
	}

	public function public_index()
	{
		$products = Product::latest()->get();
		return view('products', compact('products'));	
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$product_cat = \App\Models\Product_cat::pluck('name','id');
		$status = \App\Models\Status::pluck('name','id');
		
		return view('admin.products.create', compact('product_cat','status'));
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		product::create($request->all());
		return redirect('admin/products')->with('success', Lang::get('message.success.create'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$product = Product::findOrFail($id);
		return view('admin.products.show', compact('product'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = Product::findOrFail($id);
		return view('admin.products.edit', compact('product'));
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
		$product = Product::findOrFail($id);
		$product->update($request->all());
		return redirect('admin/products')->with('success', Lang::get('message.success.update'));
	}

	/**
	 * Delete confirmation for the given Product.
	 *
	 * @param  int      $id
	 * @return View
	 */
	public function getModalDelete($id = null)
	{
        $error = '';
        $model = '';
        $confirm_route =  route('admin.products.delete',['id'=>$id]);
        return View('admin/layouts/modal_confirmation', compact('error','model', 'confirm_route'));

	}

	/**
	 * Delete the given Product.
	 *
	 * @param  int      $id
	 * @return Redirect
	 */
	public function getDelete($id = null)
	{
		$product = Product::destroy($id);

        // Redirect to the group management page
        return redirect('admin/products')->with('success', Lang::get('message.success.delete'));

	}

}