@extends('layouts.master')
@section('content')

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    @include('partials.navbar')
    <!-- Header-->

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Tambah jabatan</h1>
                </div>
            </div>
        </div>
        {{-- <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div> --}}
    </div>

    <div class="content mt-3">
        <form action="{{ route('jabatan.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <strong>Data</strong> Jabatan
                    </div>
                    <div class="card-body card-block">


                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama
                                    jabatan</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="nama_jabatan"
                                    placeholder="masukkan nama jabatan" class="form-control" required></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Gaji</label>
                            </div>
                            <div class="col col-md-9">
                                <div class="input-group">
                                    <div class="input-group-addon">Rp</div>
                                    <input type="number" id="input1-group1" name="gaji_pokok"
                                        placeholder="masukkan gaji pokok" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Bonus</label>
                            </div>
                            <div class="col col-md-9">
                                <div class="input-group">
                                    <input type="number" id="input2-group1" name="bonus" placeholder="masukkan bonus"
                                        class="form-control">
                                    <div class="input-group-addon"><i class="fa fa-percent"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">PPH</label>
                            </div>
                            <div class="col col-md-9">
                                <div class="input-group">
                                    <input type="number" id="input2-group1" name="pph" placeholder="masukkan PPH"
                                        class="form-control">
                                    <div class="input-group-addon"><i class="fa fa-percent"></i></div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Reset
                    </button>
                    <a href="{{ route('jabatan.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>

    </div>

    </form>
    <!--/.col-->

</div> <!-- .content -->
</div><!-- /#right-panel -->
@endsection