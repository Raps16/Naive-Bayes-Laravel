<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index()
    {
        $data_prajurit = \App\Models\Penilaian::all(); 
        return view ('penilaian.index',['data_prajurit' => $data_prajurit]);
    }
    public function create(Request $request)
    {
        \App\Models\Penilaian::create($request->all());
        return redirect('/penilaian')->with('sukses','data berhasil diinput');
    }
    public function edit ($id)
    {
        $prajurit = \App\Models\Prajurit::find($id);
        return view('prajurit/edit',['prajurit' => $prajurit]);
    }
    public function update(Request $request,$id)
    {
       $prajurit = \App\Models\Prajurit::find($id);
       $prajurit->update($request->all());
       return redirect('/prajurit')->with('sukses','data berhasil diupdate');
    }
    public function delete ($id)
    {
        $prajurit = \App\Models\Prajurit::find($id);
        $prajurit->delete();
        return redirect('/prajurit')->with('sukses','data berhasil dihapus');
    }
}
