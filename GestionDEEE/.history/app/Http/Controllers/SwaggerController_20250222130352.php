<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SwaggerController extends Controller
{
   
        public function showSwagger()
    {
        // Définir l'URL de la documentation Swagger
        $urlToDocs = url('/api/docs');

        // Passer la variable à la vue Blade
        return view('vendor.l5-s.index', compact('urlToDocs'));
    }
}

