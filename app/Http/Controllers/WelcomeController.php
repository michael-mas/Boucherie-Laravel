<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class WelcomeController extends Controller
{
    public function index()
    {

        if(!Auth::id()){

        $recipes = Recipe::orderBy('created_at')->simplePaginate(60);
        return view('recipes.welcome')->with('recipes', $recipes);
        }

        else{

            $user=auth()->user();
            $count=cart::where('user_id',$user->id)->count();
            $recipes = Recipe::orderBy('created_at')->simplePaginate(60);
            return view('recipes.welcome', compact('count'))->with('recipes', $recipes);
            }
    }
}
