@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                    <div class="card-header">
                        {{ __('Ventas') }}

                        <button type="button" class="btn btn-success pull-right" data-bs-toggle="modal"
                                data-bs-target="#insertModal">Agregar
                        </button>

                    </div>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(count($ventas)==0)
                            -no hay Ventas Registradas
                        @else
                                    @foreach ($ventas as $venta)
                            <div class="card mb-3" style="max-width: 1000px;">
                                <div class="row no-gutters">
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$venta['nombre_venta']}}</h5>
                                            <h5 class="card-title">{{$venta['descripcion']}}</h5>
                                           <p class="card-text"><small class="text-muted">{{$venta['fecha']}}</small></p>
                                           <p class="card-text"><small class="text-muted">{{$venta['idCliente']}}</small></p>


                                                <button type="submit" class="btn btn-secondary" style="color: #dedddd"
                                                        data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                        data-id="{{$venta->id}}">
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
                <form method="post" action="{{route('venta.guardar')}}">
                    @csrf
                    <div class="row mb-3">
                        <label for="nombre_venta" class="col-md-4 col-form-label text-md-end">{{ __('Nombre de Venta') }}</label>
                        <div class="col-md-6">
                            <input type="text" name="nombre_venta" class="form-control @error('nombre_venta') is-invalid @enderror"
                                   value="{{old('nombre_venta')}}" placeholder="Ingrese Nombre de la Venta"><br>
                            @error('nombre_venta')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-end">{{ __('Descripcion') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror"
                                       value="{{old('descripcion')}}" placeholder="Ingrese alguna Descripcion"><br>
                                @error('descripcion')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="idCliente"
                                       class="col-md-4 col-form-label text-md-end">{{ __('idCliente') }}</label>
                                <div class="col-md-6">
                                    <input type="number" name="idCliente"
                                           class="form-control @error('idCliente') is-invalid @enderror"
                                           value="{{old('idCliente')}}"><br>
                                    @error('idCliente')
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
