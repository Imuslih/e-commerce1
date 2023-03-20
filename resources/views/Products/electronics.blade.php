@extends('app')

@section('content')
    {{-- <a href="{{ url('product/add') }}">
        <button class="btn btn-primary mt-3" type="button" style="margin-bottom: 20px;">Tambah</button>
    </a> --}}
    {{-- <a href="{{ url('product/update') }}">
        <button class="btn btn-success mt-3" type="button">Update</button>
    </a> --}}
    <div class="row">
        {{-- <div class="col-sm-6">
            <table class="table table-primary table-responsive">
                <tr>
                    <th style="width: 50px; text-align: center;">No</th>
                    <th>Makanan</th>
                    <th>Harga</th>
                </tr>
                    @php
                        $i=0
                    @endphp
                    @foreach ($products as $item)
                    @if ($item['category_id']==1)
                    @php
                        $i++
                    @endphp
                    <tr>
                        <td style="text-align: center;">{{ $i }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>Rp. {{ number_format( $item['price'],0,',','.') }},-</td>
                    </tr>
                    @endif
                    @endforeach
            </table>
        </div>
        <div class="col-sm-6">
            <table class="table table-success table-responsive">
                <tr>
                    <th style="width: 50px; text-align: center;">No</th>
                    <th>Minuman</th>
                    <th>Harga</th>
                </tr>
                    @php
                        $i=0
                    @endphp
                    @foreach ($products as $item)
                    @if ($item['category_id']==2)
                    @php
                        $i++
                    @endphp
                    <tr>
                        <td style="text-align: center;">{{ $i }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>Rp. {{ number_format( $item['price'],0,',','.') }},-</td>
                    </tr>
                    @endif
                    @endforeach
            </table>
        </div> --}}
    </div>
        <div class="col">
            @php
                $i=0
            @endphp
            @foreach ($products as $item)
            @if ($item['category_id']==1)
            @php
                $i++
            @endphp
            <div class="card mt-3">
                <div class="card-body">
                    <div class="h5">
                        {{ $item->name }}
                    </div>
                    <h4>Rp. {{ number_format($item->price,0,',','.') }}</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <p><b>Spesifikasi <br></b></p>
                            {{ $item->specification }}
                        </div>
                        <div class="col-sm-6">
                            <p><b>Deskripsi <br></b></p>
                            {{ $item->description }}
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
@endsection