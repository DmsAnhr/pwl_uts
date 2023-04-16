@extends('index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header" menu=".link-barang">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Barang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Barang</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ url('barang/create') }}" class="btn btn-success btn-sm">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                            </a>
                            <table class="table table-all" id="tbl-barang">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jenis</th>
                                        <th>Warna</th>
                                        <th style="text-align-last: center"><i class="fa fa-ellipsis-h"
                                                aria-hidden="true"></i></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                {{-- @if ($brg->count() > 0)
                                <tbody>
                                    @foreach ($brg as $no => $b)
                                        <tr>
                                            <td>{{$no+1}}</td>
                                            <td>{{$b->nama}}</td>
                                            <td>{{$b->jenis}}</td>
                                            <td>{{$b->warna}} <i class="fas fa-square"
                                                style="color: {{ isset($b) ? $b->warna : old('warna') }};"></i></td>
                                            <td class="box-btn-action">
                                                <form action="{{ url('/barang/'.$b->id)}}" method="POST">
                                                    <a href="{{ url('/barang/'.$b->id.'/edit/') }}" type="button" class="btn btn-sm btn-warning text-white">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{$b->id}}"><i class="fas fa-trash pr-1"></i>Delete</button>
                                                    <!-- Delete Modal -->
                                                    <div class="modal fade" id="deleteModal{{$b->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{$b->id}}" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel{{$b->id}}">Konfirmasi Hapus</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <p>Anda yakin ingin menghapus {{$b->nama}} ?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                            <form method="POST" action="{{ url('/barang/'.$b->id)}}" class="d-inline pl-2">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Ya</button>
                                                            </form>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                @else
                                <tr><td colspan="6" class="text-center">Data Tidak Ada</td></tr>
                                @endif --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
@endsection
