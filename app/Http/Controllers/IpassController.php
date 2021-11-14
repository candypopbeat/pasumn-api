<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ipass;
use Illuminate\Support\Facades\Auth;

class IpassController extends Controller
{
	public function show($id)
	{
		$item = Ipass::find($id);
		if (empty($item)) {
			return response()->json("nothing");
		}
		return $item;
	}

	public function list()
	{
		$userId = Auth::user()->id;
		$item   = Ipass::where("user_id", $userId)->orderByRaw("id asc")->get();
		if (empty($item)) {
			return response()->json("nothing");
		}
		return $item;
	}

	public function add(Request $request)
	{
		$str       = !empty($request->input("forms")) ? $request->input("forms") : "";
		$obj       = json_decode($str);
		$title     = $obj->title;
		$account   = $obj->account;
		$password  = $obj->password;
		$mail      = $obj->mail;
		$memo      = $obj->memo;
		$userId    = Auth::user()->id;
		$now       = getNow();
		Ipass::insert([
			'title' => $title,
			'account' => $account,
			'password' => $password,
			'mail' => $mail,
			'memo' => $memo,
			'user_id' => $userId,
			'created_at' => $now,
			'updated_at' => $now,
		]);
		return response()->json("true");
	}

	public function edit(Request $request)
	{
		$str       = !empty($request->input("editItem")) ? $request->input("editItem") : "";
		$obj       = json_decode($str);
		$id        = $obj->id;
		$title     = $obj->title;
		$account   = $obj->account;
		$password  = $obj->password;
		$mail      = $obj->mail;
		$memo      = $obj->memo;
		$now       = getNow();
		Ipass::where("id", $id)
			->update([
				'title' => $title,
				'account' => $account,
				'password' => $password,
				'mail' => $mail,
				'memo' => $memo,
				'updated_at' => $now,
		]);
		return response()->json(true);
	}

	public function del(Request $request)
	{
		$id = !empty($request->input("id")) ? $request->input("id") : "";
		try {
			Ipass::where('id', $id)->delete();
			return response()->json("true");
		} catch (\Throwable $e) {
			return response()->status(500);
		}
	}
}
