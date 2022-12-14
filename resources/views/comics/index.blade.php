@extends('layout.app')

@section('page_title', 'Lista fumetti')

@section('content')

    <h1>Ti trovi nella pagina INDEX: qui c'è una lista di tutti i fumetti presenti in tabella.</h1>

    <!-- aggiungo un link alla view 'create', al cui interno ci sarà un form da completare per la creazione di un nuovo fumetto -->
    <h2>>> <a href="{{route('comics.create')}}">Vai alla view 'CREATE' per creare un nuovo fumetto.</a> <<</h2>
    
    <!--
        aggiungo (per l'utente) un messaggio della corretta cancellazione del fumetto.
        funziona in sincronia con la funzione ->with() nella destroy() del resources controller:
        'status' è una variabile che si lega al messaggio della ->with() e lo stampa a schermo attraverso session('status').
    -->
    @if (session('status'))
        <p>
            {{session('status')}}
        </p>
    @endif

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
            <td><a href="{{route('comics.edit', ['comic' => $comic->id])}}">Modifica singolo fumetto</a></td>
            <td>
                <!--
                    inserisco un <form> per eliminare il fumetto.
                    NON posso usare il tag <a> (come sopra) perché esso funziona solo con il metodo GET,
                    ma dovendo inviare al server l'id del fumetto da cancellare serve il metodo POST: quindi si usa un <form>.
                    action = per eliminare un fumetto si inviano i dati alla route <comics.destroy> che esegue la funzione <destroy()> nel resources controller.
                    route() accetta due parametri: il nome della route, l'id del fumetto.
                -->
                <form action="{{route('comics.destroy', ['comic' => $comic->id])}}" method="POST">

                    <!-- per funzionare, il <form> necessita di <csrf> -->
                    @csrf

                    <!-- per funzionare, il <form> necessita di specificare il metodo <delete> -->
                    @method('DELETE')

                    <!--
                        inserire un bottone da cliccare affinché parta l'invio in POST\DELETE.
                        BONUS tramite l'attributo 'onclick':
                        al click sul bottone, appare un messaggio che chiede conferma di eliminare il fumetto.
                        Se clicco OK, ho come valore di return un booleano 'true' che avvia il click:
                        quindi tramite POST viene inviato l'id del fumetto e viene avviata la funzione destroy() nel resources controller.
                        Se clicco CANCELLA, ho come valore di return un booleano 'false' che NON esegue il click:
                        quindi non parte la funzione destroy() nel resources controller e il fumetto NON viene cancellato.
                    -->
                    <button type="submit" onclick="return confirm('Sei sicuro di voler cancellare il fumetto?');">Elimina fumetto</button>
                </form>
            </td>
        </tr>
    @endforeach
    
    </table>

    <style>
        p {
            display: inline-block;
            color: #fff;
            background-color: lightseagreen;
            padding: 10px;
        }
    </style>

@endsection