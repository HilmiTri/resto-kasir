@extends('template.index')

@section('sidebar')
@include('cashier.sidebar')
@endsection()

@section('content')
<div class="pagetitle">
    <h1>Cafe Bisa Ngopi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=" ">Home</a></li>
            <li class="breadcrumb-item">Forms</li>
            <li class="breadcrumb-item active">Halaman Edit Transaksi</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Halaman Edit Transaksi</h5>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Vertical Form -->
                <form class="row g-3" action="{{ route('transaksi.update', $transaksi->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-12">
                        <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                        <input type="text" name="nama_pelanggan" class="form-control" value="{{ $transaksi->nama_pelanggan }}" id="nama_pelanggan">
                    </div>
                    <div class="col-12">
                        <label for="nama_menu" class="form-label">Menu</label>
                        <select class="form-select" name="nama_menu" aria-label="Default select example" id="nama_menu">
                            <option value="{{ $transaksi->nama_menu }}" hidden>-- Pilih Menu--</option>
                            @foreach ($menus as $menu)
                            <option value="{{ $menu->nama_menu }}">{{ $menu->nama_menu }} | {{ $menu->harga }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" value="{{ $transaksi->jumlah }}" id="jumlah">
                    </div>
                    <div class="col-12">
                        <label for="total_harga" class="form-label">Total Harga</label>
                        <input type="number" name="total_harga" class="form-control" value="{{ $transaksi->total_harga }}" id="total_harga">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary float-end ms-1">Submit</button>
                        <button type="reset" class="btn btn-secondary float-end ms-1">Reset</button>
                    </div>
                </form><!-- Vertical Form -->

            </div>
        </div>
    </div>
</div>
@endsection()