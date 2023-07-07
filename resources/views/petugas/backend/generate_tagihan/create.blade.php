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
    
                    <form class="row g-3" action="{{ route('petugas.generate.show') }}" method="GET">
                        @csrf
                        <div class="col-12">
                            <label for="bulan_penggunaan" class="form-label">Periode Tagihan</label>
                            <input type="search" name="bulan_penggunaan" class="form-control" id="bulan_penggunaan" placeholder="Format YYMMMM (e.g. 202304)">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Cek Daftar Tagihan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form><!-- Vertical Form -->
                    <!-- Vertical Form -->
                    <form class="row g-3" action="{{ route('petugas.generate.store') }}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="col-12">
                            <label for="bulan_penggunaan" class="form-label">Periode Tagihan</label>
                            <input type="search" name="bulan_penggunaan" class="form-control" id="bulan_penggunaan" placeholder="Format YYMMMM (e.g. 202304)">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Generate Tagihan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form><!-- Vertical Form -->

                    </div>

                    @if(isset($data_tagihan))
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Daftar Tagihan</h5>
            
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                        <thead>
                            <tr>
                            <th scope="col">Id Pelanggan</th>
                            <th scope="col">Nama Pelanggan</th>
                            <th scope="col">Meteran</th>
                            <th scope="col">Tanggal Penagihan</th>
                            <th scope="col">Jumlah Tagihan</th>
                            <th scope="col">Area Pelanggan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_tagihan as $item)
                        <tr>
                            <th scope="row">{{ $item->id_pelanggan }}</th>
                            <td>{{ $item->pelanggan->user->name}}</td>
                            <td>{{ $item->meteran }}</td>
                            <td>{{ $item->tanggal_penagihan }}</td>
                            <td>{{ $item->jumlah_tagihan }}</td>
                            <td>{{ $item->pelanggan->area->nama_area}}</td>
                        </tr>       
                        @endforeach
                        </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                        </div>
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection