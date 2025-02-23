<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantite',
        'coordonneesGPS',
        'dateSignalement',
        'statut',
        'users_id',
        'recycling-companies_id'
    ];  

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function appareils()
    {
        return $this->belongsToMany(Appareil::class);
    }
     

    
}
