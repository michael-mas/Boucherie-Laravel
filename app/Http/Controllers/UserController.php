<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
     /**
     * Show user profile.
     *
     *
     */

    public function show(Request $request)
    {
        $username = $request->name;
        $user = User::where('name', "=", $name)->first();

        if (Auth::id()) {
            return redirect('/dashboardUser');
        }

        $recipes = Recipe::where('user_id', $user->id)->paginate(20);

        return view('user', [
            'name' => $user->name,
            'avatar' => $user->avatar,
            'bio' => $user->bio,
            'created_at' => $user->created_at->format('m/d/Y'),
            'recipes' => $recipes
        ]);
    }
}
