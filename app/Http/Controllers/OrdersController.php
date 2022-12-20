<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    
    public function purchase(Request $request)
    {
        $order = new Orders();
        $order->book_id = $request->book;
        $order->orderType = $request->orderType;
        $order->user_id = $request->user()->id;
        $order->save();

        return response()->json(["success" => true, "order" => $order]);
    }
}
