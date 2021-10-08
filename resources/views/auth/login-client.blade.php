@extends('layouts.app-client')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Login de clientes') }}</div>

                <div class="card-body">
                <form class="form-signin" action="/client/login" method="POST">
                    @csrf
                    <h1 class="h3 mb-3 font-weight-normal">Inicio de sesión: clientes</h1>

                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>

                    <div class="checkbox mb-3">
                        <label>
                        <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
