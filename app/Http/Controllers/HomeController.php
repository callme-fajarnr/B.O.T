<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Namecompany;

class HomeController extends Controller
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


        return view('home', [
            "tittle" => "Home" . $tittle,
            "active" => "home",
            // "post" => Post::all()
            // "post" => Post::latest()->get()
            // "post" => Post::latest()->Filter(request(['search', 'category', 'author']))->get()
            "post" => Post::latest()->Filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString(),
            "categories" => Category::all(),
            "namecom" => Namecompany::all(),
            'banner' => Banner::where('is_active', 1)->latest()->get()
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
