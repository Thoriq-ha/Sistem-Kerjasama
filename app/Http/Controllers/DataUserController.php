<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataUser;

class DataUserController extends Controller
{
	public function index()
	{
		$users = DataUser::get();
		return view('data_user.index', compact('users'));
	}
}
