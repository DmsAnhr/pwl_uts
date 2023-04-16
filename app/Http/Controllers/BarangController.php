<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use Illuminate\Http\Request;
use DataTables;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = BarangModel::select('id', 'nama','jenis','warna')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return $this->getActionColumn($row);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $brg = BarangModel::all();
        return view('content.barang.barang')
            ->with('brg', $brg);
    }

    protected function getActionColumn($row): string
    {
        $formUrl = url('/barang/' . $row->id);
        $editUrl = url('/barang/' . $row->id . '/edit/');
        $actionCol = "<form action='$formUrl' method='POST'>
                        <a href='$editUrl' type='button' class='btn btn-sm btn-warning text-white'>
                            <i class='fas fa-edit'></i> Edit
                        </a>";
        $actionCol .= csrf_field();
        $actionCol .= "<button type='button' class='btn btn-sm btn-danger' data-toggle='modal' data-target='#deleteModal$row->id'><i class='fas fa-trash pr-1'></i>Delete</button>
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
                                <p>Anda yakin ingin menghapus $row->nama ?</p>
                                </div>
                                <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Tidak</button>
                                <form method='POST' action='$formUrl' class='d-inline pl-2'>";
        $actionCol .= csrf_field();
        $actionCol .= method_field('DELETE');
        $actionCol .= "<button type='submit' class='btn btn-danger'>Ya</button>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    </form>";
    
        return $actionCol;
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
     * @param  \App\Models\BarangModel  $Barang
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
            ->with('url_form', url('/barang/' . $id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BarangModel  $Barang
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
     * @param  \App\Models\BarangModel  $Barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BarangModel::where('id', '=', $id)->delete();
        return redirect('barang')
            ->with('success', 'Data Berhasil Dihapus');
    }
}
