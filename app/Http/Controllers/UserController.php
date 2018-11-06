<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return response() -> json($users, 200);
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
        //POST
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $success = $user->save();

        if(!$success) {
            return response()->json('Error Saving', 500);
        }
        else
            return response()->json('Success', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($email)
    {
        //GET (1 or few data only) search based on email
        $user = User::where('email', $email)->first();

        if(is_null($user)) {
            return response()->json('Not Found', 404);
        }
        else
            return response()->json($user, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $email)
    {
        //PUT based on email
        $user = User::where('email', $email)->first();

        if(!is_null($request->email)) {
            $user->name = $request->name;
            $user->email = $request->email;
        }

        $success = $user->save();

        if(!$success) {
            return response()->json('Error Updating', 500);
        }
        else {
            return response()->json('Success Updating', 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($email)
    {
        //DELETE based on email
        $user = User::where('email', $email)->first();

        if(is_null($user)) {
            return response()->json('Not Found', 404);
        }

        else {
            $success = $user->delete();

            if(!$success) {
                return response()->json('Error Deleting', 500);
            }
            else 
                return response()->json('Success Delete', 200);
        }
    }
}
