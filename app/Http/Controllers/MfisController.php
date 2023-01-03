<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Mfi;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Lang;

class MfisController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$mfis = Mfi::latest()->get();
		return view('admin.mfis.index', compact('mfis'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$region = \App\Models\Region::pluck('name','id');
		$district = \App\Models\District::pluck('name','id');
		
		return view('admin.mfis.create', compact('region','district'));
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		mfi::create($request->all());
		return redirect('admin/mfis')->with('success', Lang::get('message.success.create'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$mfi = Mfi::findOrFail($id);
		return view('admin.mfis.show', compact('mfi'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$mfi = Mfi::findOrFail($id);
		return view('admin.mfis.edit', compact('mfi'));
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
		$mfi = Mfi::findOrFail($id);
		$mfi->update($request->all());
		return redirect('admin/mfis')->with('success', Lang::get('message.success.update'));
	}

	/**
	 * Delete confirmation for the given Mfi.
	 *
	 * @param  int      $id
	 * @return View
	 */
	public function getModalDelete($id = null)
	{
        $error = '';
        $model = '';
        $confirm_route =  route('admin.mfis.delete',['id'=>$id]);
        return View('admin/layouts/modal_confirmation', compact('error','model', 'confirm_route'));

	}

	/**
	 * Delete the given Mfi.
	 *
	 * @param  int      $id
	 * @return Redirect
	 */
	public function getDelete($id = null)
	{
		$mfi = Mfi::destroy($id);

        // Redirect to the group management page
        return redirect('admin/mfis')->with('success', Lang::get('message.success.delete'));

	}

}