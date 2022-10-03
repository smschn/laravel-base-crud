<?php

namespace App\Http\Controllers;

use App\Comic; // importo il model per poter catturare i dati dalla tabella.

use Illuminate\Http\Request;

class ComicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // catturo tutti i dati dalla tabella, li invio alla view 'index'.
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // accetta in ingresso (nella variabile $request) i dati provenienti dall'input presente nella view create.
        // salvo in una variabile questi i dati in ingresso (cioè i dati sul fumetto da aggiungere).

        $comicData = $request->all(); // il metodo all serve per prendere tutti i dati presenti nella variabile.

        $newComic = new Comic(); // istanzio un nuovo oggetto di tipo Model.

        // alle proprietà del nuovo oggetto di classe Comic, assegno il valore contenuto in '$comicData', ottenuto dall'input nella view 'create'.
        // '$comicData' è un array associativo: accedo alle sue proprietà con la normale sintassi php.
        /*
        $newComic->title = $comicData['title'];
        $newComic->description = $comicData['description'];
        $newComic->thumb = $comicData['thumb'];
        $newComic->price = $comicData['price'];
        $newComic->series = $comicData['series'];
        $newComic->sale_date = $comicData['sale_date'];
        $newComic->type = $comicData['type'];
        */

        // fill() automatizza l'assegnazione delle righe soprastanti.
        // affinchè funzioni serve compilare '$fillable' nel model.
        $newComic->fill($comicData);

        // salvo l'oggetto appena creato nella tabella del database.
        $newComic->save();

        // 'store()' funziona con un parametro POST: accetta dati in ingresso, ma non ritorna un qualcosa.
        // per questo, nella return, serve fare un redirect alla route di 'create'.
        return redirect()->route('comics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // la funzione show() accetta come parametro in ingresso l'id del singolo fumetto.
        // l'id viene catturato nella view 'index' attraverso una 'route'.
        // l'id viene passato come parametro alla route 'comics.show'
        // usando il metodo statico find() cerco il fumetto selezionato tramite il suo 'id' nella tabella del database.
        // il metodo statico find() ritorna un singolo oggetto, NON una collection.
        $chosenComic = Comic::find($id);

        // se il fumetto esiste, ritorno la view 'comics.show' passando come parametro il fumetto trovato.
        if ($chosenComic) {
            return view('comics.show', compact('chosenComic'));
        }

        // se il fumetto NON esiste, ritorno una pagina con errore 404.
        else {
            abort(404); // abort accetta come parametro i codici errore: si possono usare tutti.
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
