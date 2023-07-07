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

                    <h5 class="card-title">Input Data Penggunaan Air</h5>
                    <!-- Vertical Form -->
                    <form class="row g-3" action="{{ route('petugas.input.store') }}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="col-12">
                            <label for="id_pelanggan" class="form-label">Id Pelanggan</label>
                            <input type="text" name="id_pelanggan" class="form-control" id="id_pelanggan">
                        </div>
                        <div class="col-12">
                            <label for="name" class="form-label">Nama Pelanggan</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <div class="col-12">
                            <label for="bulan_penggunaan" class="form-label">Periode Penggunaan (YYYYMM)</label>
                            <input type="text" name="bulan_penggunaan" class="form-control" id="bulan_penggunaan">
                        </div>
                        <div class="col-12">
                            <label for="meteran_awal" class="form-label">Meteran Awal</label>
                            <input type="number" step="0.01" name="meteran_awal" class="form-control" id="meteran_awal">
                        </div>
                        <div class="col-12">
                            <label for="meteran_akhir" class="form-label">Meteran Akhir</label>
                            <input type="number"  step="0.01" name="meteran_akhir" class="form-control" id="meteran_akhir">
                        </div>
                        <div class="col-12">
                            <label for="tanggal_penagihan" class="form-label">Tanggal Penagihan</label>
                            <input type="date" name="tanggal_penagihan" class="form-control" id="tanggal_penagihan">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit Tagihan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form><!-- Vertical Form -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection