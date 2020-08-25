@extends('layouts.app')

@section('main')
    <h1>Order #{{$order_id}}</h1>
    
    <table id="order_table" class="table table-striped table-bordered table-responsive-sm" style="width:100%">
        <thead>
        <tr>
            <th>Nome</th>
            <th>SKU</th>
            <th>Harga</th>
            <th>Quantity</th>
        </tr>
        </thead>
        <tbody>
        @if($products)
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->nome }}</td>
                    <td>{{ $product->sku }}</td>
                    <td>Rp{{ $product->preco }}</td>
                    <td>{{ $product->product_qtd }}</td>
                </tr>
            @endforeach
        @else
            <td class="text-center" colspan="4">Tidak ada produk</td>
        @endif
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-12">
            <h2 class="float-right mt-5">Total Rp{{ number_format($total, 2, ',','.') }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <a href="{{ url()->previous() }}" class="btn btn-secondary mt-5">Kembali</a>
        </div>
    </div>
@endsection
