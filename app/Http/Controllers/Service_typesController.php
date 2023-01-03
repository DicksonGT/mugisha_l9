<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Service_type;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Lang;

class Service_typesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$service_types = Service_type::latest()->get();
		return view('admin.service_types.index', compact('service_types'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		return view('admin.service_types.create');
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		service_type::create($request->all());
		return redirect('admin/service_types')->with('success', Lang::get('message.success.create'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$service_type = Service_type::findOrFail($id);
		return view('admin.service_types.show', compact('service_type'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$service_type = Service_type::findOrFail($id);
		return view('admin.service_types.edit', compact('service_type'));
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
		$service_type = Service_type::findOrFail($id);
		$service_type->update($request->all());
		return redirect('admin/service_types')->with('success', Lang::get('message.success.update'));
	}

	/**
	 * Delete confirmation for the given Service_type.
	 *
	 * @param  int      $id
	 * @return View
	 */
	public function getModalDelete($id = null)
	{
        $error = '';
        $model = '';
        $confirm_route =  route('admin.service_types.delete',['id'=>$id]);
        return View('admin/layouts/modal_confirmation', compact('error','model', 'confirm_route'));

	}

	/**
	 * Delete the given Service_type.
	 *
	 * @param  int      $id
	 * @return Redirect
	 */
	public function getDelete($id = null)
	{
		$service_type = Service_type::destroy($id);

        // Redirect to the group management page
        return redirect('admin/service_types')->with('success', Lang::get('message.success.delete'));

	}

}