<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Region;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Lang;

class RegionsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$regions = Region::latest()->get();
		return view('admin.regions.index', compact('regions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		return view('admin.regions.create');
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		region::create($request->all());
		return redirect('admin/regions')->with('success', Lang::get('message.success.create'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$region = Region::findOrFail($id);
		return view('admin.regions.show', compact('region'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$region = Region::findOrFail($id);
		return view('admin.regions.edit', compact('region'));
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
		$region = Region::findOrFail($id);
		$region->update($request->all());
		return redirect('admin/regions')->with('success', Lang::get('message.success.update'));
	}

	/**
	 * Delete confirmation for the given Region.
	 *
	 * @param  int      $id
	 * @return View
	 */
	public function getModalDelete($id = null)
	{
        $error = '';
        $model = '';
        $confirm_route =  route('admin.regions.delete',['id'=>$id]);
        return View('admin/layouts/modal_confirmation', compact('error','model', 'confirm_route'));

	}

	/**
	 * Delete the given Region.
	 *
	 * @param  int      $id
	 * @return Redirect
	 */
	public function getDelete($id = null)
	{
		$region = Region::destroy($id);

        // Redirect to the group management page
        return redirect('admin/regions')->with('success', Lang::get('message.success.delete'));

	}

}