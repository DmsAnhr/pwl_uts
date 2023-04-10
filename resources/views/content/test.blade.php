@extends('index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header" menu=".link-mhs">
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
                            <form method="POST" >
                                {{-- @csrf
                                {!! (isset($brg))? method_field('PUT') : '' !!} --}}
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" type="text" />
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Berat</label>
                                            <div class="input-group">
                                                <input class="form-control @error('berat') is-invalid @enderror"
                                                    name="berat"type="text" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Kg</span>
                                                  </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Warna</label>
                          
                                            <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                                              <input type="text" class="form-control" data-original-title="" title="" value="#840000">
                          
                                              <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-square" style="color: #840000"></i></span>
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
