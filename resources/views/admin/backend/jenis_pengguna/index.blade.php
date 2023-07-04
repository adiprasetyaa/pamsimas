@extends('admin.admin_dashboard')
@section('admin')

<main id="main" class="main">

    <div class="pagetitle">
    <nav>
      <ol class="breadcrumb">
        <!-- Vertically centered Modal -->
        <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#add_data"><i class="bi bi-plus-lg me-2"></i> 
          Add Jenis Pengguna
        </button>
        <div class="modal fade" id="add_data" tabindex="-1" >
          <div class="modal-dialog modal-dialog-centered" style="width: 800px;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <!-- General Form Elements -->
                  <h5 class="card-title">Add Jenis Pengguna</h5>
                  <form action="{{ route('admin.jenis.pengguna.store') }}" method="POST">
                    @csrf
                      <div class="row mb-3">
                        <label for="nama_jenis_pengguna" class="col-sm-3 col-form-label">Jenis Pengguna</label>
                        <div class="col-sm-9">
                          <input type="text" name="nama_jenis_pengguna" class="form-control">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="id_admin" class="col-sm-3 col-form-label">ID Admin</label>
                        <div class="col-sm-9">
                          <input type="text" name="id_admin" class="form-control">
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
                    <th scope="col">ID</th>
                    <th scope="col">ID Admin</th>
                    <th scope="col">Jenis Pengguna</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($data_jenis_pengguna as $key => $item)
                <tr>
                  <th scope="row">{{ $item->id_jenis_pengguna }}</th>
                  <td>{{ $item->id_admin }}</td>
                  <td>{{ $item->nama_jenis_pengguna }}</td>
                  <td>
                    <a type="button" href="{{ route('admin.jenis.pengguna.edit') }}" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit_data-{{ $item->id_jenis_pengguna }}">
                      <i class="bi bi-pencil-square"></i>
                    </a>
                    <a type="button" href="{{ route('admin.jenis.pengguna.delete',$item->id_jenis_pengguna) }}" class="btn btn-danger">
                      <i class="bi bi-trash"></i>
                    </a>
                  </td>
                </tr>       
                @endforeach
                @foreach ($data_jenis_pengguna as $data )
                  <div class="modal fade" id="edit_data-{{ $data->id_jenis_pengguna }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- General Form Elements -->
                            <h5 class="card-title mx-3">Edit Jenis Pengguna</h5>
                            <form action="{{ route('admin.jenis.pengguna.update',$data->id_jenis_pengguna) }}" method="POST">
                              @csrf
                                <div class="row mb-3 m-2">
                                  <label for="nama_jenis_pengguna" class="col-sm-12 col-form-label">Jenis Pengguna</label>
                                  <div class="col-sm-12">
                                    <input type="text" name="nama_jenis_pengguna" class="form-control" value="{{ $data->nama_jenis_pengguna }}">
                                  </div>
                                </div>
                                <div class="row mb-3 m-2">
                                  <label for="id_admin" class="col-sm-12 col-form-label">ID Admin</label>
                                  <div class="col-sm-12">
                                    <input type="text" name="id_admin" class="form-control" value="{{ $data->id_admin }}">
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