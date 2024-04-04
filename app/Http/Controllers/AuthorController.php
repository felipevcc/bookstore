<?php

namespace App\Http\Controllers;

use App\Http\Requests\Author\AuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
	public function index(Request $request)
	{
		$authors = Author::get();
		if (!$request->ajax()) return view();
		return response()->json(['authors' => $authors], 200);
	}

	public function create()
	{
		//
	}

	public function store(AuthorRequest $request)
	{
		$author = new Author($request->all());
		$author->save();
		if (!$request->ajax()) return back()->with('success', 'Author created successfully');
		return response()->json(['status' => 'Author created successfully', 'author' => $author], 201);
	}

	public function show(Request $request, Author $author)
	{
		if (!$request->ajax()) return view();
		return response()->json(['author' => $author], 200);
	}

	public function edit($id)
	{
		//
	}

	public function update(AuthorRequest $request, Author $author)
	{
		$author->update($request->all());
		if (!$request->ajax()) return back()->with('success', 'Author updated successfully');
		return response()->json([], 204);
	}

	public function destroy(Request $request, Author $author)
	{
		$author->delete();
		if (!$request->ajax()) return back()->with('success', 'Author deleted successfully');
		return response()->json([], 204);
	}
}
