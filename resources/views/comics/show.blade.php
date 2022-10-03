@extends('layout.app')

@section('page_title', 'Singolo fumetto')

@section('content')

    <h1>Ti trovi nella pagina SHOW: qui viene visualizzato il singolo fumetto, grazie ad un URL\URI dinamico.</h1>

    <!-- creo una tabella per visualizzare i dati -->
    <table>

        <tr>
            <td>Titolo</td>
            <td>Prezzo</td>
            <td>Pubblicazione</td>
        </tr>

        <!--
            stampo i dati del fumetto selezionato.
            i dati sono passati a questa view tramite la funzione show() contenuta nel controller.
        -->
        <tr>
            <td>{{$chosenComic->title}}</td>
            <td>{{$chosenComic->price}}</td>
            <td>{{$chosenComic->sale_date}}</td>
        </tr>

    </table>
        
@endsection