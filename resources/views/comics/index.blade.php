@extends('layout.app')

@section('page_title', 'Lista fumetti')

@section('content')

    <h1>Ti trovi nella pagina index: qui c'è una lista di tutti i fumetti presenti in tabella.</h1>

    <h2>Vai alla view CREATE (cliccami)</h2>
    
    <!-- creo una tabella dove stampare i fumetti con un ciclo -->
    <table>

        <tr>
            <td>Titolo</td>
            <td>Prezzo</td>
            <td>Pubblicazione</td>
        </tr>

    <!-- ciclo i fumetti in ingresso -->
    @foreach ($comics as $comic)
        <tr>
            <td>{{$comic['title']}}</td>
            <td>{{$comic['price']}}</td>
            <td>{{$comic['sale_date']}}</td>
        </tr>
    @endforeach
    
    </table>

@endsection