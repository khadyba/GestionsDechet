<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecyclingCompany extends Model
{
    use HasFactory;
    
    'nom',
    'contact',
    'adresse',
   'collection-points_id',
    'typeDechets'
}
