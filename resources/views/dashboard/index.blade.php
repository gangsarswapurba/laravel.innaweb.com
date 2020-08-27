@extends('layouts.app')

@section('content')
<h2>Penjualan Bulan {{ date('F') }} Ini</h2>
<canvas id="myChart" width="" height=""></canvas>

<h2 class="mt-5 mb-4">10 Penjualan Terakhir</h2>
    <table id="dashboard" class="dashboard table table-striped table-bordered table-responsive-sm" style="width:100%">
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
                    <td>{{ $order->id }}</td>
                    <td>@php $data = new DateTime($order->data); echo $data->format('d/m/Y - H:i:s') @endphp</td>
                    <td><a href="{{ url('order/view/'.$order->id) }}"><i class="fa fa-info-circle" aria-hidden="true"></i></a></td>
                    <td><a class="delete-order" href="#" data-id="{{ url('order/delete/'.$order->id) }}" data-toggle="modal" data-target="#deleteOrderModal"><i class="fa fa-trash" aria-hidden="true"></i>
</a></td>
                </tr>
            @endforeach
        @else
            <td class="text-center" colspan="6">Tidak ada penjualan</td>
        @endif
        </tbody>
    </table>
@endsection

@section('modal')
    @include('order.modal.delete')
@endsection