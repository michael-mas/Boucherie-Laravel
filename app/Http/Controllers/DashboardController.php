<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show user dashboard.
     *
     *
     */

    public function show()
    {
        $user=auth()->user();
        $recipes = Recipe::where('user_id', $user->id)->simplePaginate(20);
        $count=cart::where('user_id',$user->id)->count();


        return view('dashboard.dashboard', compact('count'), [
            'username' => $user->name,
            'profile_photo_path' => $user->profile_photo_path,
            'bio' => $user->bio,
            'created_at' => $user->created_at->format('m/d/Y'),
            'recipes' => $recipes
        ]);
    }

    /**
     * Update user record
     *
     *
     */

    public function update(Request $request)
    {
        $request->validate([
            'profile_photo_path' => ['mimes:png,jpg,jpeg', 'max:5048'],
            'name' => ['string', 'max:25'],
            'bio' => ['string', 'max:100']
        ]);

        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        // Saves image in storage and DB if entered
        if (!empty($request->file('profile_photo_path'))) {

            // Creates file name to be stored
            $name = Auth::user()->name;
            $fileMime = $request->file('profile_photo_path')->extension();
            $avatarStoreName = $name . "." . $fileMime;

            $request->file('profile_photo_path')->storeAs('public/avatars', $avatarStoreName);

            $user->profile_photo_path = $avatarStoreName;
        }

        $user->name = $request['name'];
        $user->bio = $request['bio'];
        $user->save();

        return Redirect::to('/dashboardUser');
    }
}
