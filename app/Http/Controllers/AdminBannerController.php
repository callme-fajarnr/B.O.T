<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.banner.index', [
            'banner' => Banner::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.banner.create', [
            'banner' => Banner::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|max:50',
            'image' => 'image|file|max:1024'
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('banner-images', 'public');
        }
        $validateData['is_active'] = $request->has('is_active');

        banner::create($validateData);
        return redirect('/dashboard/banner')->with('success', 'New Banner has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('dashboard.banner.edit', [
            'banner' => $banner,
            'banneris' => Banner::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        $rules = [
            'title' => 'required|max:50',
            'image' => 'image|file|max:1024'
        ];

        $validateData = $request->validate($rules);

        $validateData['is_active'] = $request->has('is_active');

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::disk('public')->delete($request->oldImage);
            }

            $validateData['image'] = $request->file('image')
                ->store('banner-images', 'public');
        }

        Banner::where('id', $banner->id)->update($validateData);

        return redirect('/dashboard/banner')->with('success', 'Banner has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        Banner::destroy($banner->id);

        return redirect('/dashboard/banner')->with('success', 'Banner has been deleted!');
    }

    public function toggle(Banner $banner)
    {
        $banner->update([
            'is_active' => !$banner->is_active
        ]);

        return back()->with('success', 'Status updated!');
    }
}
