@extends('template.index')

@section('sidebar')
@include('manager.sidebar')
@endsection()

@section('content')
<div class="pagetitle">
    <h1>Cafe Bisa Ngopi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=" ">Home</a></li>
            <li class="breadcrumb-item">Forms</li>
            <li class="breadcrumb-item active">Halaman Edit Menu</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Halaman Edit Menu</h5>

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
                <form class="row g-3" action="{{ route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-12">
                        <label for="nama_menu" class="form-label">Nama Menu</label>
                        <input type="text" name="nama_menu" class="form-control" value="{{ $menu->nama_menu }}" id="nama_menu">
                    </div>
                    <div class="col-12">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" name="harga" class="form-control" value="{{ $menu->harga }}" id="harga">
                    </div>
                    <div class="col-12">
                        <label for="deksripsi" class="form-label">Deskripsi</label>
                        <input type="number" name="deksripsi" class="form-control" value="{{ $menu->deksripsi }}" id="deksripsi">
                    </div>
                    <div class="col-12">
                        <label for="ketersediaan" class="form-label">ketersediaan</label>
                        <input type="number" name="ketersediaan" class="form-control" value="{{ $menu->ketersediaan }}" id="ketersediaan">
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