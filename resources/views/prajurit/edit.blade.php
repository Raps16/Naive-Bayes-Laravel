@extends('layouts.master')
@section('content')
<div class="main">
        <div class="min-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    <div class="panel-body">
				<h1>EDIT DATA PRAJURIT</h1>
        @if(session('sukses'))
            <div class="alert alert-dark" role="alert">
                {{session('sukses')}}
            </div>
        @endif
            <div class="row">
            <div class="col-lg-12">
            <form action="/prajurit/{{$prajurit->id}}/update" method="post">
            @csrf                    
                    <div class="mb-3">
                        <label for="inputnama" class="form-label">Nama</label>
                        <input name="nama_prajurit"type="text" class="form-control" id="nama_prajurit" aria-describedby="namaprajurit" value="{{$prajurit->nama_prajurit}}">
                        <div id="namaprajurit1" class="form-text">Masukan Nama</div>
                    </div>
                    <div class="mb-3">
                    <label for="inputjk" class="form-label">Jenis Kelamin</label>
                    <br>
                    <select name="jenis_kelamin" class="pilihjk" aria-label="pilihjk">
                        <option value="0"@if($prajurit->jenis_kelamin == '0') selected @endif>Laki-Laki</option>
                        <option value="1"@if($prajurit->jenis_kelamin == '1') selected @endif>Perempuan</option>
                    </select>
                    </div>
                    <div class="mb-3">
                        <label for="nrp" class="form-label">nrp</label>
                        <input name="nrp" type="number" class="form-control" id="nrp" aria-describedby="nrp"value="{{$prajurit->nrp}}">
                        <div id="pangkat" class="form-text">nrp</div>
                    </div>
                    <div class="mb-3">
                        <label for="inputpangkat" class="form-label">Pangkat</label>
                        <input name="pangkat" type="text" class="form-control" id="pangkat" aria-describedby="pangkat" value="{{$prajurit->pangkat}}">
                        <div id="pangkat" class="form-text">Masukan pangkat</div>
                    </div>
                    <div class="mb-3">
                        <label for="inputjabatan" class="form-label">Jabatan</label>
                        <input name="jabatan"  type="text" class="form-control" id="jabatan" aria-describedby="jabatan"value="{{$prajurit->jabatan}}">
                        <div id="jabatan" class="form-text">Masukan jabatan</div>
                    </div>
                    <div class="mb-3">
                    <label for="inputkesatuan" class="form-label">Pilih Kesatuan</label>
                    <br>
                    <select name="kesatuan" class="pilihkesatuan" aria-label="pilihkesatuan">
                        <option value="ajendam"@if($prajurit->kesatuan == 'ajendam') selected @endif>AJENDAM</option>
                        <option value="bekang"@if($prajurit->kesatuan == 'bekang') selected @endif>BEKANG</option>
                        <option value="bintaldam"@if($prajurit->kesatuan == 'bintaldam') selected @endif>BINTALDAM</option>
                        <option value="denintel"@if($prajurit->kesatuan == 'denintel') selected @endif>DENINTEL</option>
                        <option value="hubdam"@if($prajurit->kesatuan == 'hubdam') selected @endif>HUBDAM</option>
                        <option value="jasdam"@if($prajurit->kesatuan == 'jasdam') selected @endif>JASDAM</option>
                        <option value="kesdam"@if($prajurit->kesatuan == 'kesdam') selected @endif>KESDAM</option>
                        <option value="kudam"@if($prajurit->kesatuan == 'kudam') selected @endif>KUDAM</option>
                        <option value="kumdam"@if($prajurit->kesatuan == 'kumdam') selected @endif>KUMDAM</option>
                        <option value="minivet"@if($prajurit->kesatuan == 'minivet') selected @endif>MINIVET</option>
                        <option value="paldam"@if($prajurit->kesatuan == 'paldam') selected @endif>PALDAM</option>
                        <option value="pomdam"@if($prajurit->kesatuan == 'pomdam') selected @endif>POMDAM</option>
                        <option value="topdam"@if($prajurit->kesatuan == 'topdam') selected @endif>TOPDAM</option>
                        <option value="zidam"@if($prajurit->kesatuan == 'zidam') selected @endif>ZIDAM</option>
                    </select>
                    </div>
                    <div class="mb-3">
                        <label  for="inputalamat" class="form-label">Alamat</label>
                        <input name="alamat" type="text" class="form-control" id="alamat" aria-describedby="alamat"value="{{$prajurit->alamat}}">
                        <div id="alamat" class="form-text">Masukan Alamat</div>
                        <button type="submit" class="btn btn-warning">Update</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
 @endsection