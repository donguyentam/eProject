<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderDetail;
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


    public function productDetails($slug) 
    {
        // hàm where() sẽ trả về 1 mảng
        $prod = Product::where('slug', $slug)->first();
        return view('fe.product_details', compact('prod'));
    }


    public function AddCart(Request $request, $id) 
    {
        $product = DB::table('product_detail')->where('id', $id)->first();
        if($product!=null){
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new CartItem($oldCart);
            $newCart -> AddCart($product,$id);

            $request->session()->put('Cart', $newCart);
        }
        return view('fe.cart');
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
            $newCart -> DeleteItemCart($id);
        
            if(count( $newCart -> products)>0){
                $request->session()->put('Cart', $newCart);
            }else{
                $request->session()->forget('Cart');
            }

            
        return view('fe.cart');
    }


    public function DeleteListItemCart(Request $request, $id) 
    {
        
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new CartItem($oldCart);
            $newCart -> DeleteItemCart($id);
        
            if(count( $newCart -> products)>0){
                $request->session()->put('Cart', $newCart);
            }else{
                $request->session()->forget('Cart');
            }

            
        return view('fe.cart');
    }


    public function checkout() 
    {
        $user = \Sentinel::check();

        return view("fe.checkout", compact('user'));
    }

    public function SaveListItemCart(Request $request, $id,$quanty) 
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new CartItem($oldCart);
            $newCart -> UpdateItemCart($id,$quanty); 
        
            $request->session()->put('Cart', $newCart);

            
        return view('fe.cart');
    }

    public function SaveAll(Request $request) 
    {
        foreach($request->data as $item){
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new CartItem($oldCart);
            $newCart -> UpdateItemCart($item["key"],$item["value"]); 
            $request->session()->put('Cart', $newCart);
        }
            
    }
}
