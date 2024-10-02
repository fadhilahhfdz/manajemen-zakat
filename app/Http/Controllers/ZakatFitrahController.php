<?php

namespace App\Http\Controllers;

use App\Models\ZakatFitrah;
use Illuminate\Http\Request;

class ZakatFitrahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zakatFitrah = ZakatFitrah::all();

        return view('admin.zakat-fitrah.index', compact('zakatFitrah'));
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
                'jumlah_jiwa' => 'required|integer|min:1',
                'zakat' => 'required|numeric'
            ]);

            ZakatFitrah::create($request->all());

            return redirect('/admin/zakat-fitrah')->with('sukses', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect('/admin/zakat-fitrah/create')->with('gagal', 'Data gagal disimpan ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ZakatFitrah $zakatFitrah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $zakatFitrah = ZakatFitrah::findOrFail($id);

        return view('admin.zakat-fitrah.edit', compact('zakatFitrah'));
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
                'jumlah_jiwa' => 'required|integer|min:1',
                'zakat' => 'required|numeric'
            ]);

            $zakatFitrah = ZakatFitrah::findOrFail($id);

            $zakatFitrah->update($request->all());

            return redirect('/admin/zakat-fitrah')->with('sukses', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect('/admin/zakat-fitrah/edit/{$id}')->with('gagal', 'Data gagal diupdate ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $zakatFitrah = ZakatFitrah::findOrFail($id);
        $zakatFitrah->delete();

        return redirect('/admin/zakat-fitrah')->with('sukses', 'Data berhasil dihapus');
    }
}
