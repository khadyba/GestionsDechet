<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appareille extends Model
{
    use HasFactory;
       
    protected $fillable = [
        'name',
        'prenom',
        'email',
        'télephone',
        'password',
        'role',
    ];

    public function reports()
    {
        return $this->belongsToMany(Report::class);
    }



}
