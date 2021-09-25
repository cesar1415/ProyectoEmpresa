<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Provider;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:product.create')->only(['create','store']);
        $this->middleware('can:product.index')->only(['index']);
        $this->middleware('can:product.edit')->only(['edit','update']);
        $this->middleware('can:product.show')->only(['show']);
        $this->middleware('can:product.destroy')->only(['destroy']);

        $this->middleware('can:change.status.products')->only(['change_status']);


    }
    public function index()
    {
        $products = Product::get();
        return view('admin.product.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::get();
        $providers = Provider::get();
        return view('admin.product.create', compact('categories','providers'));
    }
    public function store(StoreRequest $request)
    {
        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/image"),$image_name);
        }

        $product = Product::create($request->all()+[
            'image'=>$image_name,
        ]);
        $product->update(['code'=>$product->id]);
        return redirect()->route('products.index')->with('message', 'Se ha creado un nuevo producto!');
    }
    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }
    public function edit(Product $product)
    {
        $categories = Category::get();
        $providers = Provider::get();
        return view('admin.product.edit', compact('product','categories','providers'));
    }
    public function update(UpdateRequest $request, Product $product)
    {

        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/image"),$image_name);

            $product->update($request->all()+[
                'image'=>$image_name,
            ]);
        }
        return redirect()->route('products.index')->with('message', 'Se ha actualizado el producto!');
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
    public function change_status(Product $product)
    {
        if ($product->status == 'ACTIVE') {
            $product->update(['status'=>'DEACTIVATED']);
            return redirect()->back();
        } else {
            $product->update(['status'=>'ACTIVE']);
            return redirect()->back()->with('message', 'Se ha eliminado un nuevo producto!');
        }

    }
}
