<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:categories.create')->only(['create', 'store']);
        $this->middleware('can:categories.index')->only(['index']);
        $this->middleware('can:categories.edit')->only(['edit', 'update']);
        $this->middleware('can:categories.show')->only(['show']);
        $this->middleware('can:categories.destroy')->only(['destroy']);
    }
    public function index()
    {
        $categories = Category::get();
        return view('admin.category.index', compact('categories'));
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(StoreRequest $request)
    {

        $attr = $request->validated();
        if ($attr) {
            Category::create($request->all());
            return redirect()->route('categories.index', compact("attr"))->with('message', 'Categoría creada');
        } else {
            return redirect()->route('categories.index', compact("attr"))->with('error', 'Error al crear la categoria');
        }
    }
    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }
    public function update(UpdateRequest $request, Category $category)
    {
        $attr = $request->validated();
        if ($attr) {
            $category->update($request->all());
            return redirect()->route('categories.index', compact("attr"))->with('message', 'Categoría actualizada');
        } else {
            return redirect()->route('categories.index', compact("attr"))->with('error', 'Error al actualizar la categoria');
        }
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('message', 'Categoría eliminada');
    }
}
