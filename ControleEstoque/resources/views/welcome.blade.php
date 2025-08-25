@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4">Bem-vindo ao Sistema de Controle de Estoque</h1>
            
            <hr class="my-4">
            <p>Faça login para começar a gerenciar seu estoque ou cadastre-se para criar sua conta.</p>
            
            <div class="mt-4">
                @guest
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-2">Entrar</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg me-2">Cadastrar</a>
                @else
                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg">Ir para a Página de Cadastro</a>
                @endguest
            </div>
        </div>
    </div>
</div>
@endsection