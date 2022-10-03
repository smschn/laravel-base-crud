@extends('layout.app')

@section('page_title', 'Lista fumetti')

@section('content')

    <h1>Ti trovi nella pagina index: qui c'è una lista di tutti i fumetti presenti in tabella.</h1>
    @foreach ($comics as $comic)
        <ol>
            <li>{{$comic['title']}}</li>
            <li>{{$comic['description']}}</li>
            <li>{{$comic['thumb']}}</li>
        </ol>
    @endforeach
@endsection