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
                    <h5 class="card-title">Halaman Manager</h5>
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
                        <a type="button" class="d-flex justify-content-end" class="btn btn-outline-primary" href="{{ route('menu.create') }}">Create</a>
                    </div>
                    <br>
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                    <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Menu</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">ketersediaan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>                    
                        <tbody>
                        <?php
                        $no=1;
                        ?>
                        @foreach($menus as $menu)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $menu->nama_menu }}</td>
                                <td>{{ $menu->harga }}</td>
                                <td>{{ $menu->deksripsi }}</td>
                                <td>{{ $menu->ketersediaan }}</td>
                                <td>
                                    <form action="{{ route('menu.destroy',$menu->id) }}" method="POST">

                                        <a class="btn btn-primary" href="{{ route('menu.edit',$menu->id) }}">Edit</a>

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