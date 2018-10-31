<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PageController extends Controller
{
    
	public function index()
	{
		return view('index', [
			'posts' => Post::all(),
		]);
	}

}
