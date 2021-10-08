@extends('layouts.app-client')

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
                            <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($movies as $movie) 
                            @if($movie->state === 1)
                            <tr>
                                <th scope="row">{{ $movie->id }}</th>
                                <td>{{ $movie->title }}</td>
                                <td>{{ $movie->available }}</td>
                                <td>{{ $movie->released_at }}</td>
                                <td>{{ $movie->bought_at }}</td>
                                <td>{{ $movie->updated_at }}</td>
                                <td><a href="{{ route('rent.movie', ['movie_id' => $movie->id, 'client_id' => 1]) }}">Alquilar</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection