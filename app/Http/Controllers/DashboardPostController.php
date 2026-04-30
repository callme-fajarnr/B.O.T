<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.post.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.post.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;

        $validateData = $request->validate([
            'tittle' => 'required|max:50',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'image2' => 'image|file|max:1024',
            'image3' => 'image|file|max:1024',
            'image4' => 'image|file|max:1024',
            'image5' => 'image|file|max:1024',
            'video' => 'nullable|file|mimes:mp4,ogx,oga,ogv,ogg,webm',
            'link' => 'nullable',
            'body' => 'required',
            'videoeditby' => 'nullable|required|max:50',
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

        $images = ['image', 'image2', 'image3', 'image4', 'image5'];

        foreach ($images as $img) {
            if ($request->file($img)) {
                $validateData[$img] = $request->file($img)->store('post-images', 'public');
            }
        }

        if ($request->file('video')) {
            $validateData['video'] = $request->file('video')->store('post-video', 'public');
        }

        $validateData['user_id'] = auth()->id();
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::create($validateData);

        return redirect('/dashboard/post')->with('success', 'New Post has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.post.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.post.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // return $request;

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
            'videoeditby' => 'nullable|required|max:50',
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

        $mediaFields = [
            'image' => 'oldImage',
            'image2' => 'oldImage2',
            'image3' => 'oldImage3',
            'image4' => 'oldImage4',
            'image5' => 'oldImage5',
            'video' => 'oldVideo',
        ];

        foreach ($mediaFields as $field => $oldField) {
            if ($request->file($field)) {

                if ($request->$oldField) {
                    Storage::disk('public')->delete($request->$oldField);
                }

                $validateData[$field] = $request->file($field)->store(
                    Str::startsWith($field, 'video') ? 'post-video' : 'post-images',
                    'public'
                );
            }
        }

        $validateData['user_id'] = auth()->id();
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        $post->update($validateData);

        return redirect('/dashboard/post')->with('success', 'Post has been updated!');
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
