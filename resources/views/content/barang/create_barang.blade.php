@extends('index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header" menu=".link-barang">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Barang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/mahasiswa">Barang</a></li>
                        <li class="breadcrumb-item active">New Barang</li>
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
                                {!! isset($brg) ? method_field('PUT') : '' !!}
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input class="form-control @error('nama') is-invalid @enderror"
                                        value="{{ isset($brg) ? $brg->nama : old('nama') }}" name="nama" type="text" />
                                    @error('nama')
                                        <span class="error invalid-feedback">{{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Jenis</label>
                                            <input class="form-control @error('jenis') is-invalid @enderror"
                                                value="{{ isset($brg) ? $brg->jenis : old('jenis') }}"
                                                name="jenis" type="text" />
                                            @error('jenis')
                                                <span class="error invalid-feedback">{{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Warna</label>

                                            <div class="input-group my-colorpicker2 colorpicker-element"
                                                data-colorpicker-id="2">
                                                <input type="text"
                                                    class="form-control @error('warna') is-invalid @enderror"
                                                    value="{{ isset($brg) ? $brg->warna : old('warna') }}" name="warna">
                                                @error('warna')
                                                    <span class="error invalid-feedback">{{ $message }} </span>
                                                @enderror
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-square"
                                                            style="color: {{ isset($brg) ? $brg->warna : old('warna') }};"></i></span>
                                                </div>
                                            </div>
                                            <!-- /.input group -->
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
