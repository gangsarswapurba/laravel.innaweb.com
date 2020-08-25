@extends('layouts.app')

@section('main')
    @php $action_form = '/order/save/'; @endphp
    @if(isset($order) && $order)
        @php $order = $order[0] @endphp
        @php $action_form = $action_form.$order->id ?> @endphp
        <h1>Edit Transaksi: {{ $order->id }} </h1>
    @else
        <h1>Tambah Transaksi Penjualan</h1>
    @endif
    @if($products) 
    <form id="form_make_order" method="post" action="{{ $action_form }}">
        {{ @csrf_field() }}
        @foreach ($products as $product)
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-xs-4"><b>Nama</b></div>
                    <div class="col-sm-3 col-xs-3"><b>SKU</b></div>
                    <div class="col-sm-3 col-xs-3"><b>Harga</b></div>
                    <div class="col-sm-2 col-xs-2"><b>Quantity<sup>*</sup></b></div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-xs-4"><?= $product->nome ?></div>
                    <div class="col-sm-3 col-xs-3"><?= $product->sku ?></div>
                    <div class="col-sm-3 col-xs-3">Rp<?= $product->preco ?></div>
                    <div class="col-sm-2 col-xs-2"><input class="stepper" style="max-width: 6rem;" type="number" id="product[{{ $product->id }}]" name="product[{{ $product->id }}]" step="1" min="0" max="100"
                                                          onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="0"></div>
                </div>
            </div>
        @endforeach
        <div class="mt-3">
            <button class="btn btn-primary" type="submit">Tambah</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Batal</a>
        </div>
    @else
        <div class="col-sm-12 col-xs-12">Tidak ada produk</div>
    </form>
    @endif
@endsection
