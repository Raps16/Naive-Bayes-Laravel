@extends('layouts.master')
@section('content')
@php
    $max = array_keys($hasiltampil, max($hasiltampil));
    $wording = '';
    
    switch ($max[0]) {
        case 'L':
            $wording = 'lulus';
            break;
        case 'TL':
            $wording = 'Tidak Lulus';
            break;
        
        default:
            $wording = '-';
            break;
    }
@endphp 
<div class="main">
        <div class="min-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="panel">
                    <form action="/penilaian/create" method="POST" >
                    
                    <div class="col-md-12">
                    <div class="panel-heading">
						<h3 class="panel-title">Input Nilai Prajurit</h3>
					</div>
					<div class="panel-body">
                    <div class="row">
                    <div class="col-md-6">
                    <div class="mb-3">
                                        <label for="inputnrp" class="form-label">NRP</label>
                                        <input name="nrp"type="number" class="form-control" id="nrp" aria-describedby="nrp_prajurit" value="{{ $datatampil ? $datatampil['nrp'] : '' }}"  required readonly>
                                    </div><br>
                                    <div class="mb-3">
                                        <label for="inputnama" class="form-label">Nama</label>
                                        <input name="nama_prajurit"type="text" class="form-control" id="nama_prajurit" aria-describedby="namaprajurit" placeholder='Masukan Nama' value="{{ $datatampil ? $datatampil['nama_prajurit'] : '' }}" required readonly>
                                    </div><br>
                                    <div class="mb-3">
                                        <label for="pilihjeniskelamin" class="form-label" >Jenis Kelamin</label>
                                        <input name="jenis_kelamin"type="text" class="form-control" id="jenis_kelamin" aria-describedby="jenis_kelamin" placeholder='Masukan Jabatan'value="{{ $datatampil ? $datatampil['jenis_kelamin'] : '' }}" required readonly>
                                            <!-- <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" value="{{ $datatampil ? $datatampil['jenis_kelamin'] : '' }}" required readonly>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select> -->
                                    </div><br>
                                    <div class="mb-3">
                                        <label for="inputpangkat" class="form-label">Pangkat</label>
                                        <input name="pangkat"type="text" class="form-control" id="pangkat_prajurit" aria-describedby="pangkat_prajurit" placeholder='Masukan Pangkat'value="{{ $datatampil ? $datatampil['pangkat'] : '' }}"required readonly>
                                    </div><br>
                                    <div class="mb-3">
                                        <label for="inputjabatan" class="form-label">Jabatan</label>
                                        <input name="jabatan"type="text" class="form-control" id="jabatan_prajurit" aria-describedby="jabatan_prajurit" placeholder='Masukan Jabatan'value="{{ $datatampil ? $datatampil['jabatan'] : '' }}" required readonly>
                                    </div><br>
                                    <div class="mb-3">
                                        <label for="pilihkesatuan" class="form-label">Kesatuan</label>
                                        <input name="kesatuan"type="text" class="form-control" id="jabatan_prajurit" aria-describedby="jabatan_prajurit" placeholder='Masukan Jabatan'value="{{ $datatampil ? $datatampil['kesatuan'] : '' }}" required readonly>
                                                <!-- <option >AJENDAM</option>
                                                <option >BEKANG</option>
                                                <option >BINTALDAM</option>
                                                <option >DENINTEL</option>
                                                <option >HUBDAM</option>
                                                <option >JASDAM</option>
                                                <option >KESDAM</option>
                                                <option >KUDAM</option>
                                                <option >KUMDAM</option>
                                                <option >MINIVET</option>
                                                <option >PALDAM</option>
                                                <option >POMDAM</option>
                                                <option >TOPDAM</option>
                                                <option >ZIDAM</option>
                                            </select> -->
                                    </div><br>
                                    <div class="mb-3">
                                        <label for="inputalamat" class="form-label">Alamat</label>
                                        <input name="alamat"type="text" class="form-control" id="alamat" aria-describedby="jabatan_prajurit" placeholder='Masukan alamat' value="{{ $datatampil ? $datatampil['alamat'] : '' }}"required readonly>
                                    </div><br>
                    </div>
                    <div class="col-md-6">
                    <div class="mb-3">
                                        <label for="inputlari" class="form-label">Lari 12 Menit</label>
                                        <input name="lari_12mnt"type="number" class="form-control" id="lari_12mnt" aria-describedby="lari_prajurit" placeholder='Masukan Nilai Lari 12 Menit' value="{{ $datatampil ? $datatampil['lari_12mnt'] : '' }}" required readonly>
                                    </div><br>
                                    <div class="mb-3">
                                        <label for="inputsitup" class="form-label">Sit Up</label>
                                        <input name="sit_up"type="number" class="form-control" id="sit_up" aria-describedby="situp_prajurit" placeholder='Masukan Nilai Sit Up' value="{{ $datatampil ? $datatampil['sit_up'] : '' }}"required readonly>
                                    </div><br>
                                    <div class="mb-3">
                                        <label for="inputpullup" class="form-label">Pull Up</label>
                                        <input name="pull_up"type="number" class="form-control" id="pull_up" aria-describedby="pullup_prajurit" placeholder='Masukan Nilai Pull Up' value="{{ $datatampil ? $datatampil['pull_up'] : '' }}" required readonly>
                                    </div><br>
                                    <div class="mb-3">
                                        <label for="inputpushlup" class="form-label">Push Up</label>
                                        <input name="push_up"type="number" class="form-control" id="push_up" aria-describedby="pushup_prajurit" placeholder='Masukan Nilai Push Up' value="{{ $datatampil ? $datatampil['push_up'] : '' }}" required readonly>
                                    </div><br>
                                    <div class="mb-3">
                                        <label for="inputlunges" class="form-label">Lunges</label>
                                        <input name="lunges"type="number" class="form-control" id="lunges" aria-describedby="lunges_prajurit" placeholder='Masukan Nilai lunges' value="{{ $datatampil ? $datatampil['lunges'] : '' }}" required readonly>
                                    </div><br>
                                    <div class="mb-3">
                                        <label for="inputshuttlerun" class="form-label">Shutlle Run</label>
                                        <input name="shutllerun"type="number" class="form-control" id="shutllerun" aria-describedby="shutllerun_prajurit" placeholder='Masukan Nilai Shutlle Run' value="{{ $datatampil ? $datatampil['shutllerun'] : '' }}"required readonly>
                                    </div><br>
                                    <div class="mb-3">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <input name="ket"type="text" class="form-control" id="keterangan" aria-describedby="keterangan_prajurit" 
                                            placeholder='keterangan' value="{{ $wording }}" required readonly>
                                    </div><br>
                                    <br>
                    </div><br>
                    </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        @csrf
                        </form>

							</div>
                    
                    
                    
                    </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
     
@stop

