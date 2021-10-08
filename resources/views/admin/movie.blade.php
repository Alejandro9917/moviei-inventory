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
                        <form action="/category" method="POST">
                            {!! csrf_field() !!}
                            <div class="mb-3 col-md-4">
                                <label for="category" class="form-label">Nueva película</label>
                                <input type="text" class="form-control" id="category" name="category">
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