@extends('template.index')

@section('sidebar')
@include('cashier.sidebar');
@endsection()

@section('content')
<div class="pagetitle">
    <h1>Cafe Bisa Ngopi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href=" ">Home</a></li>
            <li class="breadcrumb-item">Forms</li>
            <li class="breadcrumb-item active">Halaman Create Transaksi</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="row">
    <div class="col-lg">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Halaman Create Transaksi</h5>
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
                <form class="row g-3" action="{{ route('transaksi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                        <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                        <input type="text" name="nama_pelanggan" class="form-control" id="nama_pelanggan">
                    </div>
                    <div class="col-12">
                        <label for="id_menu" class="form-label">Menu</label>
                        <select class="form-select" name="id_menu" aria-label="Default select example" id="id_menu">
                            <option hidden>-- Pilih Menu--</option>
                            @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->nama_menu }} | {{ $menu->harga }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" id="jumlah">
                    </div>
                    <div class="col-12">
                        <label for="total" class="form-label">Total</label>
                        <input type="number" disabled class="form-control" id="total">
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

@section('js')
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // if option is selected will sum product price and option price
        $('select[name="id_menu"]').on('change', function() {
            $("#jumlah").val("");
            $("#total").val("");

            var idMenu = $(this).val();
            $.ajax({
                url: "{{ url('cashier/transaksi/') }}/" + encodeURI(idMenu),
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $("#jumlah").keyup(function() {
                        var harga = data.harga;
                        var jumlah = $("#jumlah").val();

                        var total = parseInt(harga) * parseInt(jumlah);
                        $("#total").val(total);
                    });
                }
            });
        });
    });
</script>
@endsection()