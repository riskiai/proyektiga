<!DOCTYPE html>
<html>
<head>
	<title>AsapCair</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
        <span>
            <b style="font-size: 30px;">Laporan penjualan <br> Produk Asap Cair </b>  <br> {{ $dari_tgl }} - {{ $sampai_tgl }}
        </span>
        <hr>
    </center>



    <span>
        <b>Total pemasukan</b> : @foreach ($total as  $item)
        Rp. {{ $item->total}}
        @endforeach
    </span>
    <hr>
    <b>Produk terjual</b>  : <br><br>
    <br>
        <div style="width: 300px;">
            @foreach ($data as $item)
            <div style="width:180px; float:left; margin-top:-10px;">
                {{ $item->name  }} :
            </div>
            <div style="width:100px; float:left; margin-top:-10px;">
                {{ $item->total_penjualan  }}
            </div>
            <br>
            @endforeach
            <div style="width:100px; float:left; margin-top:-10px;">
                <b>  Total :{{$transaksi->sum('terjual')}}</b>
             </div>
        </div>
    <hr>
    <br> <b>Detail transaksi</b>  : <br>
	<table class="table table-sm table-hover mt-3 mb-5">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Sub total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $item)
            <tr>
                <td>{{ $item->tgl_transaksi }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->terjual }}</td>
                <td>Rp{{ $item->price }}</td>
                <td>Rp{{ $item->terjual*$item->price }}</td>
            </tr>

            @endforeach
        </tbody>
    </table>
    <hr>
    <span style="float: right; margin-right:120px;">Dibuat oleh </span>
    <br>
    <br>
    <br>
    <hr style="width: 200px; float: right; margin-right: 0px;">

    <span style="float: right; margin-top:15px; margin-right:-50px;">Admin</span>
</body>
</html>
