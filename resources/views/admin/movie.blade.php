@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Películas') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Título</th>
                            <th scope="col">Disponibilidad</th>
                            <th scope="col">Lanzada en:</th>
                            <th scope="col">Comprada en:</th>
                            <th scope="col">Ultima actualización</th>
                            @if(Auth::user()->role == "Admin")
                            <th scope="col">Opciones</th>
                            @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($movies as $movie) 
                            <tr>
                                <th scope="row">{{ $movie->id }}</th>
                                <td>{{ $movie->title }}</td>
                                <td>{{ $movie->available }}</td>
                                <td>{{ $movie->released_at }}</td>
                                <td>{{ $movie->bought_at }}</td>
                                <td>{{ $movie->updated_at }}</td>
                                @if(Auth::user()->role == "Admin")
                                <td><a href="{{ route('movie.edit', ['id' => $movie->id]) }}">Editar</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Crear película') }}</div>
                    <div class="card-body">
                        <form action="/movie/" method="POST">
                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="title" class="form-label">Nueva película</label>
                                    <input type="text" class="form-control" id="title" name="title">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="released_at" class="form-label">Seleccionar categoria</label>
                                    <select class="custom-select" name="category_id" aria-label="Default select example">
                                        <option selected>Seleccionar categoria</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="released_at" class="form-label">Fecha de estreno</label>
                                    <input type="text" class="form-control" id="released_at" name="released_at" placeholder="YYYY-mm-dd">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="bought_at" class="form-label">Fecha de compra</label>
                                    <input type="text" class="form-control" id="bought_at" name="bought_at" placeholder="YYYY-mm-dd">
                                </div>
                            </div>    
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection