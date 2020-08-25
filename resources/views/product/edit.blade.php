@extends('layouts.app')

@section('main')
    @php $action_form = '/product/save/' @endphp
    @if(isset($product) && $product)
        @foreach ($product as $produto)
            @php $action_form = $action_form.$produto->id @endphp
        @endforeach
        <h1>Edit Produk: {{ $produto->nome }} </h1>
    @else
        <h1>Tambah Produk Baru</h1>
    @endif
    <form id="form_product" method="post" enctype="multipart/form-data" action="{{url($action_form)}}">
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="nome">Nama *</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nama" required value="{{ (isset($produto) ? $produto->nome : '') }}">
            </div>
            <div class="col-md-4 mb-3">
                <label for="sku">SKU *</label>
                <input type="text" class="form-control" id="sku" name="sku" placeholder="SKU" required value="{{ (isset($produto) ? $produto->sku : '') }}">
            </div>
            <div class="col-md-4 mb-3">
                <label for="preco">Harga *</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Rp</span>
                    </div>
                    <input type="number" class="form-control" id="preco" name="preco" placeholder="0" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" aria-describedby="inputGroupPrepend" required value="{{ (isset($produto) ? $produto->preco : '') }}">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="descricao">Deskripsi</label>
                <textarea class="form-control" id="descricao" name="descricao" placeholder="">{{ (isset($produto) ? htmlspecialchars($produto->descricao) : '') }}</textarea>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection


