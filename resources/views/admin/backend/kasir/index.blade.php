@extends('admin.admin_dashboard')
@section('admin')

<main id="main" class="main">

<div class="pagetitle">
<nav>
    <ol class="breadcrumb">
    <!-- Vertically centered Modal -->
    <button type="button" action="{{ route('admin.kasir.create') }}" method="GET" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#add_data"><i class="bi bi-plus-lg me-2"></i> 
        Add Kasir
    </button>
    <div class="modal fade" id="add_data" tabindex="-1" >
        <div class="modal-dialog modal-dialog-centered" style="width: 800px;">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- General Form Elements -->
                <h5 class="card-title">Add Kasir</h5>
                <form action="{{ route('admin.kasir.store') }}" method="POST">
                @csrf
                    <div class="row mb-3 m-2">
                        <label for="name" class="col-sm-12 col-form-label">Nama Kasir</label>
                        <div class="col-sm-12">
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3 m-2">
                        <label for="email" class="col-sm-12 col-form-label">Email Kasir</label>
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
                        <label for="email" class="col-sm-12 col-form-label">Id Admin</label>
                        <div class="col-sm-12">
                            <select name="id_admin" id="id_admin" class="form-select" aria-label="Default select example">
                                <option value="">- Pilih -</option>
                                @foreach ($data_admin as $items )
                                    <option value="{{ $items->id_admin }}">{{ $items->id_admin }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Kasir</button>
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
            <h5 class="card-title">Data Kasir</h5>

            <!-- Table with stripped rows -->
            <table class="table datatable">
            <thead>
                <tr>
                <th scope="col">ID Kasir</th>
                <th scope="col">ID Admin</th>
                <th scope="col">Nama Kasir</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($data_kasir as $key => $item)
            <tr>
                <th scope="row">{{ $item->id_kasir }}</th>
                <td>{{ $item->id_admin }}</td>
                <td>{{ $item->user->name}}</td>
                <td>{{ $item->user->email}}</td>
                <td>
                <a type="button" href="{{ route('admin.kasir.edit',$item->id_kasir) }}" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit_data-{{ $item->id_kasir}}">
                    <i class="bi bi-pencil-square"></i>
                </a>
                <form action="{{ route('admin.kasir.delete', $item->id_kasir) }}" method="POST" style="display: inline;">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
                
                </td>
            </tr>       
            @endforeach
            @foreach ($data_kasir as $data )
                <div class="modal fade" id="edit_data-{{ $data->id_kasir }}" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- General Form Elements -->
                        <h5 class="card-title mx-3">Edit Data Petugas Meteran</h5>
                        <form action="{{ route('admin.kasir.update',$data->id_kasir) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row mb-3 m-2">
                                <label for="name" class="col-sm-12 col-form-label">Nama Kasir</label>
                                <div class="col-sm-12">
                                    <input type="text" name="name" class="form-control" value="{{ $data->user->name }}">
                                </div>
                            </div>
                            <div class="row mb-3 m-2">
                                <label for="email" class="col-sm-12 col-form-label">Email Kasir</label>
                                <div class="col-sm-12">
                                    <input type="text" name="email" class="form-control" value="{{ $data->user->email }}">
                                </div>
                            </div>
                            <div class="row mb-3 m-2">
                                <label for="email" class="col-sm-12 col-form-label">Id Admin</label>
                                <div class="col-sm-12">
                                    <select name="id_admin" id="id_admin">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data_admin as $items )
                                            <option value="{{ $items->id_admin }}">{{ $items->id_admin }}</option>
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

@endsection