<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function index(Request $request)
	{
		$users = User::get();
		if (!$request->ajax()) return view();
		return response()->json(['users' => $users], 200);
	}

	public function create()
	{
		// View
	}

	public function store(UserRequest $request)
	{
		$user = new User($request->all());
		$user->save();
		if (!$request->ajax()) return back()->with('success', 'User created successfully');
		return response()->json(['status' => 'User created', 'user' => $user], 201);
	}

	public function show(Request $request, User $user)
	{
		if (!$request->ajax()) return view();
		return response()->json(['user' => $user], 200);
	}

	public function edit($id)
	{
		// View
	}

	public function update(UserRequest $request, User $user)
	{
		$user->update($request->all());
		if (!$request->ajax()) return back()->with('success', 'User updated successfully');
		return response()->json([], 204);
	}

	public function destroy(Request $request, User $user)
	{
		$user->delete();
		if (!$request->ajax()) return back()->with('success', 'User deleted successfully');
		return response()->json([], 204);
	}
}
