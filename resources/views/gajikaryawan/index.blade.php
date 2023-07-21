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
                    <h1>Data gaji karyawan</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title mt-2">
                    <a href="{{url('export-csv/xlsx')}}" class="btn btn-success rounded text-light">Export Excel</a>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        @include('partials.flash-message')
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Gaji pokok</th>
                                        <th>Bonus</th>
                                        <th>PPH</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data)
                                    <?php
                                        $bonus =  $data->jabatan->gaji_pokok * ($data->jabatan->bonus / 100)  ;
                                        $ppn = ($data->jabatan->pph / 100) * ($bonus + $data->jabatan->gaji_pokok);
                                        $total = ($data->jabatan->gaji_pokok + $bonus) - $ppn;
                                    ?>
                                    <tr>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->jabatan->nama_jabatan }}</td>
                                        <td>@currency($data->jabatan->gaji_pokok )</td>
                                        <td>@currency($bonus)</td>
                                        <td>@currency($ppn)</td>
                                        <td>@currency($total)</td>

                                        <td class="d-flex justify-content-around">

                                            <a data-toggle="modal" class="btn btn-primary rounded mx-2 text-white"
                                                id="smallButton" data-target="#smallModal"
                                                data-attr="{{ route('detail.gaji-karyawan', $data->id) }}"><i
                                                    class="fa fa-eye"></i></a>
                                            {{-- <a data-toggle="modal" class="btn btn-danger rounded text-white mx-2"
                                                id="smallButton" data-target="#smallModal" data-attr="#"
                                                title="Delete Project">
                                                <i class="fa fa-trash"></i>
                                            </a> --}}
                                        </td>
                                    </tr>
                                    <!-- Modal -->

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
</div><!-- /#right-panel -->

<!-- small modal -->
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <div>
                    <!-- the result to be displayed apply here -->
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // display a modal (small modal)
    $(document).on('click', '#smallButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href
            , beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#smallModal').modal("show");
                $('#smallBody').html(result).show();
            }
            , complete: function() {
                $('#loader').hide();
            }
            , error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            }
            , timeout: 8000
        })
    });

</script>
@endsection