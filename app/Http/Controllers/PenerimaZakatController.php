<?php

namespace App\Http\Controllers;

use App\Models\PenerimaZakat;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PenerimaZakatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penerimaZakat = PenerimaZakat::all();

        return view('admin.penerima-zakat.index', compact('penerimaZakat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'alamat' => 'required',
                'zakat_diterima' => 'required|numeric'
            ]);

            PenerimaZakat::create($request->all());

            return redirect('/admin/penerima-zakat')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/penerima-zakat/create')->with('gagal', 'Data gagal disimpan ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PenerimaZakat $penerimaZakat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $penerimaZakat = PenerimaZakat::findOrFail($id);

        return view('admin.penerima-zakat.edit', compact('penerimaZakat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'alamat' => 'required',
                'zakat_diterima' => 'required|numeric'
            ]);

            $penerimaZakat = PenerimaZakat::findOrFail($id);
            $penerimaZakat->update($request->all());

            return redirect('/admin/penerima-zakat')->with('sukses', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect('/admin/penerima-zakat/edit/{$id}')->with('gagal', 'Data gagal diupdate ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $penerimaZakat = PenerimaZakat::findOrFail($id);
        $penerimaZakat->delete();

        return redirect('/admin/penerima-zakat')->with('sukses', 'Data berhasil dihapus');
    }

    public function print() {
        $date = Carbon::now();
        $tahunSekarang = $date->format('Y');
        $totalZakatDiterimaLiter = PenerimaZakat::sum('zakat_diterima');
        $penerimaZakat = PenerimaZakat::all();

        $pdf = Pdf::loadView('admin.penerima-zakat.print', compact('totalZakatDiterimaLiter', 'tahunSekarang', 'penerimaZakat'));
        return $pdf->stream();
    }
}
