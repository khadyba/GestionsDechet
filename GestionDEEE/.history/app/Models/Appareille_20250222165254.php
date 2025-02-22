<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appareille extends Model
{
    use HasFactory;
       
    protected $fillable = [
        'libelle',
        'description',
        'etat',
       
    ];

    public function reports()
    {
        return $this->belongsToMany(Report::class);
    }



}
