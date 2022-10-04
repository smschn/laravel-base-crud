@extends('layout.app')

@section('page_title', 'Modifica di un fumetto')

@section('content')

    <h1>Ti trovi nella pagina EDIT: qui puoi modificare un fumetto pre-esistente.</h1>

    <!--
        creo un form per modificare i dati di un fumetto pre-esistente.
        il fumetto pre-esistente (cliccato sulla view <index>) viene passato come parametro a questa view tramite la funzione <edit()> del controller.
        action = url a cui inviare i dati; method = metodo di invio del form.
        i dati vanno inviati alla view 'comics.store'.
        nella route(), secondo parametro: il nome del parametro va recuperato dalla route:list: è il nome tra parentesi graffe.
    -->
    <form action="{{route('comics.update', ['comic' => $chosenComic->id])}}" method="POST">

        <!-- 
            per funzionare, il form necessita di questo <csrf>.
            per ragioni di sicurezza.
        -->
        @csrf

        <!--
            per funzionare, il from necessita di questo <method>.
            il protocollo HTTP accetta solo metodi GET e POST: quindi nel <form> si mantiene obbligatoriamente il <method> = POST.
            qui sotto si usa il metodo <PUT> o <PATCH> come riportato nella route:list affinché Laravel capisca che si tratti di un update dei dati.
            Laravel si occupa di tutto in autonomia.
        -->
        @method('PUT')

        <!--
            l'attributo 'name' dei tag input si riferisce al nome della colonna della tabella del database su cui vogliamo salvare questi dati ingresso.
            l'attributo 'for' dei tag label si lega all'attributo 'id' dei tag input.
            nella view <edit> si aggiunge all'<input> l'attributo <value> che pre-compila il campo input con i valori pre-esistenti del fumetto.
        -->
        <label for="title">Titolo:</label>
        <input type="text" id="title" name="title" value="{{$chosenComic->title}}" />
        <label for="description">Descrizione:</label>
        <input type="text" id="description" name="" value="{{$chosenComic->description}}" />
        <label for="url">Url cover:</label>
        <input type="text" id="url" name="thumb" value="{{$chosenComic->thumb}}" />
        <label for="price">Prezzo:</label>
        <input type="text" id="price" name="price" value="{{$chosenComic->price}}" />
        <label for="series">Serie:</label>
        <input type="text" id="series" name="series" value="{{$chosenComic->series}}" />
        <label for="date">Data pubblicazione:</label>
        <input type="text" id="date" name="sale_date" value="{{$chosenComic->sale_date}}" />
        <label for="type">Tipologia:</label>
        <input type="text" id="type" name="type" value="{{$chosenComic->type}}" />
        <button type="submit">Modifica il fumetto</button>

    </form>

    <!-- aggiungo un minimo di stile -->
    <style>
        input {
            display: block;
        }
        button {
            margin-top: 10px;
        }
    </style>

@endsection