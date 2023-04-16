<?php

namespace App\Http\Controllers;

use App\Models\PengirimanModel;
use Illuminate\Http\Request;
use DataTables;

class PengirimanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = PengirimanModel::select('id', 'kode', 'isi', 'tujuan', 'berat')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    // $btn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm">View</a>';
                    // return $btn;
                    return $this->getActionColumn($row);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $prn = PengirimanModel::all();
        return view('content.pengiriman.pengiriman')
            ->with('prn', $prn);
    }

    protected function getActionColumn($row): string
    {
        $formUrl = url('/pengiriman/' . $row->id);
        $editUrl = url('/pengiriman/' . $row->id . '/edit/');
        $hypend = app('App\Http\Controllers\PengirimanController')->addHyphen($row->kode);
        $actionCol = "<form action='$formUrl' method='POST'>
        <a href='$editUrl' type='button' class='btn btn-sm btn-warning text-white'>
            <i class='fas fa-edit'></i> Edit
        </a>";
        $actionCol .= csrf_field();
        $actionCol .= "
        <button type='button' class='btn btn-sm btn-danger' data-toggle='modal' data-target='#deleteModal$row->id'><i class='fas fa-trash pr-1'></i>Delete</button>
        <!-- Delete Modal -->
        <div class='modal fade' id='deleteModal$row->id' tabindex='-1' role='dialog' aria-labelledby='deleteModalLabel$row->id' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                <h5 class='modal-title' id='deleteModalLabel$row->id'>Konfirmasi Hapus</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
                </div>
                <div class='modal-body'>
                <p>Anda yakin ingin menghapus #$hypend ?</p>
                </div>
                <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Tidak</button>
                <form method='POST' action='$formUrl' class='d-inline pl-2'>
                    ";
        $actionCol .= csrf_field();
        $actionCol .= method_field('DELETE');

        $actionCol .= "
                    <button type='submit' class='btn btn-danger'>Ya</button>
                </form>
                </div>
            </div>
            </div>
        </div>
    </form>";

        return $actionCol;
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
            'kode'   => 'required|string|max:10|unique:pengiriman,kode,' . $id,
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
