<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecyclingCompany extends Model
{
    use HasFactory;
    'nom'
    $table->string('contact');
    $table->string('adresse');
    $table->foreignId('collection-points_id')->constrained()->onDelete('cascade');
    $table->string('typeDechets');
}
