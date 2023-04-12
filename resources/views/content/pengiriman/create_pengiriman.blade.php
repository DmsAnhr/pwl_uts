@extends('index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header" menu=".link-pengiriman">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pengiriman</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/mahasiswa">Pengiriman</a></li>
                        <li class="breadcrumb-item active">New Pengiriman</li>
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
                            <form method="POST" action="{{ $url_form }}">
                                @csrf
                                {!! isset($prn) ? method_field('PUT') : '' !!}
                                <div class="form-group">
                                    <label>Kode</label>
                                    <input class="form-control @error('kode') is-invalid @enderror"
                                        value="{{ isset($prn) ? $prn->kode : old('kode') }}" 
                                        name="kode" type="text" />
                                    @error('kode')
                                        <span class="error invalid-feedback">{{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Deskirpsi Isi</label>
                                    <input class="form-control @error('isi') is-invalid @enderror"
                                        value="{{ isset($prn) ? $prn->isi : old('isi') }}" name="isi" type="text" />
                                    @error('isi')
                                        <span class="error invalid-feedback">{{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Tujuan</label>
                                            <input class="form-control @error('tujuan') is-invalid @enderror"
                                                value="{{ isset($prn) ? $prn->tujuan : old('tujuan') }}"
                                                name="tujuan" type="text" />
                                            @error('tujuan')
                                                <span class="error invalid-feedback">{{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Berat</label>
                                            <div class="input-group">
                                                <input class="form-control @error('berat') is-invalid @enderror"
                                                    value="{{ isset($prn) ? $prn->berat : old('berat') }}"
                                                    name="berat" type="text" />
                                                @error('berat')
                                                    <span class="error invalid-feedback">{{ $message }} </span>
                                                @enderror
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Kg</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-sm btn-success">Save</button>
                                </div>
                            </form>
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
