@extends('admin.admin_dashboard')
@section('admin')

<main id="main" class="main">

<div class="pagetitle">
<nav>
    <ol class="breadcrumb">
    <!-- Vertically centered Modal -->
    <button type="button" action="{{ route('admin.area.create') }}" method="GET" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#add_data"><i class="bi bi-plus-lg me-2"></i> 
        Add Area Petugas
    </button>
    <div class="modal fade" id="add_data" tabindex="-1" >
        <div class="modal-dialog modal-dialog-centered" style="width: 800px;">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- General Form Elements -->
                <h4 class="card-title mx-3">Add Area Petugas</h4>
                <form action="{{ route('admin.area.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3 m-2">
                        <label for="nama_area" class="col-sm-12 col-form-label">Nama Area</label>
                        <div class="col-sm-12">
                            <input type="text" name="nama_area" class="form-control">
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
            <h5 class="card-title">Data Area</h5>

            <!-- Table with stripped rows -->
            <table class="table datatable">
            <thead>
                <tr>
                <th scope="col">ID Area</th>
                <th scope="col">Nama Area</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($data_area as $key => $item)
            <tr>
                <th scope="row">{{ $item->id_area }}</th>
                <td>{{ $item->nama_area }}</td>
                <td>
                <a type="button" href="{{ route('admin.area.edit',$item->id_area) }}" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit_data-{{ $item->id_area}}">
                    <i class="bi bi-pencil-square"></i>
                </a>
                <form action="{{ route('admin.area.delete', $item->id_area) }}" method="POST" style="display: inline;">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
                
                </td>
            </tr>       
            @endforeach
            @foreach ($data_area as $data )
                <div class="modal fade" id="edit_data-{{ $data->id_area }}" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- General Form Elements -->
                        <h5 class="card-title">Edit Area Petugas</h5>
                        <form action="{{ route('admin.area.update', $data->id_area) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row mb-3 m-2">
                                <label for="nama_area" class="col-sm-12 col-form-label">Nama Area</label>
                                <div class="col-sm-12">
                                    <input type="text" name="nama_area" class="form-control" value="{{ $data->nama_area }}">
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