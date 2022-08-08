<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $table = 'penilaian';
    protected $fillable = ['nama_prajurit','jenis_kelamin','nrp','pangkat','jabatan','alamat','kesatuan','lari_12mnt','sit_up','pull_up','push_up','lunges','shutllerun','ket'];
    use HasFactory;
}
