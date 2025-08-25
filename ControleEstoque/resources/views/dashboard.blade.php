@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1>Bem-vindo, {{ Auth::user()->name }}!</h1>
            <p class="lead">Este é o painel de controle do seu sistema de estoque.</p>
        </div>
    </div>
</div>
<a href="{{ route('produtos.index') }}" class="btn btn-primary">Gerenciar Produtos</a>
@endsection