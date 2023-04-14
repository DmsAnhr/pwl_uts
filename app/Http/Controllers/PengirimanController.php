<?php

namespace App\Http\Controllers;

use App\Models\PengirimanModel;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function index()
    {
        $prn = PengirimanModel::all();
        return view('content.pengiriman.pengiriman')
            ->with('prn', $prn);
    }

    public function create()
    {
        return view('content.pengiriman.create_pengiriman')
            ->with('url_form', url('pengiriman'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode'   => 'required|string|max:10|unique:pengiriman',
            'isi'    => 'required|string|max:30',
            'tujuan' => 'required|string|max:20',
            'berat'  => 'required|string|max:10'
        ]);

        PengirimanModel::create($request->except(['_token']));

        return redirect('pengiriman')
            ->with('success', 'Pengiriman Berhasil Ditambahkan');
    }

    public function show(PengirimanModel $Pengiriman)
    {
        //
    }

    public function edit($id)
    {
        $pengiriman = PengirimanModel::find($id);
        return view('content.pengiriman.create_pengiriman')
            ->with('prn', $pengiriman)
            ->with('url_form', url('/pengiriman/' . $id));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode'   => 'required|string|max:10',
            'isi'    => 'required|string|max:30',
            'tujuan' => 'required|string|max:20',
            'berat'  => 'required|string|max:10'
        ]);

        PengirimanModel::where('id', '=', $id)->update($request->except(['_token', '_method']));

        return redirect('pengiriman')
            ->with('success', 'Pengiriman Berhasil Dirubah');
    }

    public function destroy($id)
    {
        PengirimanModel::where('id', '=', $id)->delete();
        return redirect('pengiriman')
            ->with('success', 'Data Berhasil Dihapus');
    }

    function addHyphen($stringKode)
    {
        if (strlen($stringKode) > 2) {
            return substr($stringKode, 0, 3) . "-" . substr($stringKode, 3, 3) . "-" . substr($stringKode, 6);
        } else {
            return $stringKode;
        }
    }
}
