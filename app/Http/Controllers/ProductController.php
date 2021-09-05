<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\storeProductRequest;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sellerIndex()
    {
        $product = Product::query()->where('username', Auth::user()->username)->get();
        return view('seller.showproduct', compact('product'));
    }

    public function indexAll()
    {
        $product = Product::all();
        return view('welcome', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seller.addproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeProductRequest $request)
    {
        try{
            $product = new Product;
            $product->username = Auth::user()->username;
            $product->title = $request->title;
            $product->type = $request->type;
            $product->price = $request->price;

            if($request->hasfile('image_product')){
                $file = $request->file('image_product');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/product/', $filename);
                $product->image_product = $filename;
            }else {
                return $request;
                $product->image_product = '';
            }

            $product->save();

            return redirect()->route('seller.addProduct')->with('success', 'them thanh cong');
        }catch(Exception $error){
            dd($error);
            return redirect()->route('seller.addProduct')->with('error', 'loi');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        // dd($id);
        //
        // echo $id;
        // $userName = Auth::user()->username;
        
        // $userName = new Product;
        // dd(Product()->id);
        $product = Product::query()->where('id', $id)->get();
        // dd($product);
        // var_dump();
        // dd($product);
        // dd($product->title);
        // $title = $product->title;
        // $type = $product->type;
        // $price = $product->price;
        
        
        return view('seller.editproduct', compact('product'));
    }

    // public function edit($id)
    // {
    //     $userName = Auth::user()->username;
    //     $product = Product::query()->where('username', $username)->get();
    //     return view('seller.editproduct');
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        //
        // dd($id);
        try{
            $product = new Product;
            $product->username = Auth::user()->username;
            $product->title = $request->title;
            $product->type = $request->type;
            $product->price = $request->price;
    
            // dd($product->price);
            // dd($request->hasfile('image_product'));
            // dd($request->file('image_product'));
            // dd($request->file("uploads/product/imagedefault.jpg"));
            if($request->hasfile('image_product')){
                $file = $request->file('image_product');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/product/', $filename);
                $product->image_product = $filename;
                // echo $filename;
                // dd($filename);
            }else {
                $product->image_product = "imagedefaults.jpg";
                // return $request;
                // $product->image_product = 'resources\views\seller\imagedefault.jpg';
            }
            // $deleted = Product::delete('delete from products where id = ?',[$id]);
            // Product::table('product')->where('id', $id)->delete();
            // $product->save();
            // Product::update();
            Product::where('id', $id)->update(['username' => $product->username, 
            'title' => $product->title, 'type' => $product->type, 
            'price' => $product->price, 'image_product' => $product->image_product ]);
            // dd("success");
            return redirect()->route('seller.showProduct')->with('success', 'update thanh cong');
        }catch(Exception $error){
            dd($error);
            return redirect()->route('seller.updateProduct')->with('error', 'loi');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::query()->where('id', $id)->delete();
        $product = Product::query()->where('username', Auth::user()->username)->get();
        return view('seller.showproduct', compact('product'));

    }
}
