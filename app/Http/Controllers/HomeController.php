<?php

namespace App\Http\Controllers;

use App\Models\Cart;

use App\Models\User;

use App\Models\Order;

use App\Models\Product;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use Session;

use Stripe;


class HomeController extends Controller
{
   public function redirect()
   {
       $usertype=Auth::user()->usertype;

       if($usertype=='1'){

            return view('admin.home');
       }

       else{
            $data = product::paginate(3);

            $user=auth()->user();

            $count=cart::where('user_id',$user->id)->count();

            return view('user.home',compact('data','count'));
       }
   }

   public function index(){

    if(Auth::id()){
        return redirect('redirect');
    }

    else{

        $data = product::paginate(3);

       return view('user.home',compact('data'));
   }
}

    public function product_details($id){

$product=product::find($id);

if(Auth::id()){
$user=auth()->user();

$count=cart::where('user_id',$user->id)->count();

        return view('user.product_details', compact('product', 'count'));
    }
else{
    $product=product::find($id);

    return view('user.product_details', compact('product'));

}
}

    public function add_cart(Request $request,$id){

       if(Auth::id()){

        $user=Auth::user();

        $product=product::find($id);

        $cart=new cart;

        $cart->name=$user->name;

        $cart->email=$user->email;

        $cart->phone=$user->phone;

        $cart->address=$user->address;

        $cart->user_id=$user->id;

        $cart->product_title=$product->title;

        if($product->discount_price!=null){

            $cart->price=$product->discount_price * $request->quantity;;

        }

        else{

            $cart->price=$product->price * $request->quantity;;
        }



        $cart->image=$product->image;

        $cart->product_id=$product->id;

        $cart->quantity=$request->quantity;

        $cart->save();

        return redirect()->back()->with('message', 'Produit ajouter au panier');


       }

       else{

        return redirect('login');
       }


    }

    public function showcart(){


        $user=auth()->user();

        $cart=cart::where('user_id',$user->id)->get();

        $count=cart::where('user_id',$user->id)->count();

        return view('user.showcart',compact('count', 'cart'));
    }

    public function deletecart($id){

        $cart=cart::find($id);

        $cart->delete();

        return redirect()->back()->with('message', 'Produit supprimer du panier');
    }

    public function confirmorder(Request $request){

        $user=Auth::user();

        $userid=$user->id;
        $data=cart::where('user_id','=',$userid)->get();


        foreach($data as $data)
{
    $order=new order;

    $order->name=$data->name;

    $order->phone=$data->phone;

    $order->address=$data->address;



    $order->product_name=$data->product_title;

    $order->price=$data->price;

    $order->quantity=$data->quantity;

    $order->status='non receptionné et payé';

    $order->save();


    $cart_id=$data->id;

    $cart=cart::find($cart_id);

    $cart->delete();
}

    return redirect()->back()->with('message', 'Commande envoyé!');

    }


    public function stripe($sum){

        $user=auth()->user();

        $cart=cart::where('user_id',$user->id)->get();

        $count=cart::where('user_id',$user->id)->count();

        return view('user.stripe', compact('sum','count'));
    }


    public function stripePost(Request $request, $sum)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => $sum * 100,
                "currency" => "eur",
                "source" => $request->stripeToken,
                "description" => "La boucherie du marché vous remercie pour votre paiement"
        ]);

        $user=Auth::user();

        $userid=$user->id;
        $data=cart::where('user_id','=',$userid)->get();


        foreach($data as $data)
{
    $order=new order;

    $order->name=$data->name;

    $order->phone=$data->phone;

    $order->address=$data->address;



    $order->product_name=$data->product_title;

    $order->price=$data->price;

    $order->quantity=$data->quantity;

    $order->status='non receptionné et payé';

    $order->save();


    $cart_id=$data->id;

    $cart=cart::find($cart_id);

    $cart->delete();
}

        Session::flash('success', 'Paiement bien effectué !');

        return back();
    }

}
