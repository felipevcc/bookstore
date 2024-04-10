<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\User\UserRequest;

class UserController extends Controller
{
	public function index(Request $request)
	{
		$users = User::with('roles')->get();
		if (!$request->ajax()) return view('users.index', compact('users'));
		return response()->json(['users' => $users], 200);
	}

	public function create()
	{
		$roles = Role::all()->pluck('name');
		return view('users.create', compact('roles'));
	}

	public function store(UserRequest $request)
	{
		$user = new User($request->all());
		$user->save();
		$user->assignRole($request->role);
		if (!$request->ajax()) return back()->with('success', 'User created successfully');
		return response()->json(['status' => 'User created', 'user' => $user], 201);
	}

	public function show(Request $request, User $user)
	{
		if (!$request->ajax()) return view();
		return response()->json(['user' => $user], 200);
	}

	public function edit(User $user)
	{
		$roles = Role::all()->pluck('name');
		return view('users.edit', compact('user', 'roles'));
	}

	public function update(UserRequest $request, User $user)
	{
		$data = $request->all();
		//Remove password from request if not submitted
		if (!$request->filled('password')) {
			unset($data['password'], $data['password_confirmation']);
		}
		$user->update($data);
		$user->syncRoles([$request->role]);
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
