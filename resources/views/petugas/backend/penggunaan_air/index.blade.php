@extends('petugas.petugas_dashboard')
@section('petugas')

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
                <th scope="col">Nama Pelanggan</th>
                <th scope="col">Area Pelanggan</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($data_pelanggan_area as $key => $item)
            <tr>
                <th scope="row">{{ $item->id_pelanggan }}</th>
                <td>{{ $item->user->name}}</td>
                <td>{{ $item->area->nama_area}}</td>
                <td>
                    <a type="button" href={{ route('petugas.show.detail.pelanggan',$item->id_pelanggan) }} class="btn btn-warning" >
                        <i class="bi bi bi-eye"></i>
                    </a>
                    <a type="button" href="{{ route('pelanggan.pembayaran.create',$item->id_pelanggan) }}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#store_data-{{ $item->id_pelanggan}}">
                        <i class="bi bi-upload"></i>
                    </a>          
                </td>
            </tr>       
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