@extends('layout.app')

@section('page_title', 'Creazione nuovo fumetto')

@section('content')

    <h1>Ti trovi nella pagina CREATE: qui puoi creare un nuovo fumetto.</h1>

    <!--
        creo un form per inserire i dati del nuovo fumetto.
        action = url a cui inviare i dati; method = metodo di invio del form.
        i dati vanno inviati alla view 'comics.store'.
    -->
    <form action="{{route('comics.store')}}" method="POST">

        {{-- per funzionare, il from necessita di questo @csrf --}}
        @csrf

        <!--
            l'attributo 'name' dei tag input si riferisce al nome della colonna della tabella del database su cui vogliamo salvare questi dati ingresso.
            l'attributo 'for' dei tag label si lega all'attributo 'id' dei tag input.
        -->
        <label for="title">Titolo:</label>
        <input type="text" id="title" name="title" />
        <label for="description">Descrizione:</label>
        <input type="text" id="description" name="" />
        <label for="url">Url cover:</label>
        <input type="text" id="url" name="thumb" />
        <label for="price">Prezzo:</label>
        <input type="text" id="price" name="price" />
        <label for="series">Serie:</label>
        <input type="text" id="series" name="series" />
        <label for="date">Data pubblicazione:</label>
        <input type="text" id="date" name="sale_date" />
        <label for="type">Tipologia:</label>
        <input type="text" id="type" name="type" />
        <button type="submit">Crea il nuovo fumetto</button>

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