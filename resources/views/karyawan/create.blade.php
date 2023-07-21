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
                    <h1>Tambah karyawan</h1>
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
        <form action="{{ route('karyawan.store') }}" method="post" enctype="multipart/form-data"
            class="form-horizontal">
            @csrf
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <strong>Data</strong> Karyawan
                    </div>
                    <div class="card-body card-block">


                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama
                                    lengkap</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="nama"
                                    placeholder="masukkan nama lengkap" class="form-control" required></div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">Tempat
                                    lahir</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="email-input" name="tempat_lahir"
                                    placeholder="masukkan tempat lahir" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="email-input" class=" form-control-label">
                                    Tanggal lahir
                                </label>
                            </div>
                            <div class="col-12 col-md-9"><input type="date" id="email-input" name="tanggal lahir"
                                    placeholder="masukkan tempat lahir" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="email-input"
                                    class=" form-control-label">Alamat</label></div>
                            <div class="col-12 col-md-9"><textarea type="text" id="email-input" name="alamat"
                                    placeholder="masukkan alamat" class="form-control" required></textarea>
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
                        <a href="{{ route('karyawan.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <strong>Jabatan</strong>
                    </div>
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Posisi / Jabatan
                                </label></div>
                            <div class="col-12 col-md-9">
                                <select name="jabatan_id" id="SelectLm" class="form-control form-control">
                                    <option selected disabled>Pilih jabatan</option>
                                    @foreach ($listJabatan as $d)
                                    <option value="{{ $d->id }}">{{ $d->nama_jabatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        <!--/.col-->

    </div> <!-- .content -->
</div><!-- /#right-panel -->
@endsection