
@extends('layout.app')

@section('title','Listagem do Usuário')

@section('content')
    <h1> Listagem dos usuários <a href="{{route('users.create')}}"> (+)</a></h1>
    <ul>
        @foreach ($users as $user )

            <li>
                {{$user->name}} -
                {{$user->email}}
                | <a href="{{route('users.show',$user->id )}}">Detalhes</a>
            </li>
        
        @endforeach
    </ul>
@endsection