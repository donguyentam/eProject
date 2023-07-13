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
         $orders = Order::all();
         $orderDetails = OrderDetail::all();
         // return view('admin.product.index')->with([
         //     'prods' => $prods
         // ]);
         return view('admin.order.index', compact('orders'));
     }
     public function updateOrders(Request $request, $id)
     {
         $orders = Order::find($id);
         $orderDetails = OrderDetails::all($orders -> id);

         $orders -> order_success = $request->order_success;
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
         $orders ->delete();
         return redirect()->route('admin.order.index');
     }

     public function searchOrders()
     {
         $search = $_GET['search'];
         $orders = OrderDetail::where('%' . $search . '%' ,' IN ','(first_name, last_name, address, phone_number, email, note, payment_method, payment_type)',)->get();
         return view('admin.order.index', compact('orders'));
     }
}
