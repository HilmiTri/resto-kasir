@extends('template.index')

@section('sidebar')
@include('cashier.sidebar');
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
                    <h5 class="card-title">Halaman Transaksi</h5>
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <div>
                        <a type="button" class="d-flex justify-content-end" class="btn btn-outline-primary" href="{{ route('transaksi.create') }}">Create</a>
                    </div>
                    <br>
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
                                <th scope="col">Aksi</th>
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
                                <td>{{ $transaksi->total_harga }}</td>
                                <td>{{ $transaksi->nama_pegawai }}</td>
                                <td>
                                    <form action="{{ route('transaksi.destroy',$transaksi->id) }}" method="POST">

                                        <a class="btn btn-primary" href="{{ route('transaksi.edit',$transaksi->id) }}">Edit</a>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
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
@endsection()