@extends('layouts.main')
@section('title') Sell product - @stop
@section('body')
<br>
    <form class="form-horizontal sell-form col-md-11 col-md-offset-1" role="form" method="POST" action="{{ url('sell') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="text-center text-success">{!! session()->has('message')?session()->get('message')."<br><br>":"" !!}</div>

        <div class="form-group{{ $errors->has('productName') ? ' has-error' : '' }}">
            <label for="productName" class="col-md-3 control-label">Nombre del Producto</label>

            <div class="col-md-8">
                <input id="productName" type="text" class="form-control" name="productName" value="{{ old('productName') }}" placeholder="Articulo..." required autofocus>

                @if ($errors->has('productName'))
                    <span class="help-block">
                        <strong>{{ $errors->first('productName') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('minimalPrice') ? ' has-error' : '' }}">
            <label for="minimalPrice" class="col-md-3 control-label">Precio</label>

            <div class="col-md-8">
                <input id="minimalPrice" type="number" class="form-control" name="minimalPrice" value="{{ old('minimalPrice') }}" placeholder="Precio" required>

                @if ($errors->has('minimalPrice'))
                    <span class="help-block">
                        <strong>{{ $errors->first('minimalPrice') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('auctionEndTime') ? ' has-error' : '' }}">
            <label for="auctionEndTime" class="col-md-3 control-label">Terminar oferta</label>
            <div class="col-md-8{{ $errors->has('auctionEndTime') ? ' has-error' : '' }}">
                <input id="auctionEndTime" type='text' class="form-control" name="auctionEndTime" placeholder="Fecha" autocomplete="off" />

                @if ($errors->has('auctionEndTime'))
                    <span class="help-block">
                        <strong>{{ $errors->first('auctionEndTime') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('productPicture') ? ' has-error' : '' }}">
            <label for="productPicture" class="col-md-3 control-label">Imagen del Producto</label>

            <div class="col-md-8">
                <input id="productPicture" type="file" class="form-control" name="productPicture" value="{{ old('productPicture') }}">

                @if ($errors->has('productPicture'))
                    <span class="help-block">
                        <strong>{{ $errors->first('productPicture') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label for="description" class="col-md-3 control-label">Descripcion del Producto</label>

            <div class="col-md-8">
                <textarea id="description" type="text" class="form-control" name="description" placeholder="Super Descripcion...">{{ old('description') }}</textarea> 

                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-md-8 col-md-offset-1 text-left">
                <p>
                    * Esta prohibido vender niños y esclavos
                </p>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12 text-center">
            <br><br>
                <button type="submit" class="btn btn-primary">
                    Vender
                </button>
            </div>
        </div>
    </form>
    @section('bottom_scripts')
        <script src="{{ asset('js/moment.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
        <script type="text/javascript">
            $(function () {
                $('#auctionEndTime').datetimepicker({
                    //locale:'ru',
                    useCurrent: false,
                    minDate:moment().add(2,'days'),
                    maxDate:moment().add(720,'days'),
                    format: 'YYYY-MM-DD HH:m',
                    
                });
            });
    </script>
    @endsection
@endsection