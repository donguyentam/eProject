<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use DB;
use Session;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $products = DB::table('product_detail')->get();
        $prodsd=Product:: orderBy('id', 'DESC')->take(4)->get();
        return view('fe.index', compact('products','prodsd'));
    }


    public function bedroom()
    {
        $products = Product::where('product_category_id','4')->take(8)->get();
        return view('fe.news.bedroom', compact('products'));
    }
    public function viewOrderHistory()
    { 
        

        if(!\Sentinel::check()){
            return redirect()->route('login');
        }else{
            $user = \Sentinel::getUser();
        $users=$user->id;
           $order = Order::where('user_id',$users)->get();
        return view('fe.orderhistory', compact('order'));
        }
    }


    public function workroom()
    {
        $products = Product::where('product_category_id','1')->take(8)->get();
        return view('fe.news.workroom', compact('products'));
    }


    public function diningroom()
    {
        $products = Product::where('product_category_id','2')->take(8)->get();
        return view('fe.news.diningroom', compact('products'));
    }

    public function productSearch(Request $request){

        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');

        if ($minPrice != null && $maxPrice != null) {
        $categories = Category::all();
        // if())
        $products = Product::whereBetween('price', [$minPrice, $maxPrice])->paginate(6);
        return view('fe.product_search', compact('products','categories'));

        }else{
             $categories = Category::all();
        $products = Product::orderBy('id', 'desc')->paginate(6);
        return view('fe.product_search', compact('products','categories'));
        }


    }

    // public function productSearch()
    // {

    //     $products = Product::all();
    //     return view('fe.product_search', compact('products','categories'));
    // }


    public function productDetails($id)
    {
        // hàm where() sẽ trả về 1 mảng
        $prod = Product::where('id', $id)->first();
        $prodsd=Product:: orderBy('id', 'DESC')->take(4)->get();
        return view('fe.product', compact('prod','prodsd'));
    }

    public function category($id){
        $categories = Category::all();
        $products = Product::where('product_category_id', $id)->orderBy('price', 'asc')->paginate(6);
        return view('fe.product_search', compact('products','categories'));
    }

    // public function AddCart(Request $request, $id)
    // {
    //     $product = Product::where('id', $id)->first();
    //     // $product = Product::where('id', $id)->first();
    //     if ($product != null) {
    //         $oldCart = Session('Cart') ? Session('Cart') : null;
    //         $newCart = new CartItem($oldCart);
    //         $newCart->AddCart($product, $id);

    //         $request->session()->put('Cart', $newCart);
    //         return view('fe.cart');

    //     } else {
    //         return view('fe.cart');

    //     }


    // }

    public function addCart(Request $request)
{
    try {
        $pid = $request->pid;
        $quantity = $request->quantity;
        $prod = Product::find($pid);    // find product by id

        // check session for existing cart
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');

            // check if the item already exists in the cart
            if (isset($cart[$pid])) {
                $existingItem = $cart[$pid];
                $existingQuantity = $existingItem->getQuantity();

                // update the quantity of the existing item
                $existingItem->setQuantity($existingQuantity + $quantity);
            } else {
                // create a new CartItem with the provided quantity
                $item = new CartItem($prod, $quantity);
                $cart[$pid] = $item;
            }
        } else {
            // create a new cart and add the item to it
            $cart = [
                $pid => new CartItem($prod, $quantity)
            ];
        }

        // store the updated cart in the session
        $request->session()->put('cart', $cart);

        return 1;
    } catch (\Exception $e) {
        return 0;   // you may consider returning an appropriate HTTP status code, e.g., 404
    }
}

    // public function clearCart(Request $request)
    // {
    //     if ($request->session()->has('cart')) {
    //         $request->session()->forget('cart');
    //     }
    // }



    public function viewCart(Request $request)
    {
        return view("fe.view_cart");
        // if ($request->session()->has('cart')) {
        //     dd($request->session()->get('cart'));
        // }
    }

    public function removeCartItem(Request $request)
    {
        $pid = $request->pid;
        $cart = $request->session()->get('cart');
        unset($cart[$pid]);
        $request->session()->put('cart', $cart);
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


    // public function DeleteItemCart(Request $request, $id)
    // {

    //     $oldCart = Session('Cart') ? Session('Cart') : null;
    //     $newCart = new CartItem($oldCart);
    //     $newCart->DeleteItemCart($id);

    //     if (count($newCart->products) > 0) {
    //         $request->session()->put('Cart', $newCart);
    //     } else {
    //         $request->session()->forget('Cart');
    //     }


    //     return view('fe.cart');
    // }

    public function userprofile($id)
    {
        $user = User::find($id);
        return view('fe.userprofile',compact('user'));
    }

    public function updateuserprofile(Request $request, $id)
    {

        $ids = $request->all();

        $user = User::find($id);

        $user -> username = $request->username;
        $user -> first_name = $request->fname;

        $user -> last_name = $request->lname;

        $user -> address = $request->address;

        $user -> phone_number = $request->phone_number;

        $user -> country = $request->country;

        $user -> save();

        return redirect()->route('home');
        // for ($i = 0; $i < count($pids); $i++) {
        //     foreach ($cart as $item) {
        //         if ($item->product->id == $pids[$i]) {
        //             $item->quantity = $quantities[$i];
        //             break;
        //         }
        //     }
        // }

    }


    public function deleteorders($id)
{
    $order = Order::find($id);

    if ($order && $order->order_status !== "Delivering") {
        $order->delete();
    }else {
        $err ="You cannot delete an order after it has been processed";
        return redirect()->route('viewOrderHistory')->withErrors($err);
    }

    return redirect()->route('viewOrderHistory');
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
        if(!\Sentinel::check()){
            return redirect()->route('login');
        }else{
            $user = \Sentinel::check();

        return view("fe.checkout", compact('user'));
        }

    }

    // public function SaveListItemCart(Request $request, $id, $quanty)
    // {
    //     $oldCart = Session('Cart') ? Session('Cart') : null;
    //     $newCart = new CartItem($oldCart);
    //     $newCart->UpdateItemCart($id, $quanty);

    //     $request->session()->put('Cart', $newCart);


    //     return view('fe.cart');
    // }

    // public function SaveAll(Request $request)
    // {
    //     foreach ($request->data as $item) {
    //         $oldCart = Session('Cart') ? Session('Cart') : null;
    //         $newCart = new CartItem($oldCart);
    //         $newCart->UpdateItemCart($item["key"], $item["value"]);
    //         $request->session()->put('Cart', $newCart);
    //     }

    // }

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

try {
    // foreach (Session::get('Cart')->products as $product) {}

    $cart = $request->session()->get('cart');

    $uid = $request->uid;
    $total = $request ->total;
    $first_name = $request->first_name;
    $last_name = $request->last_name;
    $phone_number = $request->phone_number;
    $email = $request->email;
    $address = $request->address;
    $payment_method = $request->payment_method;
    $note = $request->note;
    $total = 0;

    $ord = new Order();
    $ord->user_id = $uid;
    $ord->total = $total;
    $ord->first_name = $first_name;
    $ord->last_name = $last_name;
    $ord->phone_number = $phone_number;
    $ord->email = $email;
    $ord->address = $address;
    $ord->payment_method = $payment_method;
    $ord->order_status = "Processing";
    $ord->note = $note;
    $ord->order_date = date('Y-m-d', time());

    $ord->save(); // Save the order first to get the order ID

    foreach (Session::get('cart') as $item) {


        $detail = new OrderDetail();
        $detail->product_id =$item-> product->id;
        $detail->price = $item-> product->price;
        $detail->quantity =$item->quantity;
        $total += intval($detail->price) * intval($detail->quantity);
        $detail->order_id = $ord->id; // Assign the order ID to the order detail
        $detail->save();
        $product = Product::find($detail->product_id);
        $product -> quantity -= $detail->quantity;
        $product -> save();

     }

    $token = Str::random(64);
    $data['info'] = $request->all();
    $data['total'] = $total;

    $data['cart'] = Session::get('cart');

    $email = $request->customer_email;

    Mail::send("admin.emails.checkout-email",$data, function ($message) use ($request) {
        $message -> to($request->email);
        $message -> subject("Order Successful!");
    });
    $request->session()->forget('cart');

    return redirect()->route('complete',$ord->id );}

    catch (Exception $e) {
        echo $e->getMessage();
    }
}

    public function blognews()
    {

        return view('fe.blog_news');
    }
    public function updateProductQuantity(Request $request, Product $product, $quantity) {
        $prods = $request->all();
        $prods->quantity = $quantity;
        $product->update($prods);

    }
}
