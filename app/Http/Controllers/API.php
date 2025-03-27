<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Sauce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SauceController extends Controller
{
    public function index()
    {
        $sauces = Sauce::all();
        return response()->json($sauces);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'manufacturer' => 'required|string|max:255',
            'description' => 'required|string',
            'mainPepper' => 'required|string|max:255',
            'imageUrl' => 'required|string|url',
            'heat' => 'required|integer|min:1|max:10'
        ]);

        // Ajouter l'ID de l'utilisateur connecté
        $validatedData['userId'] = Auth::id();

        $sauce = Sauce::create($validatedData);

        return response()->json($sauce, 201);
    }

    public function show($id)
    {
        $sauce = Sauce::findOrFail($id);
        return response()->json($sauce);
    }

    public function update(Request $request, $id)
    {
        $sauce = Sauce::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'manufacturer' => 'string|max:255',
            'description' => 'string',
            'mainPepper' => 'string|max:255',
            'imageUrl' => 'string|url',
            'heat' => 'integer|min:1|max:10'
        ]);

        $sauce->update($validatedData);

        return response()->json($sauce);
    }

    public function destroy($id)
    {
        $sauce = Sauce::findOrFail($id);
        $sauce->delete();

        return response()->json(null, 204);
    }
}