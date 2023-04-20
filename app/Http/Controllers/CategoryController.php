<?php

namespace App\Http\Controllers;

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
    public function create(Request $request)
    {
        $rules = [
            'name' => 'required',
        ];

        $input     = $request->only('name', 'email', 'password');
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }
        $name = $request->name;
        $email    = $request->email;
        $password = $request->password;
        $phone = $request->phone;

        $category     = Category::create(['name' => $name, 'email' => $email, 'password' => Hash::make($password), 'phone' => $phone]);
        return response()->json(['success' => true, 'data' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return $category;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $newCategory =  Category::where('id', $id)
            ->update([
                'name' => $request->name,
            ]);
        $category = Category::findOrFail($id);
        return $category;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $category = Category::findOrFail($id);
        if ($category)
            $category->delete();
        else
            return response()->json('errr');
        return response()->json(null);
    }
}
