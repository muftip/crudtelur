<?php

namespace App\Http\Controllers;

use App\Models\ProduksiTelur;
use Illuminate\Http\Request;

class ProduksiTelurController extends Controller
{
    public function index()
    {
        $data = ProduksiTelur::orderBy('tanggal', 'desc')->get();
        $rekap = ProduksiTelur::selectRaw('DATE_FORMAT(tanggal, "%Y-%m") as bulan, SUM(laba_rugi) as total_laba')
            ->groupBy('bulan')->orderBy('bulan', 'desc')->get();

        return view('produksi.index', compact('data', 'rekap'));
    }

    public function create()
    {
        return view('produksi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'berat_telur' => 'required|numeric',
            'harga_telur' => 'required|numeric',
            'berat_pakan' => 'required|numeric',
            'harga_pakan' => 'required|numeric',
        ]);

        $jumlah_telur = $validated['berat_telur'] * $validated['harga_telur'];
        $biaya_pakan = $validated['berat_pakan'] * $validated['harga_pakan'];
        $laba_rugi = $jumlah_telur - $biaya_pakan;

        ProduksiTelur::create([
            'tanggal' => $validated['tanggal'],
            'berat_telur' => $validated['berat_telur'],
            'harga_telur' => $validated['harga_telur'],
            'jumlah_telur' => $jumlah_telur,
            'berat_pakan' => $validated['berat_pakan'],
            'harga_pakan' => $validated['harga_pakan'],
            'laba_rugi' => $laba_rugi,
        ]);

        return redirect()->route('produksi.index');
    }

    public function edit(ProduksiTelur $produksi)
    {
        return view('produksi.edit', compact('produksi'));
    }

    public function update(Request $request, ProduksiTelur $produksi)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'berat_telur' => 'required|numeric',
            'harga_telur' => 'required|numeric',
            'berat_pakan' => 'required|numeric',
            'harga_pakan' => 'required|numeric',
        ]);

        $jumlah_telur = $validated['berat_telur'] * $validated['harga_telur'];
        $biaya_pakan = $validated['berat_pakan'] * $validated['harga_pakan'];
        $laba_rugi = $jumlah_telur - $biaya_pakan;

        $produksi->update([
            'tanggal' => $validated['tanggal'],
            'berat_telur' => $validated['berat_telur'],
            'harga_telur' => $validated['harga_telur'],
            'jumlah_telur' => $jumlah_telur,
            'berat_pakan' => $validated['berat_pakan'],
            'harga_pakan' => $validated['harga_pakan'],
            'laba_rugi' => $laba_rugi,
        ]);

        return redirect()->route('produksi.index');
    }

    public function destroy(ProduksiTelur $produksi)
    {
        $produksi->delete();
        return redirect()->route('produksi.index');
    }
}
