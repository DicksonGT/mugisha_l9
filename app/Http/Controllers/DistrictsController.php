<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\District;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Lang;

class DistrictsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$districts = District::latest()->get();
		return view('admin.districts.index', compact('districts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$region = \App\Models\Region::pluck('name','id');
		
		return view('admin.districts.create', compact('region'));
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		district::create($request->all());
		return redirect('admin/districts')->with('success', Lang::get('message.success.create'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$district = District::findOrFail($id);
		return view('admin.districts.show', compact('district'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$district = District::findOrFail($id);
		return view('admin.districts.edit', compact('district'));
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
		$district = District::findOrFail($id);
		$district->update($request->all());
		return redirect('admin/districts')->with('success', Lang::get('message.success.update'));
	}

	/**
	 * Delete confirmation for the given District.
	 *
	 * @param  int      $id
	 * @return View
	 */
	public function getModalDelete($id = null)
	{
        $error = '';
        $model = '';
        $confirm_route =  route('admin.districts.delete',['id'=>$id]);
        return View('admin/layouts/modal_confirmation', compact('error','model', 'confirm_route'));

	}

	/**
	 * Delete the given District.
	 *
	 * @param  int      $id
	 * @return Redirect
	 */
	public function getDelete($id = null)
	{
		$district = District::destroy($id);

        // Redirect to the group management page
        return redirect('admin/districts')->with('success', Lang::get('message.success.delete'));

	}

}