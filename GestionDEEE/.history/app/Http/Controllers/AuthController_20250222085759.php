<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
     // Inscription
     public function register(Request $request)
     {
         $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|string|email|max:255|unique:users',
             'password' => 'required|string|min:6',
         ]);
 
         $user = User::create([
             'name' => $request->name,
             'email' => $request->email,
             'password' => Hash::make($request->password),
         ]);
 
         $token = JWTAuth::fromUser($user);
 
         return response()->json(['token' => $token]);
     }
 
       // Connexion
     public function login(Request $request)
     {
         $credentials = $request->only('email', 'password');
 
         if (!$token = JWTAuth::attempt($credentials)) {
             return response()->json(['error' => 'Unauthorized'], 401);
         }
 
         return response()->json(['token' => $token]);
     }
 
     // Déconnexion
     public function logout()
     {
         JWTAuth::invalidate(JWTAuth::getToken());
         return response()->json(['message' => 'Déconnecté avec succès']);
     }
 
     // Obtenir les infos de l'utilisateur authentifié
     public function me()
     {
         return response()->json(JWTAuth::user());
     }
}
