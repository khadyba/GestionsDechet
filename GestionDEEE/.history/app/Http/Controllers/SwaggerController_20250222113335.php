<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SwaggerController extends Controller
{
    public function showSwagger()
    {
        // Définir l'URL de la documentation
        $urlToDocs = 'https://example.com/swagger/docs'; // Remplace par l'URL correcte ou dynamique

        // Passer la variable à la vue
        return view('swagger.index', compact('urlToDocs'));
    }
}
