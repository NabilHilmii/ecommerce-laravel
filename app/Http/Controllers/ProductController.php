<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    public function index()
    {
        $data =  Product::all();
        return view('pages.product.product', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('pages.product.addProduct');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->image) {
            //Proses Membahkan File Image Secara Lokal
            $fileName = $request->name . '.jpg';
            $request->file('image')->storeAs('public/images', $fileName);


            Product::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'desc' => $request->desc,
                'price' => $request->price,
                'image' => $fileName
            ]);
        } else {
            Product::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'desc' => $request->desc,
                'price' => $request->price,
            ]);
        }

        return redirect()->route('product.index')->with('message', 'Add Product Success');
    }

    /**
     * Display the specified resource.
     */
    public function show($product)
    {
        $product = Product::find($product);

        return view('pages.product.editProduct', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $product)
    {
        $product = Product::find($product);

        if ($request->image) {
            //Proses Membahkan File Image Secara Lokal
            $fileName = $request->name. '.jpg';
            $request->file('image')->storeAs('public/images', $fileName);

            $product->update([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'desc' => $request->desc,
                'price' => $request->price,
                'image' => $fileName
            ]);
        } else {
            $product->update([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'desc' => $request->desc,
                'price' => $request->price,
            ]);
        }

        return redirect()->route('product.index')->with('message', 'Edit Product Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($product)
    {
        $product = Product::find($product);
    
        // Remove related records in the carts table
        $product->delete();
    
        // Now you can safely delete the product
        Storage::delete('public/images/' . basename($product->image));
        $product->delete();
    
        return redirect()->route('product.index')->with('message', 'Delete Product Success');
    }
}
