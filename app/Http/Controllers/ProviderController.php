<?php

namespace App\Http\Controllers;

use App\Provider;
use Illuminate\Http\Request;
use App\Http\Requests\Provider\StoreRequest;
use App\Http\Requests\Provider\UpdateRequest;

class ProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:providers.create')->only(['create']);
        $this->middleware('can:providers.store')->only(['store']);
        $this->middleware('can:providers.index')->only(['index']);
        $this->middleware('can:providers.edit')->only(['edit','update']);
        $this->middleware('can:providers.show')->only(['show']);
        $this->middleware('can:providers.destroy')->only(['destroy']);
    }
    public function index()
    {
        $providers = Provider::get();
        return view('admin.provider.index', compact('providers'));
    }
    public function create()
    {
        $providers = Provider::all();
        if($providers){
        return view('admin.provider.create', compact('providers'));
        }else {
            return view('admin.provider.create');
        }

    }
    public function store(StoreRequest $request)
    {
          /* $validate = $request->validate();
          if($validate) {
            Provider::create($request->all());
            return redirect()->route('providers.index')->with('message', 'Proveedor creado de forma exitosa !');
          }else {

            return redirect()->route('providers.index')->with('error', 'Error al crear el proveedor !');
          } */
          Provider::create($request->all());
          return redirect()->route('providers.index')->with('message', 'Proveedor creado de forma exitosa !');

    }
    public function show(Provider $provider)
    {
        return view('admin.provider.show', compact('provider'));
    }
    public function edit(Provider $provider)
    {
        return view('admin.provider.edit', compact('provider'));
    }
    public function update(UpdateRequest $request, Provider $provider)
    {


       /*  $validate = $request->validate();
        if($validate) {
            $provider->update($request->all());
            return redirect()->route('providers.index')->with('message', 'Proveedor creado de forma exitosa !');
        }else {

          return redirect()->route('providers.index')->with('error', 'Error al crear el proveedor !');
        } */
        $provider->update($request->all());
        return redirect()->route('providers.index')->with('message', 'Proveedor actualizado de forma exitosa !');
    }
    public function destroy(Provider $provider)
    {
        $provider->delete();
        return redirect()->route('providers.index')->with('message', 'Proveedor eliminado !');;
    }
}
