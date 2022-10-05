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
        <input class="@error('title') color_red @enderror" type="text" id="title" name="title" value="{{old('title', $chosenComic->title)}}" />
        @error('title')
            <p>
                {{$message}}
            </p>
        @enderror

        <label for="description">Descrizione:</label>
        <input class="@error('description') color_red @enderror" type="text" id="description" name="" value="{{old('description', $chosenComic->description)}}" />
        @error('description')
            <p>
                {{$message}}
            </p>
        @enderror

        <label for="url">Url cover:</label>
        <input class="@error('thumb') color_red @enderror" type="text" id="url" name="thumb" value="{{old('thumb', $chosenComic->thumb)}}" />
        @error('thumb')
            <p>
                {{$message}}
            </p>
        @enderror

        <label for="price">Prezzo:</label>
        <input class="@error('price') color_red @enderror" type="text" id="price" name="price" value="{{old('price', $chosenComic->price)}}" />
        @error('price')
            <p>
                {{$message}}
            </p>
        @enderror

        <label for="series">Serie:</label>
        <input class="@error('series') color_red @enderror" type="text" id="series" name="series" value="{{old('series', $chosenComic->series)}}" />
        @error('series')
            <p>
                {{$message}}
            </p>
        @enderror

        <label for="date">Data pubblicazione:</label>
        <input class="@error('sale_date') color_red @enderror" type="text" id="date" name="sale_date" value="{{old('sale_date', $chosenComic->sale_date)}}" />
        @error('sale_date')
            <p>
                {{$message}}
            </p>
        @enderror

        <label for="type">Tipologia:</label>
        <input class="@error('type') color_red @enderror" type="text" id="type" name="type" value="{{old('type', $chosenComic->type)}}" />
        @error('type')
            <p>
                {{$message}}
            </p>
        @enderror

        <button type="submit">Modifica il fumetto</button>

    </form>

    <!-- aggiungo un minimo di stile -->
    <style>
        input {
            display: block;
        }

        .color_red {
            border: 1px solid red;
            color: red;
        }

        p {
            color: red;
        }
        button {
            margin-top: 10px;
        }
    </style>

@endsection