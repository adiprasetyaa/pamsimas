@extends('petugas.petugas_dashboard')
@section('petugas')    

    <main id="main" class="main">

        <div class="pagetitle">
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-12">

                    <div class="card">
                        <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                            <div class="tab-content pt-1">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                    <h5 class="card-title">Detail Profil Pelanggan</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">ID Pelanggan</div>
                                        <div class="col-lg-9 col-md-8">{{ $data_pelanggan->id_pelanggan }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Nama Pelanggan</div>
                                        <div class="col-lg-9 col-md-8">{{ $data_pelanggan->user->name }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Jenis Pengguna</div>
                                        <div class="col-lg-9 col-md-8">{{ $data_pelanggan->jenis_pengguna->nama_jenis_pengguna }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Petugas Meteran</div>
                                        <div class="col-lg-9 col-md-8">{{ $data_pelanggan->petugas_meteran->user->name }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Wilayah</div>
                                        <div class="col-lg-9 col-md-8">{{ $data_pelanggan->area->nama_area }}</div>
                                    </div>

                                </div>
                                
                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Daftar Tagihan</h5>
                
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                            <thead>
                                <tr>
                                <th scope="col">Id Tagihan</th>
                                <th scope="col">Bulan Penggunaan</th>
                                <th scope="col">Jumlah Tagihan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($data_tagihan as $key => $item)
                            <tr>
                                <th scope="row">{{ $item->id_tagihan }}</th>
                                <td>{{ $item->bulan_penggunaan}}</td>
                                <td>{{ $item->jumlah_tagihan}}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <a type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#show_data-{{ $item->id_tagihan}}">
                                        <i class="bi bi bi-eye"></i>
                                    </a>       
                                </td>
                            </tr>       
                            @endforeach
                            @foreach ($data_tagihan as $data )
                                <!-- Modal for Show Data -->
                                <div class="modal fade" id="show_data-{{ $data->id_tagihan }}" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- General Form Elements -->
                                            <h5 class="card-title mx-3">Tagihan </h5>
                                            <form action="{{ route('pelanggan.tagihan.show', $data->id_tagihan)}}" method="get">
                                                @method('GET')
                                                @csrf
                                                <div class="row m-2">
                                                    <label for="name" class="col-sm-12 col-form-label">Nama Pelanggan</label>
                                                    <div class="col-sm-12">
                                                        <p>{{ $data->pelanggan->user->name }}</p>
                                                    </div>
                                                </div>
                                                <div class="row m-2">
                                                    <label for="id_pelanggan" class="col-sm-12 col-form-label">Id Pelanggan</label>
                                                    <div class="col-sm-12">
                                                        <p> {{ $data->id_pelanggan }}</p>
                                                    </div>
                                                </div>
                                                <div class="row m-2">
                                                    <label for="status" class="col-sm-12 col-form-label">Status</label>
                                                    <div class="col-sm-12">
                                                        <p> {{ $data->status }}</p>
                                                    </div>
                                                </div>
                                                <div class="row m-2">
                                                    <label for="bulan_penggunaan" class="col-sm-12 col-form-label">Bulan Penggunaan</label>
                                                    <div class="col-sm-12">
                                                        <p>{{ $data->bulan_penggunaan }}</p>
                                                    </div>
                                                </div>
                                                <div class="row m-2">
                                                    <label for="bulan_penggunaan" class="col-sm-12 col-form-label">Tanggal Penagihan</label>
                                                    <div class="col-sm-12">
                                                        <p>{{ $data->tanggal_penagihan }}</p>
                                                    </div>
                                                </div>
                                                <div class="row m-2">
                                                    <label for="bulan_penggunaan" class="col-sm-12 col-form-label">Meteran</label>
                                                    <div class="col-sm-12">
                                                        <p>{{ $data->meteran }}</p>
                                                    </div>
                                                </div>
                                                <div class="row mb-3 m-2">
                                                    <label for="bulan_penggunaan" class="col-sm-12 col-form-label">Jumlah Tagihan</label>
                                                    <div class="col-sm-12">
                                                        <p>{{ $data->jumlah_tagihan }}</p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Cetak Invoice</button>
                                                </div>
                                            </form><!-- End General Form Elements -->
                                        </div>
                                        </div>
                                    </div>
                                </div> <!-- End Modal for Show Data -->
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