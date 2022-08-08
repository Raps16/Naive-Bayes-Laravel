<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function index(){
        return view('admin.data', [
            'Naive' => naive::all(),
        ]);
    }

    public function postData(Request $req){

        Validator::make($req->all(), [
            'csv' => 'required',
        ])->validate();

        $file = $req->file('csv');
        // dd($file->getPathName());

        $datas = [];
        if (($handle = fopen($file->getPathName(), "r")) !== FALSE) {
            while (! feof($handle)) {
                $data = fgetcsv($handle);
                if (!$data) {
                    continue;
                }
                $datas[] = $data;
            }
            fclose($handle);
        }

        $header = $datas[0];
        unset($header[7]);

        for ($i=1; $i < count($datas); $i++) {
            $dataset = new Penilaian;
            unset($datas[$i][7]);
            $save = array_combine($header, $datas[$i]);
            $dataset->lari_12mnt = $save['lari_12mnt'];
            $dataset->pull_up = $save['pull_up'];
            $dataset->sit_up = $save['sit_up'];
            $dataset->push_up = $save['push_up'];         
            $dataset->lunges = $save['lunges'];
            $dataset->shutllerun = $save['shutllerun'];
            $dataset->type = $save['type'];
            // $dataset->age = $save['age'];
            // $dataset->bsfast = $save['bsfast'];
            // $dataset->bspp = $save['bspp'];
            // $dataset->plasma_r = $save['plasma_r'];
            // $dataset->plasma_f = $save['plasma_f'];
            // $dataset->hba1c = $save['hba1c'];
            // $dataset->type = $save['type'];
            $dataset->save();
        }

        // dd($data);
        return redirect()->route('data');
    }
}
