@extends('admin.admin_dashboard')
@section('admin')

<main id="main" class="main">

<div class="pagetitle">
<nav>
    <ol class="breadcrumb">
    <!-- Vertically centered Modal -->
    <button type="button" action="{{ route('admin.tarif.create') }}" method="GET" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#add_data"><i class="bi bi-plus-lg me-2"></i> 
        Add Tarif Penggunaan Air
    </button>
    <div class="modal fade" id="add_data" tabindex="-1" >
        <div class="modal-dialog modal-dialog-centered" style="width: 800px;">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- General Form Elements -->
                <h4 class="card-title mx-3">Add Tarif Penggunaan Air</h4>
                <form action="{{ route('admin.tarif.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3 m-2">
                        <label for="email" class="col-sm-12 col-form-label">Jenis Pengguna</label>
                        <div class="col-sm-12">
                            <select class="form-select" name="id_jenis_pengguna" id="id_jenis_penggguna" aria-label="Default select example">
                                <option selected>- Pilih Jenis Pengguna -</option>
                                @foreach ($data_jenis_pengguna as $items )
                                <option value="{{ $items->id_jenis_pengguna }}">{{ $items->nama_jenis_pengguna }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3 m-2">
                        <label for="biaya_tarif" class="col-sm-12 col-form-label">Biaya Tarif</label>
                        <div class="col-sm-12">
                            <input type="number" name="biaya_tarif" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3 m-2">
                        <label for="minimum" class="col-sm-12 col-form-label">Minimum</label>
                        <div class="col-sm-12">
                            <input type="number" name="minimum" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3 m-2">
                        <label for="maximum" class="col-sm-12 col-form-label">Maximum</label>
                        <div class="col-sm-12">
                            <input type="number" name="maximum" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form><!-- End General Form Elements -->
            </div>
        </div>
        </div>
    </div><!-- End Vertically centered Modal-->
    </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
    <div class="col-lg-12">

        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data Tarif</h5>

            <!-- Table with stripped rows -->
            <table class="table datatable">
            <thead>
                <tr>
                <th scope="col">ID Tarif</th>
                <th scope="col">Jenis Pengguna</th>
                <th scope="col">Biaya Tarif</th>
                <th scope="col">Minimum</th>
                <th scope="col">Maximum</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($data_tarif as $key => $item)
            <tr>
                <th scope="row">{{ $item->id_tarif }}</th>
                <td>{{ $item->jenis_pengguna->nama_jenis_pengguna }}</td>
                <td>{{ $item->biaya_tarif}}</td>
                <td>{{ $item->minimum}}</td>
                <td>{{ $item->maximum }}</td>
                <td>
                <a type="button" href="{{ route('admin.tarif.edit',$item->id_tarif) }}" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit_data-{{ $item->id_tarif}}">
                    <i class="bi bi-pencil-square"></i>
                </a>
                <form action="{{ route('admin.tarif.delete', $item->id_tarif) }}" method="POST" style="display: inline;">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
                
                </td>
            </tr>       
            @endforeach
            @foreach ($data_tarif as $data )
                <div class="modal fade" id="edit_data-{{ $data->id_tarif }}" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- General Form Elements -->
                        <h5 class="card-title">Edit Tarif Penggunaan Air</h5>
                        <form action="{{ route('admin.tarif.update', $data->id_tarif) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row mb-3 m-2">
                                <label for="id_jenis_pengguna" class="col-sm-12 col-form-label">Jenis Pengguna</label>
                                <div class="col-sm-12">
                                    <select name="id_jenis_pengguna" id="id_jenis_penggguna"  aria-label="Default select example">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data_jenis_pengguna as $items )
                                        <option value="{{ $items->id_jenis_pengguna }}">{{ $items->nama_jenis_pengguna }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3 m-2">
                                <label for="biaya_tarif" class="col-sm-12 col-form-label">Biaya Tarif</label>
                                <div class="col-sm-12">
                                    <input type="number" name="biaya_tarif" class="form-control" value="{{ $items->biaya_tarif }}">
                                </div>
                            </div>
                            <div class="row mb-3 m-2">
                                <label for="minimum" class="col-sm-12 col-form-label">Minimum</label>
                                <div class="col-sm-12">
                                    <input type="number" name="minimum" class="form-control" value="{{ $items->minimum }}">
                                </div>
                            </div>
                            <div class="row mb-3 m-2">
                                <label for="maximum" class="col-sm-12 col-form-label">Maximum</label>
                                <div class="col-sm-12">
                                    <input type="number" name="maximum" class="form-control" value="{{ $items->maximum }}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Change</button>
                            </div>
                        </form><!-- End General Form Elements -->
                    </div>
                    </div>
                </div>
                </div>               
            @endforeach

            </tbody>
            </table>
            <!-- End Table with stripped rows -->

        </div>
        </div>

    </div>
    </div>
</section>

</main><!-- End #main -->

@endsection