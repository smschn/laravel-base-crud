<?php

use Illuminate\Database\Seeder;

// importare il model 'comic' per poter comunicare con la tabella.
use App\Comic;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // recupero l'array con i fumetti dalla path '\config\comics.php'.
        $comics = config('comics');

        // ciclo l'array recuperato, creando un nuovo oggetto 'Comic' assegnandogli un valore (preso dall'array) ad ogni colonna della tabella.
        foreach($comics as $comic) {
            $newComic = new Comic();
            $newComic->title = $comic['title'];
            $newComic->description = $comic['description'];
            $newComic->thumb = $comic['thumb'];
            $newComic->price = $comic['price'];
            $newComic->series = $comic['series'];
            $newComic->sale_date = $comic['sale_date'];
            $newComic->type = $comic['type'];
            $newComic->save(); // salvare il nuovo oggetto fumetto: comparirà nel database solo dopo aver eseguito il seeder.
        }
    }
}