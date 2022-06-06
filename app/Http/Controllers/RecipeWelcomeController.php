<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Doublon à supprimer
class RecipeWelcomeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::orderBy('created_at')->simplePaginate(60);
        return view('recipes.welcome')->with('recipes', $recipes);
    }
}
