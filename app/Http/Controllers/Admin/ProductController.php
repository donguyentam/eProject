<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $prods = Product::all();

        // return view('admin.product.index')->with([
        //     'prods' => $prods
        // ]);
        return view('admin.product.index', compact('prods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cates = Category::all();
        return view('admin.product.create', compact('cates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Category $cates)
    {
        // $prods là mảng liên hợp (associative array)
        $prods = $request->all();
        $prods['slug'] = \Str::slug($request->name);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension();
            if($ext != 'jpg' && $ext != 'png' && $ext !='jpeg')
            {
                $cates = Category::all();

                return view('admin.product.create', compact('cates'))
                    ->with('error','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $imgName = $file->getClientOriginalName();
            $file->move('images', $imgName);
        } else {
            $imgName = null;
        }
        $prods['image'] = $imgName;

        Product::create($prods);
        return redirect()->route('admin.product.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $cates = Category::all();
        return view('admin.product.edit', compact(
            'cates',
            'product'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $prods = $request->all();
        $prods['slug'] = \Str::slug($request->name);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension();
            if($ext != 'jpg' && $ext != 'png' && $ext !='jpeg')
            {
                $cates = Category::all();
                return view('admin.product.create', compact('cates'))
                    ->with('error','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $imgName = $file->getClientOriginalName();
            $file->move('images', $imgName);
        } else {
            $imgName = $product->image;
        }

        $prods['image'] = $imgName;
        $product->update($prods);
return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    public function searchProduct(Request $req)
    {
        $search = $_GET['search'];
        $prods = Product::where('name','LIKE','%' . $search . '%')->get();
        //->orWhere('product_promotion_price',$req->key)

        return view('product.index', compact('prods'));

    }
    public function searchProductAdmin(Request $req)
    {
        $search = $_GET['search'];
        $prods = Product::where('name','LIKE','%' . $search . '%')->get();
        //->orWhere('product_promotion_price',$req->key)

        return view('admin.product.index', compact('prods'));

    }


    public function getSearch(Request $req)
    {
        $product = Product::where('name','like','%'.$req->key.'%')
                            ->orWhere('price',$req->key)
                            //->orWhere('product_promotion_price',$req->key)
                            ->get();
        return view('fe.product_search',compact('product'));
    }


    public function deleteproduct( $id)
    {
        $user = Product::find($id);
        $user ->delete();
        return redirect()->route('admin.product.index');
    }

    public function user ()
    {
        $users = User::all();
        // return view('admin.product.index')->with([
        //     'prods' => $prods
        // ]);
        return view('admin.adUser.user', compact('users'));
    }

    public function updateuser(Request $request, $id)
    {
        $user = User::find($id);
        $user -> email = $request->email;
        $user -> password = bcrypt($request->password);
        $user ->save();
        return redirect()->route('admin.user');
    }


    public function edituser( $id)
    {
        $user = User::find($id);
        return view('admin.adUser.edituser', compact('user'));
    }

    public function deleteuser( $id)
    {
        $user = User::find($id);
        $user ->delete();
        return redirect()->route('admin.user');
    }

    public function searchUser()
    {
        $search = $_GET['search'];
        $users = User::where('email','LIKE','%' . $search . '%')->get();
        return view('admin.adUser.user', compact('users'));
    }


    public function itemSearch(){
        $search = $_GET['search1'];
        $categories = Category::all();
        $products = Product::orderBy('price', 'asc')->where('name','LIKE','%'. $search .'%')->paginate(6);
        return view('fe.product_search', compact('products','categories'));
    }

    // public function pagination(){
    //     $products = Product::paginate(6);
    //     return view('fe.product_search', compact('products'));
    // }

    public function sort_by(Request $request){
        if($request->sort_by == 1){
            $products = Product::orderBy('price', 'asc')->get();
        }
        if($request->sort_by == 2){
            $products = Product::orderBy('price', 'desc')->get();
        }
        return view('fe.product_search', compact('products'))->render(); 
    }

}








