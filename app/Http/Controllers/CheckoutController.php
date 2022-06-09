<?php

namespace App\Http\Controllers;

use App\Models\Cart;

use Stripe\StripeClient;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    public function index(){

        $user=auth()->user();



        $count=cart::where('user_id',$user->id)->count();

        $countprice=cart::where('user_id',$user->id)->sum('price');

       // dd($countprice);


    return view('user.showcart',compact('count'));

    }
}
