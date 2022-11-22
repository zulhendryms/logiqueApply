<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //list
    {
        //
        $users = User::latest()->get();
        return response()->json([
            'data' => UserPost::collection($users),
            'message' => 'Fetch all posts',
            'success' => true
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'creditcard_type' => 'required',
            'creditcard_number' => 'required',
            'creditcard_name' => 'required',
            'creditcard_expired' => 'required',
            'creditcard_cvv' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => [],
                'message' => $validator->errors(),
                'error' => false
            ]);
        }

        $users = User::create([
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'creditcard_type' => $request->get('creditcard_type'),
            'creditcard_number' => $request->get('creditcard_number'),
            'creditcard_name' => $request->get('creditcard_name'),
            'creditcard_expired' => $request->get('creditcard_expired'),
            'creditcard_cvv' => $request->get('creditcard_cvv'),
        ]);

        return response()->json([
            'data' => new UserPost($users),
            'message' => 'User created successfully.',
            'success' => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return response()->json([
            'data' => new UserPost($user),
            'message' => 'Data User found',
            'success' => true
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'creditcard_type' => $request->get('creditcard_type'),
            'creditcard_number' => $request->get('creditcard_number'),
            'creditcard_name' => $request->get('creditcard_name'),
            'creditcard_expired' => $request->get('creditcard_expired'),
            'creditcard_cvv' => $request->get('creditcard_cvv'),
        ]);

        return response()->json([
            'data' => new UserPost($user),
            'message' => 'User updated successfully',
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
