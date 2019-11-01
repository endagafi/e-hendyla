@extends('layouts.main')
@section('title') Bid products - @stop
@section('body')
<br>
@if(count($products)>0)
@foreach($products as $product)
<div class="row">
  <div class="col-md-3 text-center" style="position: relative;
    min-height: 90px;border-radius: 3px;
    border: 1px solid #e4e4e4;margin-left: 20px">
    <a href="#">
      <img class="" src="{{asset('img/products/'.$product->picture)}}" alt="..." style="margin: auto;width: auto;max-width: 100%;height: auto;max-height: 225px;display: block;text-align: center;">
    </a>
  </div>
  <div class="col-md-8">
    <h4 class="media-heading">{{$product->product_name}}</h4>
    <b>Termina</b> {!!$product->endDate()!!}<br>
    <b>Precio</b>: Gs{{$product->minimal_price}}<br>
    @if($product->maxBid())
      <b>Highest bid: </b><u><b>Gs{{$product->maxBid()}}</b></u>&nbsp;&nbsp;|&nbsp;&nbsp; 
      <span class="badge badge-default">{{$product->bidsCount() . '&nbsp;'.str_plural('Bid',$product->bidsCount())}}</span><br>
    @else
    <b class="text-muted">Disponible</b><br>
    @endif
    {!! ($product->hasBidden())?'<b>Your bid</b>: Gs'.$product->userBid()->price.'<br>':'' !!}
    <br>
    <b>Descripcion: </b><p>{{$product->description}}</p><br>
    <a href="{{route('buyProduct',$product->id)}}"><button class="btn btn-primary btn-xs">{{($product->hasBidden())?'Rebid':'Bid'}} this product</button></a>
  </div>
</div><hr>
@endforeach
@else
<h2 class="text-center">No se encontraron productos</h2>  
@endif
@endsection