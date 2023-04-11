@extends('index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header" menu=".link-pengiriman">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Pengiriman</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Pengiriman</li>
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
                            <a href="{{ url('pengiriman/create') }}" class="btn btn-success btn-sm">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                            </a>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Isi</th>
                                        <th>Tujuan</th>
                                        <th>Berat</th>
                                        <th style="text-align-last: center"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($prn->count() > 0)
                                    @foreach ($prn as $no => $p)
                                    <tbody>
                                        <tr>
                                            <td>{{$no+1}}</td>
                                            <td>#{{ 
                                                    app('App\Http\Controllers\PengirimanController')->addHyphen($p->kode)
                                                }}
                                            </td>
                                            <td>{{$p->isi}}</td>
                                            <td>{{$p->tujuan}}</td>
                                            <td>{{$p->berat}}kg</td>
                                            <td class="box-btn-action">
                                                <form action="{{ url('/pengiriman/'.$p->id)}}" method="POST">
                                                    <a href="{{ url('/pengiriman/'.$p->id.'/edit/') }}" type="button" class="btn btn-sm btn-warning text-white">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                @else
                                <tr><td colspan="6" class="text-center">Data Tidak Ada</td></tr>
                                @endif
                                </tbody>
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
