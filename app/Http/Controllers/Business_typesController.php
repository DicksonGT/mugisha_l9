<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Business_type;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Lang;

class Business_typesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$business_types = Business_type::latest()->get();
		return view('admin.business_types.index', compact('business_types'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$status = \App\Models\Status::pluck('name','id');
		
		return view('admin.business_types.create', compact('status'));
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		business_type::create($request->all());
		return redirect('admin/business_types')->with('success', Lang::get('message.success.create'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$business_type = Business_type::findOrFail($id);
		return view('admin.business_types.show', compact('business_type'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$business_type = Business_type::findOrFail($id);
		return view('admin.business_types.edit', compact('business_type'));
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
		$business_type = Business_type::findOrFail($id);
		$business_type->update($request->all());
		return redirect('admin/business_types')->with('success', Lang::get('message.success.update'));
	}

	/**
	 * Delete confirmation for the given Business_type.
	 *
	 * @param  int      $id
	 * @return View
	 */
	public function getModalDelete($id = null)
	{
        $error = '';
        $model = '';
        $confirm_route =  route('admin.business_types.delete',['id'=>$id]);
        return View('admin/layouts/modal_confirmation', compact('error','model', 'confirm_route'));

	}

	/**
	 * Delete the given Business_type.
	 *
	 * @param  int      $id
	 * @return Redirect
	 */
	public function getDelete($id = null)
	{
		$business_type = Business_type::destroy($id);

        // Redirect to the group management page
        return redirect('admin/business_types')->with('success', Lang::get('message.success.delete'));

	}

}