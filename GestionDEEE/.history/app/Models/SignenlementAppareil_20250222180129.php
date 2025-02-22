<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignenlementAppareil extends Model
{
    use HasFactory;

    protected $fillable = [
        'appareilles_id',
        'reports_id',
    ]; 
}
