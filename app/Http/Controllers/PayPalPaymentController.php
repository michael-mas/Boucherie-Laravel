<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Models\Cart;
use Illuminate\Support\Arr;

class PayPalPaymentController extends Controller
{
    public function handlePayment()
    {
        $user=auth()->user();

        $count=cart::where('phone',$user->phone)->count();
        $countprice=cart::where('phone',$user->phone)->sum('price');
        $nameproduct=cart::where('phone',$user->phone)->pluck('product_title');
        $quant=cart::where('phone',$user->phone)->sum('quantity');
//dd($nameproduct->first());

        $product = [];


        $product['items'] = [
            [
                'name' => $nameproduct->first(),
                'price' => $countprice,
                'desc'  => "Produit de la boucherie du marché",
                'qty' => $quant
            ]

        ];

        $product['invoice_id'] = 1;
        $product['invoice_description'] = "Order #{$product['invoice_id']} $nameproduct";
        $product['return_url'] = route('success.payment');
        $product['cancel_url'] = route('cancel.payment');
        $product['total'] = $countprice;

        $paypalModule = new ExpressCheckout;

        $res = $paypalModule->setExpressCheckout($product);
        $res = $paypalModule->setExpressCheckout($product, true);

        return redirect($res['paypal_link']);
    }

    public function paymentCancel()
    {
        dd('Your payment has been declend. The payment cancelation page goes here!');
    }

    public function paymentSuccess(Request $request)
    {
        $paypalModule = new ExpressCheckout;
        $response = $paypalModule->getExpressCheckoutDetails($request->token);

        $user=auth()->user();

        $count=cart::where('phone',$user->phone)->count();

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            return view('checkout.succes',compact('count'));
        }

        dd('Error occured!');
    }
}
