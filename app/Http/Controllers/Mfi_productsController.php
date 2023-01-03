<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Mfi_product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Lang;

class Mfi_productsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$mfi_products = Mfi_product::latest()->get();
		return view('admin.mfi_products.index', compact('mfi_products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		return view('admin.mfi_products.create');
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		mfi_product::create($request->all());
		return redirect('admin/mfi_products')->with('success', Lang::get('message.success.create'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$mfi_product = Mfi_product::findOrFail($id);
		return view('admin.mfi_products.show', compact('mfi_product'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$mfi_product = Mfi_product::findOrFail($id);
		return view('admin.mfi_products.edit', compact('mfi_product'));
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
		$mfi_product = Mfi_product::findOrFail($id);
		$mfi_product->update($request->all());
		return redirect('admin/mfi_products')->with('success', Lang::get('message.success.update'));
	}

	/**
	 * Delete confirmation for the given Mfi_product.
	 *
	 * @param  int      $id
	 * @return View
	 */
	public function getModalDelete($id = null)
	{
        $error = '';
        $model = '';
        $confirm_route =  route('admin.mfi_products.delete',['id'=>$id]);
        return View('admin/layouts/modal_confirmation', compact('error','model', 'confirm_route'));

	}

	/**
	 * Delete the given Mfi_product.
	 *
	 * @param  int      $id
	 * @return Redirect
	 */
	public function getDelete($id = null)
	{
		$mfi_product = Mfi_product::destroy($id);

        // Redirect to the group management page
        return redirect('admin/mfi_products')->with('success', Lang::get('message.success.delete'));

	}

}