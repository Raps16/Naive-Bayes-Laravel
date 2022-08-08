<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;

class Usercontroller extends Controller
{
    public function index()
    {
        $data_User = \App\Models\User::all(); 
        return view ('user.index',['data_User' => $data_User]);
    }
    public function create(Request $request)
    {
        //generate token pe
        $token = Str::random(60);
        $data_user = ['remember_token' => $token];
        //insert ke table 
        $request->request->add(['remember_token'=>$token]);
        $user = \App\Models\User::create($request->all());
        return redirect('/user')->with('sukses','data berhasil diinput');
    }
    public function edit ($id)
    {
        $user = \App\Models\User::find($id);
        return view('user,index',['user' => $user]);
    }
    public function update(Request $request,$id)
    {
       $user = \App\Models\User::find($id);
       $user->update($request->all());
       return redirect('/user')->with('sukses','data berhasil diupdate');
    }
    public function delete ($id)
    {
        $user = \App\Models\User::find($id);
        $user->delete();
        return redirect('/user')->with('sukses','data berhasil dihapus');
    }
}
