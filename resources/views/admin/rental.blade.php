@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Alquileres') }}</div>

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
                            <th scope="col">Cliente</th>
                            <th scope="col">Película</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Rentada:</th>
                            <th scope="col">Retorno:</th>
                            <th scope="col">Devuelta:</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rentals as $rental) 
                            <tr>
                                <th scope="row">{{ $rental->id }}</th>
                                <td>{{ $rental->client->name }}</td>
                                <td>{{ $rental->movie->title }}</td>
                                <th>{{ $rental->state }}</th>
                                <th>{{ $rental->rented_at }}</th>
                                <th>{{ $rental->returned_at }}</th>
                                <th>{{ $rental->updated_at }}</th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection