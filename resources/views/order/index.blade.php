@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
      <div class="col-md-6">
        <h1>Daftar Penjualan</h1>
      </div>
      <div class="col-md-6 text-right">
        <a class="btn btn-primary" href="{{ url('order/create') }}"><i class="fas fa-plus-circle"></i> Tambah Transaksi Penjualan</a>
      </div>
    </div><!-- .row -->
    <table id="product_table" class="table table-striped table-bordered table-responsive-sm" style="width:100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tanggal Transaksi</th>
            <th>Detail</th>
            <th>Hapus</th>
        </tr>
        </thead>
        <tbody>
        @if($orders)
            @foreach ($orders as $order)
                <tr>
                    <td><?= $order->id ?></td>
                    <td><?php $data = new DateTime($order->data); echo $data->format('d/m/Y - H:i:s') ?></td>
                    <td><a href="{{ url('/order/view/'.$order->id) }}"><i class="fa fa-info-circle" aria-hidden="true"></i></a></td>
                    <td><a class="delete-order" href="#" data-id="<?= url('order/delete/'.$order->id) ?>" data-toggle="modal" data-target="#deleteOrderModal"><i class="fa fa-trash" aria-hidden="true"></i>
</a></td>
                </tr>
            @endforeach
        @else
            <td class="text-center" colspan="6">Tidak ada penjualan</td>
        @endif
        </tbody>
    </table>
</div>
@endsection

@section('modal')
    @include('order/modal/delete')
@endsection

