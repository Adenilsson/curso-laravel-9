@extends('layout.app')

@section('title','Novo Usuário')
    

@section('content')
    <h1>Novo Usuário</h1>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error )
                <li class="error">
                    {{$error}}
                </li>
            @endforeach
        </ul>
    @endif 


    <form action="{{ route('users.store')}}" method="post">
        <div class="form-group">
        @csrf
        <input type="text" class="form-control" name="name"  placeholder="Nome:" value="{{ old('name')}}">
        <input type="email" class="form-control" name="email"  placeholder="E-mail:" value="{{ old('email')}}">
        <input type="password" class="form-control" name="password"  placeholder="Senha:">
        <button type="submit">Cadastrar</button>

        </div>

    </form>
    
@endsection