<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Party_Order;
class Party_OrderController extends Controller
{
    public function index()
{
    $adminuser=false;
    foreach(auth()->user()->roles as $r){
        if($r->id == 1){
            $adminuser=true;
            break;
        }
    }
    if($adminuser==true){


$Party_Orders = Party_Order::latest()->paginate(5);
return view('Party_Order.index',compact('Party_Orders'))
->with('i', (request()->input('page', 1) - 1) * 5);

}else{
    $userid=auth()->user()->id;

    $Party_Orders = Party_Order::where('User_ID' , '=' , $userid)->latest()->paginate(5);
    return view('Party_Order.index',compact('Party_Orders'))
    ->with('i', (request()->input('page', 1) - 1) * 5);

}

}

}
