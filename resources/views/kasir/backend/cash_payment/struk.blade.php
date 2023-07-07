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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">TAGIHAN PAMSIMAS</h2>
                <p class="text-center">Datetime: </p>
                <hr>
                <h4 class="text-center">STRUK PEMBAYARAN TAGIHAN AIR</h4>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <p>Bulan Penggunaan: </p>
                        <p>ID Tagihan:</p>
                        <p>ID Pembayaran: </p>
                        <p>ID Pelanggan: </p>
                        <p>Nama Pelanggan:</p>
                        <p>Penggunaan Air:</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <p>Biaya Beban Tetap:</p>
                        <p>Biaya Pemeliharaan: </p>
                        <p>PPN:</p>
                        <p>Biaya Materai: </p>
                        <p>Biaya Tagihan: </p>
                        <p>Biaya Admin: </p>
                        <p>Total Tagihan: </p>
                    </div>
                </div>
                <hr>
                <p class="text-center">Simpan Struk Pembayaran ini sebagai bukti pembayaran tagihan.</p>
            </div>
        </div>
    </div>
</section>

</main><!-- End #main -->

@endsection