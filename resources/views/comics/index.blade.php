@extends('layout.app')

@section('page_title', 'Lista fumetti')

@section('content')

    <h1>Ti trovi nella pagina INDEX: qui c'è una lista di tutti i fumetti presenti in tabella.</h1>

    <!-- aggiungo un link alla view 'create', al cui interno ci sarà un form da completare per la creazione di un nuovo fumetto -->
    <h2>>> <a href="{{route('comics.create')}}">Vai alla view 'CREATE' per creare un nuovo fumetto.</a> <<</h2>
    
    <!-- creo una tabella dove stampare i fumetti con un ciclo -->
    <table>

        <tr>
            <td>Titolo</td>
            <td>Prezzo</td>
            <td>Pubblicazione</td>
        </tr>

    <!-- ciclo i fumetti in ingresso, stampandone alcune proprietà -->
    @foreach ($comics as $comic)
        <tr>
            <td>{{$comic['title']}}</td>
            <td>{{$comic['price']}}</td>
            <td>{{$comic['sale_date']}}</td>
            <!--
                lego l'id del singolo fumetto ciclato all'uri della view 'show' usando la funzione 'route()'.
                in automatico, si crea un uri del tipo: 'comics/(id_fumetto_ciclato)'.
            -->
            <td><a href="{{route('comics.show', ['comic' => $comic->id])}}">Mostra singolo fumetto</a></td>
        </tr>
    @endforeach
    
    </table>

@endsection