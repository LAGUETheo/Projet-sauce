<?php

namespace App\Http\Controllers;

use App\Models\Sauce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;


class SauceController extends Controller
{
    public function index()
    {
    $sauces = Sauce::all();
    return view('sauces.index', [
        'sauces' => $sauces,
        'currentRoute' => 'sauces.index'
    ]);
    }

    public function create()
    {
        return view('sauces.create', [
            'currentRoute' => 'sauces.create'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'manufacturer' => 'required',
            'description' => 'required',
            'mainPepper' => 'required',
            'imageUrl' => 'required',
            'heat' => 'required|integer|min:1|max:10'
        ]);

        Sauce::create($request->all());
        return redirect()->route('sauces.index');
    }

    public function show($id)
    {
        $sauce = Sauce::findOrFail($id);
        return view('sauces.show', compact('sauce'));
    }

    public function edit(Sauce $sauce)
    {
        return view('sauces.edit', compact('sauce'));
    }

    public function update(Request $request, Sauce $sauce)
    {
        $request->validate([
            'name' => 'required',
            'manufacturer' => 'required',
            'description' => 'required',
            'mainPepper' => 'required',
            'imageUrl' => 'required',
            'heat' => 'required|integer|min:1|max:10'
        ]);

        $sauce->update($request->all());
        return redirect()->route('sauces.index');
    }

    public function destroy($id)
    {
        $sauce = Sauce::findOrFail($id);
        $sauce->delete();
    
        return redirect()->route('sauces.index')->with('success', 'Sauce supprimée avec succès');
    }

    public function like(Sauce $sauce)
    {
        $userId = (string) Auth::id();

        // Si l'utilisateur avait déjà liké, on annule le like
        if (in_array($userId, $sauce->usersLiked ?? [])) {
            $sauce->usersLiked = array_diff($sauce->usersLiked, [$userId]);
            $sauce->likes = max(0, $sauce->likes - 1);
        } else {
            // Si l'utilisateur avait disliké, on retire le dislike et ajoute le like
            if (in_array($userId, $sauce->usersDisliked ?? [])) {
                $sauce->usersDisliked = array_diff($sauce->usersDisliked, [$userId]);
                $sauce->dislikes = max(0, $sauce->dislikes - 1);
            }

            // Ajouter le like
            $sauce->usersLiked = array_merge($sauce->usersLiked ?? [], [$userId]);
            $sauce->likes += 1;
        }

        // Sauvegarder les modifications
        $sauce->save();

        return back()->with('success', 'Action de like mise à jour');
    }

    public function dislike(Sauce $sauce)
    {
        $userId = (string) Auth::id();

        // Si l'utilisateur avait déjà disliké, on annule le dislike
        if (in_array($userId, $sauce->usersDisliked ?? [])) {
            $sauce->usersDisliked = array_diff($sauce->usersDisliked, [$userId]);
            $sauce->dislikes = max(0, $sauce->dislikes - 1);
        } else {
            // Si l'utilisateur avait liké, on retire le like et ajoute le dislike
            if (in_array($userId, $sauce->usersLiked ?? [])) {
                $sauce->usersLiked = array_diff($sauce->usersLiked, [$userId]);
                $sauce->likes = max(0, $sauce->likes - 1);
            }

            // Ajouter le dislike
            $sauce->usersDisliked = array_merge($sauce->usersDisliked ?? [], [$userId]);
            $sauce->dislikes += 1;
        }

        // Sauvegarder les modifications
        $sauce->save();

        return back()->with('success', 'Action de dislike mise à jour');
    }
}
