@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                    <div class="card-header">
                        {{ __('DetalleVentas') }}

                        <button type="button" class="btn btn-success pull-right" data-bs-toggle="modal"
                                data-bs-target="#insertModal">Agregar
                        </button>

                    </div>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(count($detalle_ventas)==0)
                            -no hay Ventas Registradas
                        @else
                                    @foreach ($detalle_ventas as $detalle_venta)
                            <div class="card mb-3" style="max-width: 1000px;">
                                <div class="row no-gutters">
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$detalle_venta['cantidad']}}</h5>
                                            <h5 class="card-title">{{$detalle_venta['precio']}}</h5>
                                           <p class="card-text"><small class="text-muted">{{$detalle_venta['idPrenda']}}</small></p>
                                           <p class="card-text"><small class="text-muted">{{$detalle_venta['idVenta']}}</small></p>


                                                <button type="submit" class="btn btn-secondary" style="color: #dedddd"
                                                        data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                        data-id="{{$detalle_venta->id}}">
                                                    <i class="fas fa-trash"></i></button>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                @endforeach


                        @endif
                    </div>


            </div>
        </div>
    </div>
    <!-- Modal de Insertar -->
    <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insertModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar nueva Venta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <label class="col-md-4 col-form-label text-md-end"></label>
                <form method="post" action="{{route('detalleventa.guardar')}}">
                    @csrf
                    <div class="row mb-3">
                        <label for="cantidad" class="col-md-4 col-form-label text-md-end">{{ __('Cantidad') }}</label>
                        <div class="col-md-6">
                            <input type="text" name="cantidad" class="form-control @error('cantidad') is-invalid @enderror"
                                   value="{{old('cantidad')}}" placeholder="Ingrese la Cantidad"><br>
                            @error('cantidad')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <label for="precio" class="col-md-4 col-form-label text-md-end">{{ __('precio') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="precio" class="form-control @error('precio') is-invalid @enderror"
                                       value="{{old('precio')}}" placeholder="Ingrese algun Precio"><br>
                                @error('descripcion')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="idCliente"
                                       class="col-md-4 col-form-label text-md-end">{{ __('idPrenda') }}</label>
                                <div class="col-md-6">
                                    <input type="number" name="idPrenda"
                                           class="form-control @error('idPrenda') is-invalid @enderror"
                                           value="{{old('idPrenda')}}"><br>
                                    @error('idPrenda')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="row mb-3">
                                <label for="idCliente"
                                       class="col-md-4 col-form-label text-md-end">{{ __('idVenta') }}</label>
                                <div class="col-md-6">
                                    <input type="number" name="idVenta"
                                           class="form-control @error('idVenta') is-invalid @enderror"
                                           value="{{old('idVenta')}}"><br>
                                    @error('idVenta')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary" value="Guardar">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                </form>

            </div>
        </div>
    </div>
    </div>
    <!-- Modal de Insertar -->


@endsection
