<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ProductController extends Controller
{
   public function featured()
    {
        
        $brands = Brand::all();

        return view('products.create', compact('brands'));
    }
    public function index(Request $request)
    {
    $brands = Brand::all();          

   

    $brand = $request->query('brand_id');
    $query = Product::with('brand');

    if ($brand) {
        $query = $query->where('brand_id', $brand);
    }

    $products = $query->get();

    return view('products.index', compact('products', 'brands'));
    }
    public function create()
    {
        $brands = Brand::all();

        return view('products.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
    $validated = $request->validate([
        'name'    => 'required|max:100',
        'price'   => 'required|numeric|min:1|max:1000',
        'stock'   => 'required|numeric|max:1000',
        'brand_id'   => 'required|integer|exists:brands,id',
        'package' => 'required|in:bottle,plastic,pack,sachet,stick',
    ]);

    Product::create($validated);

    return redirect()
        ->route('products.index')
        ->with('success', 'product added successfully');
    }
    
   
    public function show(Product $product)
    {
    return view('products.show', compact('product'));
    }

    
    public function edit(Product $product)
    {
        $brands = Brand::all();

        return view('products.edit', compact('product', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
{
      Log::info('Product updated', [
    'id' => $product->id,
    ]);

    $validated = $request->validate([
        // the same rules you wrote in store()
    ]);
 
    $product->update($validated);
 
    return redirect()->route('products.index');
    
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
      abort_if($product->brand()->count() === 1, 403);


    $product->delete();
    return redirect()->route('products.index');


    }
}