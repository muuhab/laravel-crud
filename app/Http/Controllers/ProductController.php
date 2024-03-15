<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Validation\Rules\File;

class ProductController extends Controller
{

    private static function validation(Request $request,$update=false)
    {
        $formFields = $request->validate([
            'name' => ['required','string', 'max:255'],
            'description' => ['required','string','max:5000'],
            'price' => ['required','decimal:0,1','numeric','min:0.01','max:999999.99'],
            'quantity' => ['required','integer','min:1','max:5000'],
            'image' => [$update ? 'optional':'required',File::types(['jpg','png','jpeg'])->max((3*1024))]
        ]);
        if($request->hasFile('image')){
            $formFields['image'] = $request->file('image')->store('images','public');

        }
        return $formFields;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("products.index",["products"=> Product::latest()->filter(request(['search']))->paginate(4)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ;
        Product::create(self::validation($request));

        return redirect('/products')->with('message','Product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view("products.show",["product"=> $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit',["product"=> $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

        $product->update(self::validation($request,true));
        return redirect('/products')->with("message","Product updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect("/products")->with("message","Product deleted successfully");
    }
}
