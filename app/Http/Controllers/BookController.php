<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Traits\UploadFile;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Book\BookRequest;
use App\Http\Requests\Book\BookUpdateRequest;

class BookController extends Controller
{
	use UploadFile;

	public function home()
	{
		$books = Book::with('author', 'category', 'file')->whereHas('category')->where('stock', '>', 0)->get();
		return view('index', compact('books'));
	}

	public function index(Request $request)
	{
		$authors = Author::get();
		$books = Book::with('author', 'category', 'file')->whereHas('category')->get();
		if (!$request->ajax()) return view('books.index', compact('books', 'authors'));
		return response()->json(['books' => $books], 200);
	}

	public function store(BookRequest $request)
	{
		try {
			DB::beginTransaction();
			$book = new Book($request->all());
			$book->save();
			$this->uploadFile($book, $request);
			DB::commit();
			if (!$request->ajax()) return back()->with('success', 'Book created successfully');
			return response()->json(['status' => 'Book created successfully', 'book' => $book], 201);
		} catch (\Throwable $th) {
			DB::rollback();
			throw $th;
		}
	}

	public function show(Request $request, Book $book)
	{
		if (!$request->ajax()) return view();
		return response()->json(['book' => $book], 200);
	}

	public function update(BookUpdateRequest $request, Book $book)
	{
		try {
			DB::beginTransaction();
			$book->update($request->all());
			$this->uploadFile($book, $request);
			DB::commit();
			if (!$request->ajax()) return back()->with('success', 'Book updated successfully');
			return response()->json([], 204);
		} catch (\Throwable $th) {
			DB::rollback();
			throw $th;
		}
	}

	public function destroy(Request $request, Book $book)
	{
		$book->delete();
		$this->deleteFile($book);
		if (!$request->ajax()) return back()->with('success', 'Book deleted successfully');
		return response()->json([], 204);
	}
}
