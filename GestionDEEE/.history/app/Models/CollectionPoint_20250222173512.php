<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionPoint extends Model
{
    use HasFactory;
    protected 4
    $table->id();
    $table->string('nom');
    $table->string('adresse');
    $table->string('coordonneesGPS');
    $table->boolean('entrepriseAgree')->default(false);
    $tabl
}
