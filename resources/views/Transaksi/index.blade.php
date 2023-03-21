<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Imuslih E-Commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <div class="container bg-light" style="max-width: 100%">
        <a href="{{ url('/') }}">
            <button class="btn btn-secondary mt-3" type="button" style="margin-bottom: 20px;">Beranda</button>
        </a>
        <div class="row">
            <div class="col-sm-8">
                <div class="row">
                    @foreach ($products as $item)
                    <div class="col-sm-4">
                        <div class="card text-center mb-3">
                            <div class="card-body" style="height:230px;">
                                <h5>{{ $item->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted"><i>Category : {{ $item->category->name }}</i></h6>
                                <h4>Rp. {{ number_format($item->price,0,',','.') }}</h4>
                                <a href="/transaksi/add/{{ $item->id }}">
                                    <button class="btn btn-primary mt-3" type="button">Tambah ke keranjang</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card text-center mb-3">
                    <div class="card-body">
                        <h5>Detail Transaksi</h5>
                        @if (empty($cart))
                            <p>Tidak ada produk yang dipilih</p>
                        @else
                            <table class="table table-striped">
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Jml</th>
                                <th>Harga</th>
                                <th>&nbsp;</th>
                            </tr>
                            @php
                                $i=1;
                                $grandtotal=0;
                            @endphp
                            @foreach ($cart as $item => $val)
                            @php
                                $total = $val['harga_produk'] * $val['qty'];
                            @endphp
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $val['nama_produk'] }}</td>
                                    <td>{{ $val['qty'] }}</td>
                                    <td style="text-align: right">{{ number_format($val['harga_produk'],0,',','.') }}</td>
                                    <td>
                                        <a href="{{ url('/transaksi/hapus/'.$item) }}">Batal</a>
                                    </td>
                                </tr>
                                @php
                                    $grandtotal +=$total;
                                @endphp
                            @endforeach
                                <tr>
                                    <td colspan="3"><b>Total Belanja</b></td>
                                    <td colspan="2" style="text-align: left"><b>{{ number_format($grandtotal,0,',','.') }}</b></td>
                                </tr>           
                        </table>
                        @endif
                        <a href="/transaksi/create">
                            <button class="btn btn-warning mt-3" type="button">Check Out</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>