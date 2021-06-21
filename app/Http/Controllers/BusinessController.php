<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;
use App\Http\Requests\Business\UpdateRequest;

class BusinessController extends Controller
{
    public function index(){
        $business = Business::where('id', 1)->firstOrFail;
        return view('admin.business.index', compact('business'));
    }
    public function update(UpdateRequest $request, Business $business)
    {
        $business->update($request->all());
        return redirect()->route('business.index');
    }
}
