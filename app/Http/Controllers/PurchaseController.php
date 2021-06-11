<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\Provider;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Purchase\StoreRequest;
use App\Http\Requests\Purchase\UpdateRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $purchases = Purchase::get();
        return view('admin.purchase.index', compact('purchases'));
    }
    public function create()
    {
        $providers = Provider::get();
        $products = Product::get();
        return view('admin.purchase.create', compact('providers','products'));
    }
    public function store(StoreRequest $request)
    {
        $purchase = Purchase::create($request->all()+[
            'user_id'=>Auth::user()->id,
            'purchase_date'=>Carbon::now('America/Lima'),

        ]);
        foreach ($request->product_id as $key => $product) {
            $results[] = array("product_id"=>$request->product_id[$key],
            "quantity"=>$request->quantity[$key], "price"=>$request->price[$key]);
        }
        $purchase->purchaseDetails()->createMany($results);
        return redirect()->route('purchases.index');
    }
    public function show(Purchase $purchase)
    {
        $subtotal = 0 ;
        $purchaseDetails = $purchase->purchaseDetails;
        foreach ($purchaseDetails as $purchaseDetail) {
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
        }
        return view('admin.purchase.show', compact('purchase', 'purchaseDetails', 'subtotal'));
    }
    public function edit(Purchase $purchase)
    {
        $providers = Provider::get();
        return view('admin.purchase.edit', compact('purchase'));
    }
    public function update(UpdateRequest $request, Purchase $purchase)
    {
        // $purchase->update($request->all());
        // return redirect()->route('purchases.index');
    }
    public function destroy(Purchase $purchase)
    {
        // $purchase->delete();
        // return redirect()->route('purchases.index');
    }
}
