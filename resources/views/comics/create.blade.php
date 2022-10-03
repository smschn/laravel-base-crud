@extends('layout.app')

@section('page_title', 'Creazione nuovo fumetto')

@section('content')

    <h1>Ti trovi nella pagina CREATE: qui puoi creare un nuovo fumetto.</h1>

    <!-- creo un form per inserire i dati del nuovo fumetto -->
    <form action="{{-- {{route(comics.store)}} --}}">
        <label for="">Title:</label>
        <input type="text" id="" name="" />
        <label for="">Description:</label>
        <input type="text" id="" name="" />
        <label for="">Thumb:</label>
        <input type="text" id="" name="" />
        <label for="">Price:</label>
        <input type="text" id="" name="" />
        <label for="">Series:</label>
        <input type="text" id="" name="" />
        <label for="">Sale date:</label>
        <input type="text" id="" name="" />
        <label for="">Type:</label>
        <input type="text" id="" name="" />
        <button type="submit">Crea il nuovo fumetto.</button>
    </form>

    <!-- aggiungo una regola di stile -->
    <style>
        input {
            display: block;
        }
        button {
            margin-top: 10px;
        }
    </style>




@endsection