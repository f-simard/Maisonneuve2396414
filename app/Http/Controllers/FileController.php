<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$files = File::select()->orderby('name')->paginate(10);

		return view('file.index', ['files' => $files]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('file.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$request->validate([
			'title_en' => 'required_without:title_fr',
			'title_fr' => 'required_without:title_en',
			'file' => 'required|mimes:doc,zip,pdf|max:2048'
		],
			[
				'title_en.required_without' => trans('validation.title_required'),
				'title_fr.required_without' => trans('validation.title_required'),
			]);

		$path = $request->file('file')->store('files', 'public');

		$file_name = [];

		if ($request->title_en != null) {
			$file_name = $file_name + ['en' => $request->title_en];
		};

		if ($request->title_fr != null) {
			$file_name = $file_name + ['fr' => $request->title_fr];
		};

		$file = File::create(
			[
				'name' => $file_name,
				'path' => $path,
				'user_id' => Auth::user()->id
			]
		);

		return redirect()->route('file.index')->with(
			'success',
			trans('success_create_file')
		);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\File  $file
	 * @return \Illuminate\Http\Response
	 */
	public function show(File $file)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\File  $file
	 * @return \Illuminate\Http\Response
	 */
	public function edit(File $file)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\File  $file
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, File $file)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\File  $file
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(File $file)
	{
		//
	}
}
