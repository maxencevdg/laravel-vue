<?php

namespace App\Http\Controllers;

use App\Models\ApiKey;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ApiKeyController extends Controller
{
    use AuthorizesRequests;

    /**
     * Affiche la liste des clés API de l'utilisateur connecté.
     */
    public function index(Request $request)
    {
        $apiKeys = Auth::user()->apiKeys()->latest()->get();

        if ($request->wantsJson()) {
            return response()->json($apiKeys);
        }

        return inertia('ApiKeys/Index', [
            'apiKeys' => $apiKeys,
        ]);
    }

    /**
     * Affiche le formulaire de création (inutile en API, mais présent pour REST).
     */
    public function create()
    {
        //
    }

    /**
     * Crée une nouvelle clé API pour l'utilisateur connecté.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $apiKey = ApiKey::create([
            'uuid' => Str::uuid(),
            'user_id' => Auth::id(),
            'name' => $request->name,
            'key' => Str::random(40),
        ]);

        // Si la requête attend du JSON (API), retourne JSON
        if ($request->wantsJson()) {
            return response()->json($apiKey, 201);
        }

        // Sinon, redirige vers la page Inertia (SPA)
        return redirect()->route('api-keys.index')->with('success', 'Clé API créée !');
    }

    /**
     * Affiche une clé API spécifique (optionnel).
     */
    public function show(ApiKey $apiKey)
    {
        $this->authorize('view', $apiKey);
        return response()->json($apiKey);
    }

    /**
     * Affiche le formulaire d'édition (inutile en API).
     */
    public function edit(ApiKey $apiKey)
    {
        //
    }

    /**
     * Mise à jour d'une clé API (optionnel).
     */
    public function update(Request $request, ApiKey $apiKey)
    {
        //
    }

    /**
     * Supprime une clé API.
     */
    public function destroy(ApiKey $apiKey, Request $request)
    {
        $this->authorize('delete', $apiKey);
        $apiKey->delete();

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Clé supprimée']);
        }

        return redirect()->route('api-keys.index')->with('success', 'Clé API supprimée !');
    }
}