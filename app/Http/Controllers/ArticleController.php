<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('article.create');
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
				'title_en' => 'required_without:title_fr',
				'content_en' => 'required_with:title_en',
				'title_fr' => 'required_without:title_en',
				'content_fr' => 'required_with:title_fr',
			],
			[
				'title_en.required_without' => trans('validation.any_content_required'),
				'title_fr.required_without' => trans('validation.any_content_required'),
				'content_en.required_with' => trans('validation.content_required_if'),
				'content_fr.required_with' => trans('validation.content_required_if'),
			]
		);

		$article_title = [];

		if ($request->title_en != null) {
			$article_title = $article_title + ['en' => $request->title_en];
		};

		if ($request->title_fr != null) {
			$article_title = $article_title + ['fr' => $request->title_fr];
		};


		$article_content = [];
		if ($request->content_en != null) {
			$article_content = $article_content + ['en' => $request->content_en];
		};
		if ($request->content_fr != null) {
			$article_content = $article_content + ['fr' => $request->content_fr];
		};

		$article = Article::create(
			[
				'title' => $article_title,
				'content' => $article_content,
				'user_id' => Auth::user()->id
			]
		);

		return redirect()->route('article.show', $article->id)->with(
			'success',
			trans('success_create_article')
		);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Article  $article
	 * @return \Illuminate\Http\Response
	 */
	public function show(Article $article)
	{
		return view('article.show', ['article' => $article]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Article  $article
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Article $article)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Article  $article
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Article $article)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Article  $article
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Article $article)
	{
		//
	}
}
