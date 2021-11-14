<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	public function login(Request $request)
	{
		$credentials = $request->validate([
			'name' => ['required'],
			'password' => ['required'],
		]);
		if (Auth::attempt($credentials)) {
			$token = $request->user()->createToken('api-pasumn-login');
			return response()->json($token->plainTextToken);
		}
		return response()->json(false);
	}

	public function authcheck(Request $request)
	{
		return response()->json(true);
	}
}
