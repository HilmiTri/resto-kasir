@extends('template.index')

@section('sidebar')
@include('manager.sidebar')
@endsection()

@section('content')
<div class="pagetitle">
    <h1>Cafe Bisa Ngopi</h1>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Halaman Laporan</h5>

                    <form action="{{ route('laporan.index') }}" method="GET">
                        <div class="input-group mb-3">
                            <input type="date" class="form-control" name="start_date">
                            <input type="date" class="form-control" name="end_date">
                            <button class="btn btn-primary" type="submit">Filter</button>
                        </div>
                    </form>
                    
                    <form action="{{ route('manager.print')}}" method="GET">
                        <div class="pb-5">
                            <input type="hidden" class="form-control" value="{{ $start_date }}" name="start_date">
                            <input type="hidden" class="form-control" value="{{ $end_date }}" name="end_date">
                            <button class="btn btn-outline-primary float-end" type="submit">Cetak PDF</button>
                        </div>
                    </form>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Pelanggan</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Total</th>
                                <th scope="col">Nama Pegawai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            @foreach($transaksis as $transaksi)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $transaksi->nama_pelanggan }}</td>
                                <td>{{ $transaksi->nama_menu }}</td>
                                <td>{{ $transaksi->jumlah }}</td>
                                <td>Rp.{{ number_format($transaksi->total_harga,0,',','.') }}</td>
                                <td>{{ $transaksi->nama_pegawai }}</td>
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
@endsection()