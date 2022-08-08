<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penilaian;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    public function index()
    {

        $ajendam = DB::select("select * from penilaian where kesatuan ='ajendam'and ket='lulus'");
        // $ajendamtotal = DB::select("select * from penilaian where kesatuan ='ajendam'");
        $kesdam = DB::select("select * from penilaian where kesatuan ='kesdam'and ket='lulus'");
        // $kesdamtotal = DB::select("select * from penilaian where kesatuan ='kesdam'");
        $bekang = DB::select("select * from penilaian where kesatuan ='bekang'and ket='lulus'");
        // $bekangtotal = DB::select("select * from penilaian where kesatuan ='bekang'");
        $bintaldam = DB::select("select * from penilaian where kesatuan ='bintaldam'and ket='lulus'");
        // $bintaldamtotal = DB::select("select * from penilaian where kesatuan ='bintaldam'");
        $denintel = DB::select("select * from penilaian where kesatuan ='denintel'and ket='lulus'");
        $hubdam = DB::select("select * from penilaian where kesatuan ='hubdam'and ket='lulus'");
        $jasdam = DB::select("select * from penilaian where kesatuan ='jasdam'and ket='lulus'");
        $kudam = DB::select("select * from penilaian where kesatuan ='kudam'and ket='lulus'");
        $kumdam = DB::select("select * from penilaian where kesatuan ='kumdam'and ket='lulus'");
        $minvet = DB::select("select * from penilaian where kesatuan ='minivet'and ket='lulus'");
        $paldam = DB::select("select * from penilaian where kesatuan ='paldam'and ket='lulus'");
        $pomdam = DB::select("select * from penilaian where kesatuan ='pomdam'and ket='lulus'");
        $topdam = DB::select("select * from penilaian where kesatuan ='topdam'and ket='lulus'");
        $zidam = DB::select("select * from penilaian where kesatuan ='zidam'and ket='lulus'");


        // $jmlhajendam = (count($ajendam)/count($ajendamtotal))*100;
        $jmlhajendam = count($ajendam);
        $jmlhkesdam = count($kesdam);
        $jmlhbekang = count($bekang);
        $jmlhbintaldam = count($bintaldam);
        $jmlhdenintel = count($denintel);
        $jmlhhubdam = count($hubdam);
        $jmlhkumdam = count($kumdam);
        $jmlhkudam = count($kudam);
        $jmlhminvet = count($minvet);
        $jmlhpaldam = count($paldam);
        $jmlhpomdam = count($pomdam);
        $jmlhtopdam = count($topdam);
        $jmlhzidam = count($zidam);
        $jmlhjasdam = count($jasdam);
        return view('dashboards.index', ['jmlhajendam'=>$jmlhajendam,
        'jmlhkesdam'=>$jmlhkesdam,'jmlhbekang'=>$jmlhbekang,'jmlhbintaldam'=>$jmlhbintaldam,
        'jmlhdenintel'=>$jmlhdenintel,'jmlhhubdam'=>$jmlhhubdam,'jmlhkumdam'=>$jmlhkumdam,
        'jmlhkudam'=>$jmlhkudam,'jmlhminvet'=>$jmlhminvet,'jmlhpaldam'=>$jmlhpaldam,
        'jmlhpomdam'=>$jmlhpomdam,'jmlhtopdam'=>$jmlhtopdam,'jmlhzidam'=>$jmlhzidam,
        'jmlhjasdam'=>$jmlhjasdam

    
        ]);
    }
}
