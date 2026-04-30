<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;
use function Ramsey\Uuid\v1;
use Illuminate\Support\Facades\Storage;

class AdminAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.about.index', [
            'about' => About::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'line_1' => 'required|max:500',
            'line_2' => 'required|max:500',
            'line_3' => 'required|max:500',
            'solo_sight' => 'required|max:500',
            'image_about' => 'image|file|max:1024'
        ]);

        if ($request->file('image_about')) {
            $validateData['image_about'] = $request->file('image_about')->store('post-image_abouts');
        }

        $validateData['user_id'] = auth()->user()->id;

        About::create($validateData);

        return redirect('/dashboard/about')->with('success', 'New About has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        return view('about', [
            'about' => $about
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('dashboard.about.edit', [
            'about' => $about
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        $rules = [
            'line_1' => 'required|max:500',
            'line_2' => 'required|max:500',
            'line_3' => 'required|max:500',
            'solo_sight' => 'required|max:500',
            'image_about' => 'image|file|max:1024'
        ];

        $validateData = $request->validate($rules);

        if ($request->file('image_about')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image_about'] = $request->file('image_about')->store('post-image_abouts');
        }

        $validateData['user_id'] = auth()->user()->id;

        About::where('id', $about->id)
            ->update($validateData);

        return redirect('/dashboard/about')->with('success', 'About has been upadated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        if ($about->id) {
            // Hapus semua media kalau ada
            Storage::delete([
                $about->image_about,
            ]);

            // Hapus post-nya dari database
            About::destroy($about->id);
        }

        return redirect('/dashboard/post')->with('success', 'Post has been deleted!');
    }
}
