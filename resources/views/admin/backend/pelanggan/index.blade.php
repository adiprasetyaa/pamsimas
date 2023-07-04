@extends('admin.admin_dashboard')
@section('admin')

<main id="main" class="main">

<div class="pagetitle">
<nav>
    <ol class="breadcrumb">
    <!-- Vertically centered Modal -->
    <button type="button" action="{{ route('admin.pelanggan.create') }}" method="GET" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#add_data"><i class="bi bi-plus-lg me-2"></i> 
        Add Pelanggan 
    </button>
    <div class="modal fade" id="add_data" tabindex="-1" >
        <div class="modal-dialog modal-dialog-centered" style="width: 800px;">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- General Form Elements -->
                <h5 class="card-title">Add Pelanggan</h5>
                <form action="{{ route('admin.pelanggan.store') }}" method="POST">
                @csrf
                    <div class="row mb-3 m-2">
                        <label for="name" class="col-sm-12 col-form-label">Nama Pelanggan</label>
                        <div class="col-sm-12">
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3 m-2">
                        <label for="email" class="col-sm-12 col-form-label">Email Pelanggan</label>
                        <div class="col-sm-12">
                            <input type="text" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3 m-2">
                        <label for="password" class="col-sm-12 col-form-label">Password</label>
                        <div class="col-sm-12">
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3 m-2">
                        <label for="id_admin" class="col-sm-12 col-form-label">Id Admin</label>
                        <div class="col-sm-12">
                            <select class="form-select" name="id_admin" id="id_admin" class="form-select" aria-label="Default select example">
                                <option selected>- Pilih Id Admin -</option>
                                @foreach ($data_admin as $items )
                                <option value="{{ $items->id_admin }}">{{ $items->id_admin }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3 m-2">
                        <label for="id_jenis_pengguna" class="col-sm-12 col-form-label">Jenis Pengguna</label>
                        <div class="col-sm-12">
                            <select class="form-select" name="id_jenis_pengguna" id="id_jenis_pengguna" class="form-select" aria-label="Default select example">
                                <option selected>- Pilih Jenis Pengguna -</option>
                                @foreach ($data_jenis_pengguna as $items )
                                <option value="{{ $items->id_jenis_pengguna }}">{{ $items->nama_jenis_pengguna }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3 m-2">
                        <label for="id_area" class="col-sm-12 col-form-label">Wilayah</label>
                        <div class="col-sm-12">
                            <select class="form-select" name="id_area" id="id_area" class="form-select" aria-label="Default select example">
                                <option selected>- Pilih Area Petugas-</option>
                                @foreach ($data_area as $items )
                                <option value="{{ $items->id_area }}">{{ $items->nama_area }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3 m-2">
                        <label for="id_petugas" class="col-sm-12 col-form-label">Petugas Meteran</label>
                        <div class="col-sm-12">
                            <select class="form-select" name="id_petugas" id="id_petugas" class="form-select" aria-label="Default select example" onchange="filterPetugas()">
                                <option selected>- Pilih Nama Petugas Petugas-</option>
                                @foreach ($data_petugas as $items )
                                <option value="{{ $items->id_petugas }}">{{ $items->user->name}}</option>
                                @endforeach
                            </select>
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
            <h5 class="card-title">Data Jenis Pengguna</h5>

            <!-- Table with stripped rows -->
            <table class="table datatable">
            <thead>
                <tr>
                <th scope="col">ID Pelanggan</th>
                <th scope="col">Nama Pelanggan</th>
                <th scope="col">Jenis Pengguna</th>
                <th scope="col">Petugas Meteran</th>
                <th scope="col">Wilayah</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($data_pelanggan as $key => $item)
            <tr>
                <th scope="row">{{ $item->id_pelanggan }}</th>
                <td>{{ $item->user->name}}</td>
                <td>{{ $item->jenis_pengguna->nama_jenis_pengguna }}</td>
                <td>{{ $item->petugas_meteran->user->name }}</td>
                <td>{{ $item->area->nama_area }}</td>
                <td>
                <a type="button" href="{{ route('admin.pelanggan.edit',$item->id_pelanggan) }}" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit_data-{{ $item->id_pelanggan}}">
                    <i class="bi bi-pencil-square"></i>
                </a>
                <form action="{{ route('admin.pelanggan.delete', $item->id_pelanggan) }}" method="POST" style="display: inline;">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
                
                </td>
            </tr>       
            @endforeach
            @foreach ($data_pelanggan as $data )
                <div class="modal fade" id="edit_data-{{ $data->id_pelanggan }}" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- General Form Elements -->
                        <h5 class="card-title mx-3">Edit Data Petugas Meteran</h5>
                        <form action="{{ route('admin.pelanggan.update',$data->id_pelanggan) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row mb-3 m-2">
                                <label for="name" class="col-sm-12 col-form-label">Nama Pelanggan</label>
                                <div class="col-sm-12">
                                    <input type="text" name="name" class="form-control" value="{{ $data->user->name }}">
                                </div>
                            </div>
                            <div class="row mb-3 m-2">
                                <label for="email" class="col-sm-12 col-form-label">Email Pelanggan</label>
                                <div class="col-sm-12">
                                    <input type="text" name="email" class="form-control" value="{{ $data->user->email }}">
                                </div>
                            </div>
                            <div class="row mb-3 m-2">
                                <label for="email" class="col-sm-12 col-form-label">Id Admin</label>
                                <div class="col-sm-12">
                                    <select name="id_admin" id="id_admin"  class="form-select" aria-label="Default select example">
                                        <option value="">- Pilih Id Admin -</option>
                                        @foreach ($data_admin as $items )
                                        <option value="{{ $items->id_admin }}">{{ $items->id_admin }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3 m-2">
                                <label for="id_jenis_pengguna" class="col-sm-12 col-form-label">Jenis Pengguna</label>
                                <div class="col-sm-12">
                                    <select name="id_jenis_pengguna" id="id_jenis_pengguna"  class="form-select" aria-label="Default select example">
                                        <option value="">- Pilih Jenis Pengguna -</option>
                                        @foreach ($data_jenis_pengguna as $items )
                                        <option value="{{ $items->id_jenis_pengguna }}">{{ $items->nama_jenis_pengguna }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3 m-2">
                                <label for="area" class="col-sm-12 col-form-label">Wilayah</label>
                                <div class="col-sm-12">
                                    <select name="id_area" id="id_area"  class="form-select" aria-label="Default select example">
                                        <option value="">- Pilih Wilayah Pelanggan -</option>
                                        @foreach ($data_area as $items )
                                        <option value="{{ $items->id_area }}">{{ $items->id_area }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3 m-2">
                                <label for="id_petugas" class="col-sm-12 col-form-label">Nama Petugas Meteran</label>
                                <div class="col-sm-12">
                                    <select name="id_petugas" id="id_petugas"  class="form-select" aria-label="Default select example">
                                        <option value="">- Pilih Nama Petugas -</option>
                                        @foreach ($data_petugas as $items )
                                        <option value="{{ $items->id_petugas }}">{{ $items->user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
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

<!-- JavaScript code -->
@section('scripts')
<script>
function filterPetugas() {
    var idArea = document.getElementById("id_area").value; // Get the selected area ID
    
    var petugasSelect = document.getElementById("id_petugas");
    var petugasOptions = petugasSelect.options;

    // Show all options initially
    for (var i = 0; i < petugasOptions.length; i++) {
        petugasOptions[i].style.display = "";
    }

    // Hide options that don't match the selected area
    for (var i = 0; i < petugasOptions.length; i++) {
        var option = petugasOptions[i];
        var areaId = option.getAttribute("data-area-id");
        if (areaId && areaId !== idArea) {
            option.style.display = "none";
        }
    }
}
</script>
@endsection
<!-- End JavaScript code -->

@endsection`