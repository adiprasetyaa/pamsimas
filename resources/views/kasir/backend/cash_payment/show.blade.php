    @extends('kasir.kasir_dashboard')
    @section('kasir')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <main id="main" class="main">

        <div class="pagetitle">
            <nav>
                <ol class="breadcrumb">
                <!-- Vertically centered Modal -->
                    <a type="button" href="{{ route('kasir.pembayaran.cetak.struk', $data_tagihan->id_tagihan) }}" class="btn btn-primary m-2"> <i class="bi bi-printer me-2"></i> 
                        Lihat Invoice
                    </a>
                    <a type="button" href="{{ route('kasir.pembayaran.view.invoice', $data_tagihan->id_tagihan) }}" class="btn btn-warning m-2"><i class="bi bi-eye"></i> 
                        Lihat Invoice
                    </a>
                    <a type="button" href="{{ route('kasir.pembayaran.cetak.invoice', $data_tagihan->id_tagihan) }}" class="btn btn-info m-2"><i class="bi bi-printer me-2"></i> 
                        Cetak Invoice
                    </a>
                    <a type="button" href="" class="btn btn-success m-2"><i class="bx bx-paper-plane me-2"></i> 
                        Cetak Invoice
                    </a>
                </ol>
            </nav>
    </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
            

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                            <h5 class="card-title">Detail Pembayaran Tagihan</h5>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Tanggal Pembayaran </div>
                                <div class="col-lg-9 col-md-8">{{ $data_tagihan->pembayaran->tanggal_pembayaran }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Bulan Penggunaan</div>
                                <div class="col-lg-9 col-md-8">{{ $data_tagihan->bulan_penggunaan }}</div>
                            </div>


                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">ID Tagihan</div>
                                <div class="col-lg-9 col-md-8">{{ $data_tagihan->id_tagihan }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">ID Pembayaran</div>
                                <div class="col-lg-9 col-md-8">{{ $data_tagihan->pembayaran->id_pembayaran }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Nama Pelanggan</div>
                                <div class="col-lg-9 col-md-8">{{ $data_tagihan->pelanggan->user->name }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Estimasi Penggunaan Air</div>
                                <div class="col-lg-9 col-md-8">{{ $data_tagihan->meteran }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Biaya Beban Tetap</div>
                                <div class="col-lg-9 col-md-8">7450</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Biaya Pemeliharaan</div>
                                <div class="col-lg-9 col-md-8">4000</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">PPN</div>
                                <div class="col-lg-9 col-md-8">1995</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Biaya Materai</div>
                                <div class="col-lg-9 col-md-8">3000</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Biaya Tagihan</div>
                                <div class="col-lg-9 col-md-8">{{ $data_tagihan->jumlah_tagihan - (7450+4400+1995+3000+2500) }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Biaya Admin</div>
                                <div class="col-lg-9 col-md-8">2500</div>
                            </div>
                            <div class="row">
                                <hr>
                                <div class="col-lg-3 col-md-4 label "><h5><strong><b> Total Tagihan: </b></strong></h5></div>
                                <div class="col-lg-9 col-md-8"><h5><strong><b>{{ $data_tagihan->jumlah_tagihan }}</b></strong></h5></div>
                            </div>

                            </div>


                            <div class="tab-pane fade pt-3" id="profile-settings">

                            </div>


                        </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
    <!-- JS Script for change images when user upload -->

    @endsection