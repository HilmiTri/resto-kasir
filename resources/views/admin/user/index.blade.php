@extends('template.index')

@section('sidebar')
@include('admin.sidebar');
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
                    <h5 class="card-title">Halaman Users</h5>
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
                        <a type="button" class="d-flex justify-content-end" class="btn btn-outline-primary" href="{{ route('user.create') }}">Create</a>
                    </div>
                    <br>
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Username</th>
                                <th scope="col">Password</th>
                                <th scope="col">Role</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $user->username }}</td>
                                <td>****</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <form action="{{ route('user.destroy',$user->id) }}" method="POST">

                                        <a class="btn btn-primary" href="{{ route('user.edit',$user->id) }}">Edit</a>

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