<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthUserAPIController extends Controller
{
	public function login(AuthRequest $request)
	{
		// Get user by email
		$user = User::where('email', $request->email)->first();

		// Check email
		if (!$user) return response()->json($this->handlerMessage(401), 401);

		// Check password
		if (!Hash::check($request->password, $user->password)) {
			return response()->json($this->handlerMessage(401), 401);
		}
		// Create token
		$token = $user->createToken('auth_token')->plainTextToken;
		$data = ['access_token' => $token];
		return response()->json($this->handlerMessage(200, $data), 200);
	}

	public function logout()
	{
		/** @var \App\Models\User\User $user */
		$user = Auth::user();
		$user->tokens()->delete();
		return response()->json([], 204);
	}

	public function profile()
	{
		return response()->json(['auth_user' => Auth::user()], 200);
	}

	private function handlerMessage($code, $data = null)
	{
		switch ($code) {
			case 401:
				// Not authenticated, Unauthorized
				return ['login' => false, 'message' => 'Invalid email or password'];

			default:
				// Authorized
				return ['login' => true, 'message' => 'Successful login', 'data' => $data];
		}
	}
}
