<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id')->get();

        return $users;
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
    public function store(UserFormRequest $request)
    {
        
        $name = $request->name;
        $email    = $request->email;
        $password = $request->password;
        $phone = $request->phone;

        $user     = User::create(['name' => $name, 'email' => $email, 'password' => Hash::make($password), 'phone' => $phone]);
        return response()->json(['success' => true, 'data' => $user]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserFormRequest $request, User $user)
    {   
        if(!empty($request->password)){
            $user->update([
                'password' => Hash::make($request->password) 
            ]);
        }
        $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone
                ]);
        
        return response()->json(['success' => true, 'data' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['success' => true]);
    }
}
