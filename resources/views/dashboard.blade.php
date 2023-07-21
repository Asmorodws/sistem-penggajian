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
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        @include('partials.flash-message')


        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-flat-color-2">
                <div class="card-body pb-0">
                    <h2 class="mb-0">
                        <span class="count">{{ $countKaryawan }}</span>
                    </h2>
                    <p class="text-light">Jumlah karyawan</p>

                    <div class="chart-wrapper px-0" style="height:70px;" height="70">
                        <canvas id="widgetChart2"></canvas>
                    </div>

                </div>
            </div>
        </div>
        <!--/.col-->

        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-flat-color-3">
                <div class="card-body pb-0">

                    <h2 class="mb-0">
                        <span class="count">{{ $countJabatan }}</span>
                    </h2>
                    <p class="text-light">Jumlah jabatan</p>

                </div>

                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <canvas id="widgetChart3"></canvas>
                </div>
            </div>
        </div>
        <!--/.col-->

        <!--/.col-->

    </div> <!-- .content -->
</div><!-- /#right-panel -->
@endsection