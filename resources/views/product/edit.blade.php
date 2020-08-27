@extends('layouts.app')

@section('content')
    @php $action_form = '/product/save/' @endphp
    @if(isset($product) && $product)
        @php $product = $product[0] @endphp
        @php $action_form = '/product/save/'.$product->id @endphp
        <h1>Edit Produk: {{ $product->nome }} </h1>
    @else
        <h1>Tambah Produk Baru</h1>
    @endif
    <form id="form_product" method="post" enctype="multipart/form-data" action="{{ url($action_form) }}">
        {{ @csrf_field() }}
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="nome">Nama *</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nama" required value="{{ (isset($product) ? $product->nome : '') }}">
            </div>
            <div class="col-md-4 mb-3">
                <label for="sku">SKU *</label>
                <input type="text" class="form-control" id="sku" name="sku" placeholder="SKU" required value="{{ (isset($product) ? $product->sku : '') }}">
            </div>
            <div class="col-md-4 mb-3">
                <label for="preco">Harga *</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Rp</span>
                    </div>
                    <input type="number" min="1" step="any" class="form-control" id="preco" name="preco" placeholder="0" aria-describedby="inputGroupPrepend" required value="{{ (isset($product) ? $product->preco : '') }}">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="descricao">Deskripsi</label>
                <textarea class="form-control" id="descricao" name="descricao" placeholder=""><?php echo (isset($product) ? htmlspecialchars($product->descricao) : '') ?></textarea>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
        <a href="{{ url('product') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection


