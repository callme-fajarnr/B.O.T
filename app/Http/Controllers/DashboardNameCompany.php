<?php

namespace App\Http\Controllers;

use App\Models\Namecompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardNameCompany extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.namecompany.index', [
            'namecom' => Namecompany::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.namecompany.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'namecompany' => 'required|max:150',
            'takeline' => 'required|max:255',
            'deccompany' => 'required|max:255',
            'logo' => 'image|file|max:1024'
        ]);

        if ($request->file('logo')) {
            $validateData['logo'] = $request->file('logo')->store('logo-images');
        }

        $validateData['user_id'] = auth()->user()->id;

        Namecompany::create($validateData);

        return redirect('/dashboard/namecompany')->with('success', 'New name company has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Namecompany $namecompany)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Namecompany $namecompany)
    {
        return view('dashboard.namecompany.edit', [
            'namecom' => $namecompany
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Namecompany $namecompany)
    {
        $rules = [
            'namecompany' => 'required|max:150',
            'takeline' => 'required|max:255',
            'deccompany' => 'required|max:255',
            'logo' => 'image|file|max:1024'
        ];

        $validateData = $request->validate($rules);

        if ($request->file('logo')) {

            // hapus lama
            if ($request->oldLogo) {
                Storage::delete($request->oldLogo);
            }

            // simpan baru
            $validateData['logo'] = $request->file('logo')->store('logo-images');
        }


        $validateData['user_id'] = auth()->user()->id;

        Namecompany::where('id', $namecompany->id)
            ->update($validateData);

        return redirect('/dashboard/namecompany')->with('success', 'New name company has been added!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Namecompany $namecompany)
    {
        Namecompany::destroy($namecompany->id);

        return redirect('/dashboard/namecompany')->with('success', 'Name Company has been deleted!');
    }
}
