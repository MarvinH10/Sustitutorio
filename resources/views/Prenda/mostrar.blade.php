@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                    <div class="card-header">
                        {{ __('Prendas') }}

                        <button type="button" class="btn btn-success pull-right" data-bs-toggle="modal"
                                data-bs-target="#insertModal">Agregar
                        </button>

                    </div>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(count($prendas)==0)
                            -no hay Prendas Registradas
                        @else
                                    @foreach ($prendas as $prenda)
                            <div class="card mb-3" style="max-width: 1000px;">
                                <div class="row no-gutters">
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$prenda['nombre']}}</h5>
                                            <h5 class="card-title">{{$prenda['cantidad']}}</h5>
                                           <p class="card-text"><small class="text-muted">{{$prenda['fecha']}}</small></p>
                                           <p class="card-text"><small class="text-muted">{{$prenda['precio']}}</small></p>


                                                <button type="submit" class="btn btn-secondary" style="color: #dedddd"
                                                        data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                        data-id="{{$prenda->id}}">
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
                    <h5 class="modal-title" id="exampleModalLabel">Agregar nueva Prenda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <label class="col-md-4 col-form-label text-md-end"></label>
                <form method="post" action="{{route('prenda.guardar')}}">
                    @csrf
                    <div class="row mb-3">
                        <label for="nombre" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
                        <div class="col-md-6">
                            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                                   value="{{old('nombre')}}" placeholder="Ingrese Nombre"><br>
                            @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <label for="fecha" class="col-md-4 col-form-label text-md-end">{{ __('fecha') }}</label>
                            <div class="col-md-6">
                                <input type="date" name="fecha" class="form-control @error('fecha') is-invalid @enderror"
                                       value="{{old('nombre')}}" placeholder="Ingrese Nombre"><br>
                                @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="cantidad" class="col-md-4 col-form-label text-md-end">{{ __('cantidad') }}</label>
                                <div class="col-md-6">
                                    <input type="number" name="cantidad" class="form-control @error('cantidad') is-invalid @enderror"
                                           value="{{old('nombre')}}" placeholder="Ingrese cantidad"><br>
                                    @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <label for="precio" class="col-md-4 col-form-label text-md-end">{{ __('precio') }}</label>
                                <div class="col-md-6">
                                    <input type="number" name="precio" class="form-control @error('precio') is-invalid @enderror"
                                           value="{{old('precio')}}" placeholder="Ingrese precio"><br>
                                    @error('precio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <label for="tipo"
                                           class="col-md-4 col-form-label text-md-end">{{ __('tipo') }}</label>

                                    <div class="col-md-6">
                                        <select name="tipo" class="form-select" aria-label=".form-select-sm example">
                                            <option selected>Seleccionar tipo</option>
                                            <option value="vestir">vestir</option>
                                            <option value="casual">casual</option>
                                            <option value="urbano">urbano</option>
                                        </select>
                                    </div>
                                </div>


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
