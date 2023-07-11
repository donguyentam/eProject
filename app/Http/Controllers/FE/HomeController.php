<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use DB;
use Session;

class HomeController extends Controller
{
    public function index()
    {
        $products = DB::table('product_detail')->get();
        return view('fe.index', compact('products'));
    }


    public function productSearch()
    {
        $products = Product::all();
        return view('fe.product_search', compact('products'));
    }


    public function productDetails($id)
    {
        // hàm where() sẽ trả về 1 mảng
        $prod = Product::where('id', $id)->first();
        return view('fe.product', compact('prod'));
    }


    public function AddCart(Request $request, $id)
    {
        $product = DB::table('product_detail')->where('id', $id)->first();
        // $product = Product::where('id', $id)->first();
        if ($product != null) {
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new CartItem($oldCart);
            $newCart->AddCart($product, $id);

            $request->session()->put('Cart', $newCart);
            return view('fe.cart'); 

        } else {
            return view('fe.cart');

        }

        
    }

    
    


    public function clearCart(Request $request)
    {
        if ($request->session()->has('cart')) {
            $request->session()->forget('cart');
        }
    }


    public function viewCart(Request $request)
    {
        return view("fe.view_cart");
        // if ($request->session()->has('cart')) {
        //     dd($request->session()->get('cart'));
        // }
    }


    public function updateCart(Request $request)
    {
        $pids = $request->pids;
        $quantities = $request->quantities;
        $cart = $request->session()->get('cart');
        for ($i = 0; $i < count($pids); $i++) {
            $cart[$pids[$i]]->quantity = $quantities[$i];
        }
        // for ($i = 0; $i < count($pids); $i++) {
        //     foreach ($cart as $item) {
        //         if ($item->product->id == $pids[$i]) {
        //             $item->quantity = $quantities[$i];
        //             break;
        //         }
        //     }
        // }
        $request->session()->put('cart', $cart);
    }


    public function DeleteItemCart(Request $request, $id)
    {

        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new CartItem($oldCart);
        $newCart->DeleteItemCart($id);

        if (count($newCart->products) > 0) {
            $request->session()->put('Cart', $newCart);
        } else {
            $request->session()->forget('Cart');
        }


        return view('fe.cart');
    }


    public function DeleteListItemCart(Request $request, $id)
    {

        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new CartItem($oldCart);
        $newCart->DeleteItemCart($id);

        if (count($newCart->products) > 0) {
            $request->session()->put('Cart', $newCart);
        } else {
            $request->session()->forget('Cart');
        }


        return view('fe.cart');
    }


    public function checkout()
    {
        $user = \Sentinel::check();

        return view("fe.checkout", compact('user'));
    }

    public function SaveListItemCart(Request $request, $id, $quanty)
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new CartItem($oldCart);
        $newCart->UpdateItemCart($id, $quanty);

        $request->session()->put('Cart', $newCart);


        return view('fe.cart');
    }

    public function SaveAll(Request $request)
    {
        foreach ($request->data as $item) {
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new CartItem($oldCart);
            $newCart->UpdateItemCart($item["key"], $item["value"]);
            $request->session()->put('Cart', $newCart);
        }

    }

    // public function saveCart(Request $request)
    // {
    //     $uid = $request->uid;

    //     $cart = $request->session()->get('Cart');
    //     $detail = new OrderDetail();
    //     foreach (Session::get('Cart')->products as $product) {
    //          }
    //         foreach ($cart as $item) {

    //             $detail->product_id = $product['productInfo']->id;
    //                     $detail->price = $product['productInfo']->price;
    //                     $detail->quantity = $product['quanty'];
    //                     $detail->save();


    //             }






    //     //$details[] = $detail;

    //     $detail->save();
    //     //$details = [];
    //     $ord = new Order();
    //     $ord->user_id = $uid;
    //     $ord->order_date = date('Y-m-d', time());
    //     $ord->order_detail_id = $detail->id;
    //     $ord->save();
    //     //$ord->details->add($details);
    //     //$ord->save();   // lưu order
    //     $request->session()->forget('Cart'); // xóa session sau khi lưu
    //     return redirect()->route("home");
    // }
    public function saveCart(Request $request)
{
    $cart = $request->session()->get('Cart');

try {
    // foreach (Session::get('Cart')->products as $product) {}


    $uid = $request->uid;
    $total = $request ->total;
    $first_name = $request->first_name;
    $last_name = $request->last_name;
    $phone_number = $request->phone_number;
    $email = $request->email;
    $address = $request->address;
    $payment_method = $request->payment_method;
    $note = $request->note;

    
    $ord = new Order();
    $ord->user_id = $uid;
    $ord->total = $total;
    $ord->first_name = $first_name;
    $ord->last_name = $last_name;
    $ord->phone_number = $phone_number;
    $ord->email = $email;
    $ord->address = $address;
    $ord->payment_method = $payment_method;
    $ord->note = $note;
    $ord->order_date = date('Y-m-d', time());

    $ord->save(); // Save the order first to get the order ID

    foreach (Session::get('Cart')->products as $product) {


        $detail = new OrderDetail();
        $detail->product_id = $product['productInfo']->id;
        $detail->price = $product['productInfo']->price;
        $detail->quantity = $product['quanty'];
        $detail->order_id = $ord->id; // Assign the order ID to the order detail
        $detail->save();

     }

    $token = Str::random(64);
    $data['info'] = $request->all();
    $email = $request->customer_email;
    $data['total'] = Cart::total();
    $data['cart'] = Cart::content();
    Mail::send("admin.emails.checkout-email",['token'=>$token], function ($message) use ($request) {
        $message -> to($request->email);
        $message -> subject("Order Successful!");
    });
    $request->session()->forget('Cart');

    return redirect()->route("complete");}
    catch (Exception $e) {
        echo $e->getMessage();
    }
}

    public function blognews()
    {
        return view('fe.blog_news');
    }
}
