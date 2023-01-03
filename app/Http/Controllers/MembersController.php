<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Member;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Lang;

class MembersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$members = Member::latest()->get();
		return view('admin.members.index', compact('members'));
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
		
		return view('admin.members.create', compact('region','district'));
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		member::create($request->all());
		return redirect('admin/members')->with('success', Lang::get('message.success.create'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function auto_reg(Request $request)
	{
		member::create($request->all());
		//return $member;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$member = Member::findOrFail($id);
		return view('admin.members.show', compact('member'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function member_report($id)
	{

		$member = Member::findOrFail($id);
		$expense = \App\Models\Expense::where('client_id', $id)->get();
		return view('admin.members.member_report', compact('member', 'expense'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$member = Member::findOrFail($id);
		return view('admin.members.edit', compact('member'));
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
		$member = Member::findOrFail($id);
		$member->update($request->all());
		return redirect('admin/members')->with('success', Lang::get('message.success.update'));
	}

	/**
	 * Delete confirmation for the given Member.
	 *
	 * @param  int      $id
	 * @return View
	 */
	public function getModalDelete($id = null)
	{
        $error = '';
        $model = '';
        $confirm_route =  route('admin.members.delete',['id'=>$id]);
        return View('admin/layouts/modal_confirmation', compact('error','model', 'confirm_route'));

	}

	/**
	 * Delete the given Member.
	 *
	 * @param  int      $id
	 * @return Redirect
	 */
	public function getDelete($id = null)
	{
		$member = Member::destroy($id);

        // Redirect to the group management page
        return redirect('admin/members')->with('success', Lang::get('message.success.delete'));

	}

}