@extends('kasir.kasir_dashboard')
@section('kasir')

<main id="main" class="main">

<div class="pagetitle">
<nav>
    <ol class="breadcrumb">
    <!-- Vertically centered Modal -->
    </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
            <h5 class="card-title">Daftar Tagihan</h5>

            <!-- Table with stripped rows -->
            <table class="table datatable">
            <thead>
                <tr>
                <th scope="col">Id Pelanggan</th>
                <th scope="col">Id Tagihan</th>
                <th scope="col">Nama Pelanggan</th>
                <th scope="col">Area Pelanggan</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($data_tagihan as $key => $item)
            <tr>
                <th scope="row">{{ $item->id_pelanggan }}</th>
                <td>{{ $item->id_tagihan }}</td>
                <td>{{ $item->pelanggan->user->name}}</td>
                <td>{{ $item->pelanggan->area->nama_area}}</td>
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
                        <form action="{{ route('kasir.cek.detail.tagihan', $data->id_tagihan)}}" method="get">
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