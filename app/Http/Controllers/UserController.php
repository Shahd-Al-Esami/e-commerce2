<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::all();
        return view('user.index',['users'=>$users]);

    }
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user.show',['user'=>$user]);

    }

    

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
        // return view('user.index');
    }
}
