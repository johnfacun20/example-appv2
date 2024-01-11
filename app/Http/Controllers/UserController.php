<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\UserCollection;
use App\Http\Resources\UserCollection as ResourcesUserCollection;
use GuzzleHttp\Psr7\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response([
            'users' => User::select('id', 'name', 'email')->get()
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attrs = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'age' => 'required|integer',
            'account_type' => 'required|string',
            'password' => 'required|string|min:6'
        ]);

        User::create([
            'name' => $attrs['name'],
            'email' => $attrs['email'],
            'age' => $attrs['age'],
            'account_type' => $attrs['account_type'],
            'password' => bcrypt($attrs['password'])
        ]);

        return response([
            'response' => 'success'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $record = User::find($id);

       if($record){
            $record->delete();
            return response([
                'response' => 'success'
            ], 200);
       }

        return response([
            'response' => 'error'
        ], 403);

    }
}
