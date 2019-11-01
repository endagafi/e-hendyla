@extends('layouts.mainadmin')

@section('body')
<br>
{!! ($unproved>0)?'<div class="text-right approveAll"><button class="btn btn-primary btn-sm" id="approveAll" data-url="'.route('approveall').'">Approbar todos</button><br><br></div>':'' !!}
<table class="table table-bordered table-hover" id="auctions" data-cont="all">
    <tr>
        <th>Nombre del Producto</th>
        <th>Precio</th>
        <th>Fecha y hora</th>
        <th>User</th>
        <th></th>
    </tr>
    @foreach($products as $product)
        <tr>
            <td>{{$product->product_name}}</td>
            <td>Gs {{$product->minimal_price}}</td>
            <td>{{$product->created_at}}</td>
            <td>{{$product->user()}}</td>
            <td class="text-center">{!! ($product->approved==0)?'<button class="btn btn-primary btn-xs approve" data-url="'.route("approve",$product->id).'">Aprovar</button>':'<b class="text-success">Aprovado</b>' !!}</td>
        </tr>
    @endforeach
</table>
@endsection