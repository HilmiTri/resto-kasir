@extends('template.index')

@section('sidebar')
    @include('admin.sidebar')
@endsection()

@section('content')
<div class="pagetitle">
    <h1>Cafe Bisa Ngopi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=" ">Home</a></li>
            <li class="breadcrumb-item">Forms</li>
            <li class="breadcrumb-item active">Halaman Create User</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Halaman Create User</h5>

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
                <form class="row g-3" action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" id="nama">
                    </div>
                    <div class="col-12">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="username">
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="col-12">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="col-12">
                        <label for="role" class="form-label">Akses</label>
                        <select class="form-select" name="role" aria-label="Default select example" id="role">
                            <option hidden>-- Pilih Akses--</option>
                            <option value="admin">Admin</option>
                            <option value="manager">Manajer</option>
                            <option value="cashier">Kasir</option>
                        </select>
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