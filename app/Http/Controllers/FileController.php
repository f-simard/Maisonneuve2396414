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
		$files = File::select()->paginate(10);

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
		$request->validate(
			[
				'name_en' => 'required_without:title_fr',
				'name_fr' => 'required_without:title_en',
				'file' => 'required|mimes:doc,zip,pdf|max:2048'
			],
			[
				'name_en.required_without' => trans('validation.title_required'),
				'name_fr.required_without' => trans('validation.title_required'),
			]
		);

		$path = $request->file('file')->store('files', 'public');

		$file_name = [];

		if ($request->name_en != null) {
			$file_name = $file_name + ['en' => $request->name_en];
		};

		if ($request->name_fr != null) {
			$file_name = $file_name + ['fr' => $request->name_fr];
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
		if ($file->user_id !== Auth::user()->id) {
			return redirect()->route('file.index')->with('error', trans('unauthorized'));
		} else {
			return view('file.edit', ['file' => $file]);
		}
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
		if ($file->user_id !== Auth::user()->id) {
			return redirect()->route('file.show', $file->id)->with('error', trans('unauthorized'));
		} else {

			$request->validate(
				[
					'name_en' => 'required_without:title_fr',
					'name_fr' => 'required_without:title_en',
				],
				[
					'name_en.required_without' => trans('validation.title_required'),
					'name_fr.required_without' => trans('validation.title_required'),
				]
			);

			$file_name = [];

			if ($request->name_en != null) {
				$file_name = $file_name + ['en' => $request->name_en];
			};

			if ($request->name_fr != null) {
				$file_name = $file_name + ['fr' => $request->name_fr];
			};

			$file->update(
				[
					'name' => $file_name,
				]
			);

			return redirect()->route('file.index')->with(
				'success',
				trans('success_update_file')
			);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\File  $file
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(File $file)
	{

		if ($file->user_id !== Auth::user()->id) {

			return redirect()->route('file.index')->with('error', trans('unauthorized'));

		} else {

			// Check if the file exists and delete it
			if (Storage::disk('public')->exists($file->path)) {
				Storage::disk('public')->delete($file->path);
			}

			// Optionally, delete the file record from the database as well
			$file->delete();

			return redirect()->route('file.index')->with('success', trans('success_delete_file'));
		}
	}
}
