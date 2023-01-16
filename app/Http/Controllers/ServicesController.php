<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Service;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Lang;

class ServicesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$services = Service::latest()->get();
		return view('admin.services.index', compact('services'));
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function public_services()
	{
		$services = Service::latest()->get();
		return view('services', compact('services'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$service_type = \App\Models\Service_type::pluck('name','id');
		$status = \App\Models\Status::pluck('name','id');
		
		return view('admin.services.create', compact('service_type','status'));
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		service::create($request->all());
		return redirect('admin/services')->with('success', Lang::get('message.success.create'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$service = Service::findOrFail($id);
		return view('admin.services.show', compact('service'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$service = Service::findOrFail($id);
		return view('admin.services.edit', compact('service'));
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
		$service = Service::findOrFail($id);
		$service->update($request->all());
		return redirect('admin/services')->with('success', Lang::get('message.success.update'));
	}

	/**
	 * Delete confirmation for the given Service.
	 *
	 * @param  int      $id
	 * @return View
	 */
	public function getModalDelete($id = null)
	{
        $error = '';
        $model = '';
        $confirm_route =  route('admin.services.delete',['id'=>$id]);
        return View('admin/layouts/modal_confirmation', compact('error','model', 'confirm_route'));

	}

	/**
	 * Delete the given Service.
	 *
	 * @param  int      $id
	 * @return Redirect
	 */
	public function getDelete($id = null)
	{
		$service = Service::destroy($id);

        // Redirect to the group management page
        return redirect('admin/services')->with('success', Lang::get('message.success.delete'));

	}

}