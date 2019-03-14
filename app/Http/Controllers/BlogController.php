<?php

namespace App\Http\Controllers;

use App\Enums\StatusType;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()    {
        $posts = DB::table('posts')
            ->where('status', StatusType::Published)
            ->orderBy('updated_at', 'desc')
            ->simplePaginate(5);
        return view('blog.index', ['posts' => $posts, 'title'=>'Awesome Blog']);
    }
}
