@extends('template.index')

@section('sidebar')
@include('manager.sidebar');
@endsection()

@section('content')
<div class="pagetitle">
    <h1>Cafe Bisa Ngopi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=" ">Home</a></li>
            <li class="breadcrumb-item">Forms</li>
            <li class="breadcrumb-item active">Cafe Bisa Ngopi</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="row">
    <div class="col-lg">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Halaman Create Menu</h5>

                <!-- Vertical Form -->
                <form class="row g-3" action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                        <label for="nama_menu" class="form-label">Nama Menu</label>
                        <input type="text" name="nama_menu" class="form-control" id="nama_menu">
                    </div>
                    <div class="col-12">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" name="harga" class="form-control" id="harga">
                    </div>
                    <div class="col-12">
                        <label for="deskrispi">Deskripsi</label>
                        <textarea class="form-control" name="deksripsi" id="floatingTextarea" style="height: 100px;"></textarea>
                    </div>
                    <div class="col-12">
                        <label for="ketersediaan" class="form-label">ketersediaan</label>
                        <input type="number" name="ketersediaan" class="form-control" id="ketersediaan">
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
</section>
@endsection()