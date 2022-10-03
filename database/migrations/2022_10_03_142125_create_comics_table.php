<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comics', function (Blueprint $table) {
            $table->id(); // creazione automatica id autoincrementale

            // creazione tabella controllando in '\config\comics.php' quali colonne servono
            $table->string('title', 50);
            $table->text('description')->nullable();
            $table->string('thumb', 255);
            $table->decimal('price', 8, 2);
            $table->string('series', 100);
            $table->date('sale_date');	
            $table->string('type', 30);

            $table->timestamps(); // creazione automatica di due colonne aggiuntive ('created_at', 'updated_at')
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comics');
    }
}