<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\naive;

class NaiveCoreController extends Controller
{
    public function __construct() {
        //get dataset
        $this->ds_lulus = naive::where('ket', 'L')->get()->toArray();
        $this->ds_tidak_lulus = naive::where('ket', 'TL')->get()->toArray();
        $this->coba = [
            'lari_12mnt' => [
                'L' => [
                    'mean' => $this->mean($this->ds_lulus, 'lari_12mnt'),
                    'std_dev' => 0,
                    'prob' => 0
                ],
                'TL' => [
                    'mean' => $this->mean($this->ds_tidak_lulus, 'lari_12mnt'),
                    'std_dev' => 0,
                    'prob' => 0
                ],
            ],
            
            'pull_up' => [
                'L' => [
                    'mean' => $this->mean($this->ds_lulus, 'pull_up'),
                    'std_dev' => 0,
                    'prob' => 0
                ],
                'TL' => [
                    'mean' => $this->mean($this->ds_tidak_lulus, 'pull_up'),
                    'std_dev' => 0,
                    'prob' => 0
                ],
            ],
            'sit_up' => [
                'L' => [
                    'mean' => $this->mean($this->ds_lulus, 'sit_up'),
                    'std_dev' => 0,
                    'prob' => 0
                ],
                'TL' => [
                    'mean' => $this->mean($this->ds_tidak_lulus, 'sit_up'),
                    'std_dev' => 0,
                    'prob' => 0
                ],
            ],
            'push_up' => [
                'L' => [
                    'mean' => $this->mean($this->ds_lulus, 'push_up'),
                    'std_dev' => 0,
                    'prob' => 0
                ],
                'TL' => [
                    'mean' => $this->mean($this->ds_tidak_lulus, 'push_up'),
                    'std_dev' => 0,
                    'prob' => 0
                ],
            ],
            'lunges' => [
                'L' => [
                    'mean' => $this->mean($this->ds_lulus, 'lunges'),
                    'std_dev' => 0,
                    'prob' => 0
                ],
                'TL' => [
                    'mean' => $this->mean($this->ds_tidak_lulus, 'lunges'),
                    'std_dev' => 0,
                    'prob' => 0
                ],
            ],
            'shutllerun' => [
                'L' => [
                    'mean' => $this->mean($this->ds_lulus, 'shutllerun'),
                    'std_dev' => 0,
                    'prob' => 0
                ],
                'TL' => [
                    'mean' => $this->mean($this->ds_tidak_lulus, 'shutllerun'),
                    'std_dev' => 0,
                    'prob' => 0
                ],
            ],
        ];

        $this->probabilitas = [
            'L' => (count($this->ds_lulus) / (count($this->ds_lulus)+count($this->ds_tidak_lulus))) ,
            'TL' => (count($this->ds_tidak_lulus) / (count($this->ds_lulus)+count($this->ds_tidak_lulus))) 
        ];

        $this->hasil = [
            'L' => 0,
            'TL' => 0,
        ];
    }

    public function index()
    {
        $datas = [
            'data' => null,
            'hasil' => null
        ];
        return view('result', $datas);
        // dd ($this);
    }

    public function naiveBayes(Request $req)
    {
        $data = $req->all();
        foreach ($this->coba as $key => $value) {
            $this->coba[$key]['L']['std_dev'] = $this->std_dev($this->ds_lulus, $key, 'L');
            $this->coba[$key]['TL']['std_dev'] = $this->std_dev($this->ds_tidak_lulus, $key, 'TL');
            
            $this->coba[$key]['L']['prob'] = $this->prob($data[$key], $this->coba[$key]['L']['std_dev'], $this->coba[$key]['L']['mean']);
            $this->coba[$key]['TL']['prob'] = $this->prob($data[$key], $this->coba[$key]['TL']['std_dev'], $this->coba[$key]['TL']['mean']);
            
            $this->probabilitas['L'] *= $this->coba[$key]['L']['prob'];
            $this->probabilitas['TL'] *= $this->coba[$key]['TL']['prob'];
            }

        
        $L = $this->probabilitas['L'] / (count($this->ds_lulus) / (count($this->ds_lulus)+count($this->ds_tidak_lulus)));
        $TL = $this->probabilitas['TL'] / (count($this->ds_tidak_lulus) / (count($this->ds_lulus)+count($this->ds_tidak_lulus)));
        
        $this->hasil['TL'] = ($TL/($L+$TL))*100; 
        $this->hasil['L'] = ($L/($TL+$L))*100;

        $datas = [
            'data' => $data,
            'hasil' => $this->hasil
        ];

        // return view('result',$datas);
        dd ($datas);
        
    } 

    //menghitung mean
    public function mean($data, $key)
    { 

        return (array_sum(array_column($data, $key))) / (count($data));
    }

    //menghitung standart deviasi
    public function std_dev($data, $key, $type)
    {

        $temp = array_column($data, $key);
        $mean = $this->coba[$key][$type]['mean'];

        $result = array_map(
            function($val) use($mean) {
                return pow(($val - $mean), 2); // 2 itu pangkat 2 
            }, $temp
        );
        return sqrt((array_sum($result)) / (count($data) - 1));
    }

    //menghitung probabilitas per atribut 
    public function prob($data, $std_dev, $mean)
    {
        $penyebut = sqrt((2*3.14)*$std_dev);
        $e_pembilang = pow(($data-$mean),2);
        $e_penyebut = 2*pow($std_dev, 2);

        $result = (1/$penyebut)*exp(-($e_pembilang/$e_penyebut));
        return $result;
    } 
}
