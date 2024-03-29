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
     public function update(Request $request, Order $order)
     {
        $order->order_status = $request->order_status;
         $order ->save();
         return redirect()->route('admin.order.index');
     }


     public function editOrders( $id)
     {
         $orders = Order::find($id);

         return view('admin.order.edit', compact('orders'));
     }
     public function viewOrderInfoAd(Request $request, $id)
     {
        $orderId = Order::find($id);

        $order=Order::where('id', $id)->get();
        $orderd=OrderDetail::where('order_id',$id)->get();
         return view('admin.order.detail', compact('order', 'orderd', 'orderId'));
     }
     public function viewOrderInfo(Request $request, $id)
     {
        $orderId = Order::find($id);

        $order=Order::where('id', $id)->get();
        $orderd=OrderDetail::where('order_id',$id)->get();
         return view('fe.userOrder.detail', compact('order', 'orderd', 'orderId'));
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
         if($search==null){
            return redirect()->route('admin.order.index');
         }else{
             $searchTerm = '%' . $search . '%';

$orders = Order::where(function ($query) use ($searchTerm) {
    $query->where('first_name', 'LIKE', $searchTerm)
          ->orWhere('last_name', 'LIKE', $searchTerm)
          ->orWhere('address', 'LIKE', $searchTerm)
          ->orWhere('phone_number', 'LIKE', $searchTerm)
          ->orWhere('email', 'LIKE', $searchTerm)
          ->orWhere('note', 'LIKE', $searchTerm)
          ->orWhere('payment_method', 'LIKE', $searchTerm)
          ->orWhere('payment_type', 'LIKE', $searchTerm)
          ->orWhere('order_status', 'LIKE', $searchTerm);
})->paginate(6);
         return view('admin.order.index', compact('orders'));
         }

     }
}
