<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use Illuminate\Http\Request;

class BarangController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brg = BarangModel::all();
        return view('content.barang.barang')
                    ->with('brg', $brg);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.barang.create_barang')
                    ->with('url_form', url('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'          => 'required|string|max:50',
            'jenis'         => 'required|string|max:30',
            'warna'         => 'required|string|max:20'
        ]);

        BarangModel::create($request->except(['_token']));

        return redirect('barang')
                        ->with('success', 'Barang Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $Barang
     * @return \Illuminate\Http\Response
     */
    public function show(BarangModel $Barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangModel  $Barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = BarangModel::find($id);
        return view('content.barang.create_barang')
                    ->with('brg', $barang)
                    ->with('url_form', url('/barang/'. $id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $Barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'          => 'required|string|max:50',
            'jenis'         => 'required|string|max:30',
            'warna'         => 'required|string|max:20'
        ]);

        BarangModel::where('id', '=', $id)->update($request->except(['_token', '_method']));

        return redirect('barang')
                        ->with('success', 'Barang Berhasil Dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $Barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BarangModel::where('id', '=', $id)->delete();
        return redirect('barang')
                        ->with('success', 'Data Berhasil Dihapus');
    }
}
