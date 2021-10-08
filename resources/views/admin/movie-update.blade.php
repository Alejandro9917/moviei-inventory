@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Editar película') }}</div>
                    <div class="card-body">
                        <form action="{{ route('movie.update', ['id' => $movie->id]) }}" method="PUT">
                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="title" class="form-label">Nueva película</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $movie->title }}">
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
                                    <input type="text" class="form-control" id="released_at" name="released_at" value="{{ $movie->released_at }}" placeholder="YYYY-mm-dd">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="bought_at" class="form-label">Fecha de compra</label>
                                    <input type="text" class="form-control" id="bought_at" name="bought_at" value="{{ $movie->bought_at }}" placeholder="YYYY-mm-dd">
                                </div>
                                <div class="mb-3 col-md-6 form-check">
                                    <label for="available" class="form-label">Estado</label>
                                    <input type="text" class="form-control" id="available" 
                                    @if($movie->available === 1) value="Disponible" @else value="No disponible" @endif
                                    name="available" id="available" readonly>
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