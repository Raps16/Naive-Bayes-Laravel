<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrajuritController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_tampil= \App\Models\Prajurit::where('nrp','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data_tampil = \App\Models\Prajurit::all(); 
        }
        return view ('prajurit.index',['data_tampil' => $data_tampil]);
        // dd($data_tampil);
    }
    public function create(Request $request)
    {
        \App\Models\Prajurit::create($request->all());
        return redirect('/prajurit')->with('sukses','data berhasil diinput');
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
    public function filter (Request $filter)
    {
        if($filter->has('filterketerangan')){
            
            $data_tampil= DB::select("select * from penilaian where ket like 'filterketerangan'");
        
        }else{
            $data_tampil = \App\Models\Prajurit::all(); 
        }
        return view ('prajurit.index',['data_tampil' => $data_tampil]);
        // dd($filter->all());
    }
}
