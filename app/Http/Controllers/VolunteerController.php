<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $volunteers = Volunteer::all();
        return view('FiturVolunteer.index', compact('volunteers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('FiturVolunteer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:volunteers',
        'phone' => 'required',
        'skills' => 'required',
    ]);

    // Simpan data ke database
    $volunteer = Volunteer::create($request->all());

    // Redirect ke halaman detail relawan (show)
    return redirect()->route('volunteer.show', $volunteer->id)->with('success', 'Volunteer created successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(Volunteer $volunteer)
    {
        // Ambil semua data volunteer
        $volunteers = Volunteer::all();
    
        // Kirim data volunteer spesifik dan semua volunteer ke view
        return view('FiturVolunteer.show', compact('volunteer', 'volunteers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Volunteer $volunteer)
    {
        return view('FiturVolunteer.edit', compact('volunteer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Volunteer $volunteer)
{
    // Validasi data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:volunteers,email,' . $volunteer->id,
        'phone' => 'required|string|max:15',
        'skills' => 'required|string',
    ]);

    // Update data volunteer
    $volunteer->update($request->all());

    // Redirect ke halaman detail volunteer dengan pesan sukses
    return redirect()->route('volunteer.show', $volunteer->id)->with('success', 'Volunteer berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Volunteer $volunteer)
    {
        $volunteer->delete();

        return redirect()->route('volunteer.index' )->with('success', 'Volunteer deleted successfully.');
    }
}
