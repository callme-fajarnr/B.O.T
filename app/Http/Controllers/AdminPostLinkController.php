<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminPostLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.post-link.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.post-link.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'tittle' => 'required|max:50',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'image2' => 'image|file|max:1024',
            'image3' => 'image|file|max:1024',
            'image4' => 'image|file|max:1024',
            'image5' => 'image|file|max:1024',
            'video' => 'file|mimes:mp4,ogx,oga,ogv,ogg,webm',
            'link' => '',
            'body' => 'required',
            'videoeditby' => 'required|max:50',
            'igvideo' => 'required|max:100',
            'photoby' => 'required|max:50',
            'igphoto' => 'required|max:100',
            'aktor1' => 'required|max:50',
            'igaktor1' => 'required|max:100',
            'aktor2' => 'required|max:50',
            'igaktor2' => 'required|max:100',
            'aktor3' => 'required|max:50',
            'igaktor3' => 'required|max:100'
        ]);

        if ($request->file('image', 'image2', 'image3', 'image3', 'image4', 'image5')) {
            $validateData['image'] = $request->file('image')->store('post-images');
            $validateData['image2'] = $request->file('image2')->store('post-images');
            $validateData['image3'] = $request->file('image3')->store('post-images');
            $validateData['image4'] = $request->file('image4')->store('post-images');
            $validateData['image5'] = $request->file('image5')->store('post-images');
        }

        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::create($validateData);

        return redirect('/dashboard/post-link')->with('success', 'New Post has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.post-link.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.post-link.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'tittle' => 'required|max:50',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'image2' => 'image|file|max:1024',
            'image3' => 'image|file|max:1024',
            'image4' => 'image|file|max:1024',
            'image5' => 'image|file|max:1024',
            'video' => 'file|mimes:mp4,ogx,oga,ogv,ogg,webm',
            'link' => 'nullable',
            'body' => 'required',
            'videoeditby' => 'required|max:50',
            'igvideo' => 'required|max:100',
            'photoby' => 'required|max:50',
            'igphoto' => 'required|max:100',
            'aktor1' => 'required|max:50',
            'igaktor1' => 'required|max:100',
            'aktor2' => 'required|max:50',
            'igaktor2' => 'required|max:100',
            'aktor3' => 'required|max:50',
            'igaktor3' => 'required|max:100'
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validateData = $request->validate($rules);

        // IMAGE LOOP
        foreach (['image', 'image2', 'image3', 'image4', 'image5'] as $img) {
            if ($request->file($img)) {
                if ($request->input('old' . ucfirst($img))) {
                    Storage::delete($request->input('old' . ucfirst($img)));
                }

                $validateData[$img] = $request->file($img)->store('post-images');
            }
        }

        // VIDEO
        if ($request->file('video')) {
            if ($request->oldVideo) {
                Storage::delete($request->oldVideo);
            }
            $validateData['video'] = $request->file('video')->store('post-videos');
        }

        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::where('id', $post->id)->update($validateData);

        return redirect('/dashboard/post-link')->with('success', 'Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        foreach (['image', 'image2', 'image3', 'image4', 'image5', 'video'] as $file) {
            if ($post->$file) {
                Storage::delete($post->$file);
            }
        }

        $post->delete();

        return redirect('/dashboard/post-link')->with('success', 'Post deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->tittle);
        return response()->json(['slug' => $slug]);
    }
}
