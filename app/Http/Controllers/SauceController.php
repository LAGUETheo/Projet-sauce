<?php

namespace App\Http\Controllers;

use App\Models\Sauce;
use Illuminate\Http\Request;

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
}
