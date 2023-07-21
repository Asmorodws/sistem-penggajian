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
                    <h1>Data jabatan</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title mt-2">
                    <a href="{{ route('jabatan.create') }}" class="btn btn-success rounded">Tambah</a>
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
                                        <th>Nama jabatan</th>
                                        <th>Gaji pokok</th>
                                        <th>Bonus</th>
                                        <th>PPH</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data)
                                    <tr>
                                        <td>{{ $data->nama_jabatan }}</td>
                                        <td>@currency($data->gaji_pokok)</td>
                                        <td>{{ $data->bonus }}%</td>
                                        <td>{{ $data->pph }}%</td>
                                        <td class="d-flex justify-content-around">

                                            <a href="{{ route('jabatan.edit', $data->id) }}"
                                                class="btn btn-primary rounded mx-2 text-white"><i
                                                    class="fa fa-edit"></i></a>
                                            <a data-toggle="modal" class="btn btn-danger rounded text-white mx-2"
                                                id="smallButton" data-target="#smallModal"
                                                data-attr="{{ route('jabatan.delete', $data->id) }}"
                                                title="Delete Project">
                                                <i class="fa fa-trash"></i>
                                            </a>
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