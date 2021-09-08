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
     * @return \Illuminate\Http\Responseph
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
        $product = Product::query()->where('id', $id)->get();
        
        return view('seller.editproduct', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $product = new Product;
            $product->username = Auth::user()->username;
            $product->title = $request->title;
            $product->type = $request->type;
            $product->price = $request->price;
    
            // dd($product->image_product);
            if($request->hasfile('image_product')){
                $file = $request->file('image_product');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/product/', $filename);
                $product->image_product = $filename;

            }else {
                $product->image_product = "imagedefaults.jpg";
            }

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
