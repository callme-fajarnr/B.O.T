<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Namecompany;

class PostController extends Controller
{
    public function index()
    {

        //dd(request('search'));
        $tittle = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $tittle = ' in ' . $category->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $tittle = ' by ' . $author->name;
        }


        return view('post', [
            "tittle" => "All Posts" . $tittle,
            "active" => "post",
            // "post" => Post::all()
            // "post" => Post::latest()->get()
            // "post" => Post::latest()->Filter(request(['search', 'category', 'author']))->get()
            "post" => Post::latest()->Filter(request(['search', 'category', 'author']))->paginate(17)->withQueryString(),
            "namecom" => Namecompany::all()
        ]);
    }

    public function show(Post $post)
    {
        return view('posts', [
            "tittle" => "singlen post",
            "active" => "post",
            "post" => $post,
            "namecom" => Namecompany::all()
        ]);
    }
}
