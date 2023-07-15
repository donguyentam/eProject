<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Inventory;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index ()
     {
         $orders = Order::paginate(6);
         $orderDetails = OrderDetail::all();
         // return view('admin.product.index')->with([
         //     'prods' => $prods
         // ]);
         return view('admin.order.index', compact('orders'));
     }
     public function indexUser ()
     {
        $user = Sentinel::getUser();
        if ($user != null) {
            $orders = Order::find($user->user_id)::paginate(6)->get();
            $orderDetails = OrderDetail::all();
        }

         // return view('admin.product.index')->with([
         //     'prods' => $prods
         // ]);
         return view('admin.order.index', compact('orders'));
     }
     public function updateOrders(Request $request, $id)
     {
         $orders = Order::find($id);
         $orderDetails = OrderDetails::all($orders -> id);

         $orders -> order_status = $request->order_status;
         $orders ->save();
         return redirect()->route('admin.order.index');
     }


     public function editOrders( $id)
     {
         $orders = Order::find($id);

         return view('admin.order.edit', compact('orders'));
     }

     public function deleteOrders( $id)
     {
         $orders = Order::find($id);
         if ($orders -> order_status != "Something") {

         } else {
            $orders ->delete();

         }
         return redirect()->route('admin.order.index');
     }

     public function searchOrders()
     {
         $search = $_GET['search'];

         $orders = Order::whereLike('first_name', $search)
         ->whereLike('last_name', $search)
         ->whereLike('address', $search)
         ->whereLike('phone_number', $search)
         ->whereLike('email', $search)
         ->whereLike('note', $search)
         ->whereLike('payment_method', $search)
         ->whereLike('payment_type', $search)
         ->get();
         return view('admin.order.index', compact('orders'));
     }
}
