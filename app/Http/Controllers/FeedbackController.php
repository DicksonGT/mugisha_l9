<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Lang;

class FeedbackController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$feedback = Feedback::latest()->get();
		return view('admin.feedback.index', compact('feedback'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$member = \App\Models\Member::pluck('name','id');
		$offer = \App\Models\Offer::pluck('name','id');
		
		return view('admin.feedback.create', compact('member','offer'));
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		feedback::create($request->all());
		return redirect('admin/feedback')->with('success', Lang::get('message.success.create'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$feedback = Feedback::findOrFail($id);
		return view('admin.feedback.show', compact('feedback'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$feedback = Feedback::findOrFail($id);
		return view('admin.feedback.edit', compact('feedback'));
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
		$feedback = Feedback::findOrFail($id);
		$feedback->update($request->all());
		return redirect('admin/feedback')->with('success', Lang::get('message.success.update'));
	}

	/**
	 * Delete confirmation for the given Feedback.
	 *
	 * @param  int      $id
	 * @return View
	 */
	public function getModalDelete($id = null)
	{
        $error = '';
        $model = '';
        $confirm_route =  route('admin.feedback.delete',['id'=>$id]);
        return View('admin/layouts/modal_confirmation', compact('error','model', 'confirm_route'));

	}

	/**
	 * Delete the given Feedback.
	 *
	 * @param  int      $id
	 * @return Redirect
	 */
	public function getDelete($id = null)
	{
		$feedback = Feedback::destroy($id);

        // Redirect to the group management page
        return redirect('admin/feedback')->with('success', Lang::get('message.success.delete'));

	}

}