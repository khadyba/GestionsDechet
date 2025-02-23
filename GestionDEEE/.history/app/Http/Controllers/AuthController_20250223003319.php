<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="API de gestion des déchets électroniques",
 *      description="Documentation de l'API avec Swagger",
 *      @OA\Contact(
 *          email="support@example.com"
 *      )
 * )
 */
class AuthController extends Controller
{
     /**
     * @OA\Post(
     *     path="/api/register",
     *     summary="Inscription d'un nouvel utilisateur",
     *     tags={"Authentification"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name","email","password"},
     *             @OA\Property(property="name", type="string", example="Khady"),
     *             @OA\Property(property="email", type="string", format="email", example="khady@example.com"),
     *             @OA\Property(property="password", type="string", format="password", example="motdepasse")
     *         ),
     *     ),
     *     @OA\Response(response=201, description="Utilisateur créé avec succès"),
     *     @OA\Response(response=400, description="Erreur de validation"),
     * )
     */
     // Inscription
     public function register(Request $request)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'télephone' => 'required',
        'password' => 'required|string|min:6',
        'role' => 'required'
    ]);
     
    $user =  User::create([
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'email' => $request->email,
        'télephone' => $request->télephone,
        'password' => Hash::make($request->password),
        'role' => $request->role
    ]);
    dd($user);

    return response()->json(['message' => 'Compte créé avec succès.'], 201);

}
         /**
     * @OA\Post(
     *     path="/api/login",
     *     summary="Connexion utilisateur",
     *     tags={"Authentification"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email","password"},
     *             @OA\Property(property="email", type="string", format="email", example="khady@example.com"),
     *             @OA\Property(property="password", type="string", format="password", example="motdepasse")
     *         ),
     *     ),
     *     @OA\Response(response=200, description="Connexion réussie"),
     *     @OA\Response(response=401, description="Identifiants invalides"),
     * )
     */
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
