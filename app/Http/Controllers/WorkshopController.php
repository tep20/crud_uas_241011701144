<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class WorkshopController extends Controller
{
    public function index() {
        $workshops = Workshop::latest()->paginate(5);
        return view('pages.index', compact('workshops'));
    }

    public function create() {
        return view('pages.create');
    }

    public function store(Request $request) {
        $request->validate([
            'gambar' => 'required|image|max:2048',
            'tema' => 'required',
            'pembicara' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required|date',
            'penyelenggara' => 'required'
        ]);

        $image = $request->file('gambar');
        $image->storeAs('public/workshops', $image->hashName());

        Workshop::create([
            'gambar' => $image->hashName(),
            'tema' => $request->tema,
            'pembicara' => $request->pembicara,
            'lokasi' => $request->lokasi,
            'tanggal' => $request->tanggal,
            'penyelenggara' => $request->penyelenggara
        ]);

        return redirect()->route('workshops.index')->with('success', 'Data tersimpan!');
    }

    public function edit($id) {
        $workshop = Workshop::findOrFail($id);
        return view('pages.edit', compact('workshop'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'gambar' => 'image|max:2048',
            'tema' => 'required',
            'pembicara' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required|date',
            'penyelenggara' => 'required'
        ]);

        $workshop = Workshop::findOrFail($id);

        if ($request->hasFile('gambar')) {
            Storage::delete('public/workshops/'.$workshop->gambar);
            $image = $request->file('gambar');
            $image->storeAs('public/workshops', $image->hashName());
            $workshop->update(['gambar' => $image->hashName()]);
        }

        $workshop->update($request->except('gambar'));
        return redirect()->route('workshops.index')->with('success', 'Data diupdate!');
    }

    public function destroy($id) {
        $workshop = Workshop::findOrFail($id);
        Storage::delete('public/workshops/'.$workshop->gambar);
        $workshop->delete();
        return redirect()->route('workshops.index')->with('success', 'Data dihapus!');
    }

    public function exportPdf() {
        $workshops = Workshop::all();
        if (!app()->bound('dompdf.wrapper')) {
            return redirect()->route('workshops.index')
                ->with('error', 'Fitur PDF belum tersedia: jalankan "composer require barryvdh/laravel-dompdf"');
        }

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pages.pdf', compact('workshops'));
        return $pdf->download('laporan-workshop.pdf');
    }
}