<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    // assegnare alla proprietà\attributo $fillable un array contenente il nome delle colonne.
    // il nome delle colonne deve essere ordinato partendo dalla colonna di sinistra.
    // il nome riportato nell'array deve combaciare con il 'name' del campo 'input' nella view 'create'.
    protected $fillable = [
        'title',
        'description',
        'thumb',
        'price',
        'series',
        'sale_date',
        'type'
    ];
}