@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Categorias') }}</div>

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
                            <th scope="col">Categoria</th>
                            <th scope="col">Ultima actualización</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category) 
                            <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td>{{ $category->category }}</td>
                                <td>{{ $category->updated_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear categoria') }}</div>
                    <div class="card-body">
                        <form action="/category" method="POST">
                            {!! csrf_field() !!}
                            <div class="mb-3">
                                <label for="category" class="form-label">Nueva categoria</label>
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