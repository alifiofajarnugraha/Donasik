<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zakat;

class ZakatController extends Controller
{
    public function index()
    {
        // Mengambil semua data zakat
        $zakats = Zakat::all();
        return view('FiturZakat.index', compact('zakats'));
    }

    public function create()
    {
        // Mengarahkan ke halaman form tambah zakat
        return view('FiturZakat.create');
    }

    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'penghasilan' => 'required|numeric|min:0',
            'thr_bonus' => 'nullable|numeric|min:0',
            'utang' => 'nullable|numeric|min:0',
            'cicilan' => 'nullable|numeric|min:0',
        ]);

        // Perhitungan zakat
        $validated['zakat'] = ($validated['penghasilan'] + $validated['thr_bonus'] - $validated['utang'] - $validated['cicilan']) * 0.025;

        // Simpan data zakat
        Zakat::create($validated);

        return redirect()->route('zakat.index')->with('success', 'Data Zakat berhasil ditambahkan!');
    }

    public function edit(Zakat $zakat)
    {
        // Mengarahkan ke halaman edit zakat
        return view('FiturZakat.edit', compact('zakat'));
    }

    public function update(Request $request, Zakat $zakat)
    {
        // Validasi data input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'penghasilan' => 'required|numeric|min:0',
            'thr_bonus' => 'nullable|numeric|min:0',
            'utang' => 'nullable|numeric|min:0',
            'cicilan' => 'nullable|numeric|min:0',
        ]);

        // Perhitungan zakat
        $validated['zakat'] = ($validated['penghasilan'] + $validated['thr_bonus'] - $validated['utang'] - $validated['cicilan']) * 0.025;

        // Update data zakat
        $zakat->update($validated);

        return redirect()->route('zakat.index')->with('success', 'Data Zakat berhasil diperbarui!');
    }

    public function destroy(Zakat $zakat)
    {
        // Hapus data zakat
        $zakat->delete();

        return redirect()->route('zakat.index')->with('success', 'Data Zakat berhasil dihapus!');
    }

    public function pay(Zakat $zakat)
    {
        // Menandai zakat sebagai sudah dibayar
        $zakat->is_paid = true;
        $zakat->save();

        return redirect()->route('zakat.index')->with('success', 'Zakat berhasil dibayarkan!');
    }

    public function show(Zakat $zakat)
    {
        // Menampilkan halaman detail zakat
        return view('FiturZakat.show', compact('zakat'));
    }
}
