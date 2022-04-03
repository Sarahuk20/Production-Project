<?php

namespace App\Http\Controllers;
use App\Models\Party_Order;
use App\Models\Order_Items;
use App\Models\Transactions;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('cart', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }

/**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request)
    {
        //$cartItems = \Cart::getContent();
        $total = \Cart::getTotal();
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "GBP",
                        "value" => $total
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('cartList')
                ->with('error', 'Something went wrong.');

        } else {
            return redirect()
                ->route('cart.list')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            //to do insert data in database 
            $cartItems = \Cart::getContent();
            $total = \Cart::getTotal();
            //insert into order
            $userid=auth()->user()->id;
            $partyOrder= new Party_Order();
            $partyOrder->Order_Status_ID=3; //ordered
            $partyOrder->User_ID=$userid;
            $partyOrder->Pay=$total;
            $partyOrder->Total=$total;
            $partyOrder->save();

            $orderid=$partyOrder->id;

            foreach ($cartItems as $item){
                $itemdOrder= new Order_Items();
                $itemdOrder->Party_Order_ID=$orderid;
                $itemdOrder->Product_ID=$item->id;
                $itemdOrder->Quantity=$item->Quantity;
                $itemdOrder->save();
            }
$transaction =new Transactions();
$transaction->Party_Order_ID =$orderid;
$transaction->Payment_ID =$response['id'];
$transaction->Payment_Amount =$total;
$transaction->Payment_Status ="Ordered";

$payer=$response['payer'];
$transaction->Payer_Email =$payer['email_address'];
$payName=$payer['name'];
$transaction->First_Name =$payName['given_name'];
$transaction->Last_Name =$payName['surname'];
$unitPr= $response['purchase_units'][0];
//shipping
$shipping= $unitPr['shipping'];
$address= $shipping['address'];
$transaction->Address_Street = $address['address_line_1'];
$transaction->Address_City = $address['admin_area_2'];
//$transaction->Address_State = $address['state'];
$transaction->Address_Zip = $address['postal_code'];
$transaction->Address_Country = $address['country_code'];
$transaction->save();
            \Cart::clear();
            return redirect()
                ->route('cart.list')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('cart.list')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('cart.list')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }

}
