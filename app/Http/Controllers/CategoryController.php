<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorys = Category::orderBy('id')->get();

        return $categorys;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryFormRequest $request)
    {
        $user     = Category::create(['name' => $request->name]);
        return response()->json(['success' => true, 'data' => $user]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return $category;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryFormRequest $request,Category $category)
    {
        $category->update([
            'name' => $request->name, 
        ]);

        return response()->json(['success' => true, 'data' => $category]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['success' => true]);
    }

    public function getCategory($name){
        $category = Category::where('name',$name)->first();
        return response()->json(['success' => true, 'data' =>$category ]);
    }
}
