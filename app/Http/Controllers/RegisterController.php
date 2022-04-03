<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\user;

class RegisterController extends Controller
{
    public function index()
    {
        return view('/auth.register' ,[
            "title" => "Daftar"
        ]);
    }

    public function store(Request $request)
    {
       $validateData = $request->validate([
        //    'firstName' => ' required|max:255',
           'name' => ' required|max:255',
           'username' => 'required|min:3|max:255|unique:users',
           'email' => 'required|email|unique:users',
           'password' => 'required|min:6|max:16'
       ]);
       $validateData['password'] = Hash::make($validateData['password']);
       
       user::create($validateData);

       return redirect('/login')->with('success', 'Daftar sudah berhasil! Silahkan LOGIN');
    }
}

