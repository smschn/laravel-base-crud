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

        <!-- per funzionare, il form necessita di questo <csrf> -->
        @csrf

        <!--
            l'attributo 'name' dei tag input si riferisce al nome della colonna della tabella del database su cui vogliamo salvare questi dati ingresso.
            l'attributo 'for' dei tag label si lega all'attributo 'id' dei tag input.
            validazione dati: aggiungo agli <input> un campo <value> con la funzione old():
            se fallisce la validazione, si viene riportati alla view create con i campi <input> pre-compilati con i valori (errati) immessi all'invio precedente.
            la funzione old() pre-compila il campo con il vecchio valore inserito in quel campo stesso (tramite il suo parametro).
        -->
        <label for="title">Titolo:</label>
        <input class="@error('title') color_red @enderror" type="text" id="title" name="title" value='{{old('title')}}' />
        @error('title')
            <p>
                {{$message}}
            </p>
        @enderror

        <label for="description">Descrizione:</label>
        <input class="@error('description') color_red @enderror" type="text" id="description" name="description" value='{{old('description')}}' />
        @error('description')
            <p>
                {{$message}}
            </p>
        @enderror

        <label for="url">Url cover:</label>
        <input class="@error('thumb') color_red @enderror" type="text" id="url" name="thumb" value='{{old('thumb')}}' />
        @error('thumb')
            <p>
                {{$message}}
            </p>
        @enderror

        <label for="price">Prezzo:</label>
        <input class="@error('price') color_red @enderror" type="text" id="price" name="price" value='{{old('price')}}' />
        @error('price')
            <p>
                {{$message}}
            </p>
        @enderror

        <label for="series">Serie:</label>
        <input class="@error('series') color_red @enderror" type="text" id="series" name="series" value='{{old('series')}}' />
        @error('series')
            <p>
                {{$message}}
            </p>
        @enderror

        <label for="date">Data pubblicazione:</label>
        <input class="@error('sale_date') color_red @enderror" type="text" id="date" name="sale_date" value='{{old('sale_date')}}' />
        @error('sale_date')
            <p>
                {{$message}}
            </p>
        @enderror

        <label for="type">Tipologia:</label>
        <input class="@error('type') color_red @enderror" type="text" id="type" name="type" value='{{old('type')}}' />
        @error('type')
            <p>
                {{$message}}
            </p>
        @enderror

        <button type="submit">Crea il nuovo fumetto</button>

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