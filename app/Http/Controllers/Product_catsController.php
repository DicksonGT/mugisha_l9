<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Product_cat;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Lang;

class Product_catsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$product_cats = Product_cat::latest()->get();
		return view('admin.product_cats.index', compact('product_cats'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$business_type = \App\Models\Business_type::pluck('name','id');
		
		return view('admin.product_cats.create', compact('business_type'));
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		product_cat::create($request->all());
		return redirect('admin/product_cats')->with('success', Lang::get('message.success.create'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$product_cat = Product_cat::findOrFail($id);
		return view('admin.product_cats.show', compact('product_cat'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product_cat = Product_cat::findOrFail($id);
		return view('admin.product_cats.edit', compact('product_cat'));
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
		$product_cat = Product_cat::findOrFail($id);
		$product_cat->update($request->all());
		return redirect('admin/product_cats')->with('success', Lang::get('message.success.update'));
	}

	/**
	 * Delete confirmation for the given Product_cat.
	 *
	 * @param  int      $id
	 * @return View
	 */
	public function getModalDelete($id = null)
	{
        $error = '';
        $model = '';
        $confirm_route =  route('admin.product_cats.delete',['id'=>$id]);
        return View('admin/layouts/modal_confirmation', compact('error','model', 'confirm_route'));

	}

	/**
	 * Delete the given Product_cat.
	 *
	 * @param  int      $id
	 * @return Redirect
	 */
	public function getDelete($id = null)
	{
		$product_cat = Product_cat::destroy($id);

        // Redirect to the group management page
        return redirect('admin/product_cats')->with('success', Lang::get('message.success.delete'));

	}

}