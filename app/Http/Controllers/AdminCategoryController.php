<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $this->Authorize('admin');
        return view('dashboard.categories.index', [
            'categories' => Category::all()
            // 'categories' => Category::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $this->Authorize('admin');
        return view('dashboard.categories.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:50',
            'slug' => 'required|unique:posts',
            'image' => 'image|file|max:1024',
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('category-images');
        }

        Category::create($validateData);

        return redirect('/dashboard/categories')->with('success', 'New Category has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'category' => $category,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $rules = [
            'name' => 'required|max:50',
            'slug' => 'required',
            'image' => 'image|file|max:1024',
        ];

        if ($request->slug != $category->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validateData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('category-images');
        }

        Category::where('id', $category->id)
            ->update($validateData);

        return redirect('/dashboard/categories')->with('success', 'Category has been upadated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);

        return redirect('/dashboard/categories')->with('success', 'Category has been deleted!');
    }

    // slug cek atuo scrip
    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
