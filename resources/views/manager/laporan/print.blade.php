<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
</head>

<body>
    <center>
        <h5>Laporan Cafe Bisa Ngopi</h4>
    </center>
    <table class="table datatable bordered">
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
</body>

</html>