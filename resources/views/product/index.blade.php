@include('components/header')
    
    <div class="row mb-3">
      <div class="col-md-6">
        <h1>Daftar Produk</h1>
      </div>
      <div class="col-md-6 text-right">
        <a class="btn btn-primary" href="{{ url('/product/create/') }}"><i class="fas fa-plus-circle"></i> Tambah Produk</a>
      </div>
    </div><!-- .row -->
    <table id="product_table" class="table table-striped table-bordered table-responsive-sm" style="width:100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>SKU</th>
            <th>Harga</th>
            <th>Edit</th>
            <th>Hapus</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if($products) {
            foreach ($products as $product) { ?>
                <tr>
                    <td><?= $product->id ?></td>
                    <td><?= $product->nome ?></td>
                    <td><?= $product->sku ?></td>
                    <td><?= $product->preco ?></td>
                    <td><a href="{{ url('product/ubah/'.$product->id) }}"><i class="fa fa-edit" aria-hidden="true"></i>
</a></td>
                    <td><a class="delete-product" href="#" data-id="<?= url('product/delete/'.$product->id) ?>" data-toggle="modal" data-target="#deleteProductModal"><i class="fa fa-trash" aria-hidden="true"></i>
</a></td>
                </tr>
            <?php }
        } else { ?>
            <td class="text-center" colspan="6">Tidak ada produk</td>
        <?php } ?>
        </tbody>
    </table>

@include('product/modal/delete')
@include('components/footer')
