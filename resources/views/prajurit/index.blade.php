@extends('layouts.master')
@section('content')
    <div class="main">
        <div class="min-content">
            <div class="container-fluid">
            <div class="main-content">
					<h2 class="title" style="margin-bottom:20px;">Data Prajurit</h2>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
								<div class="panel-body" style="overflow-x:auto;">
									<table class="table" id="datatampil">
										<thead>
											<tr>
                                            <th>NRP</th>
                                            <th>NAMA</th>
                                            <th>JENIS KELAMIN</th>
                                            <th>PANGKAT</th>                                            
                                            <th>JABATAN</th>
                                            <th>ALAMAT</th>
                                            <th>SATUAN</th>
                                            <th>LARI 12mnt</th>
                                            <th>SIT UP</th>
                                            <th>PULL UP</th>
                                            <th>PUSH UP</th>
                                            <th>LUNGES</th>
                                            <th>SHUTLLERUN</th>
                                            <th>KETERANGAN</th>
                                            @if(auth()->user()->role =='admin')
                                            <th>AKSI</th>
                                            @endif
											</tr>
										</thead>
										<tbody>
                                        @foreach($data_tampil as $prajurit)
                                        <tr>
                                            <th>{{$prajurit->nrp}}</th>
                                            <th>{{$prajurit->nama_prajurit}}</th>
                                            <th>{{$prajurit->jenis_kelamin}}</th>
                                            <th>{{$prajurit->pangkat}}</th>
                                            <th>{{$prajurit->jabatan}}</th>
                                            <th>{{$prajurit->alamat}}</th>
                                            <th>{{$prajurit->kesatuan}}</th>
                                            <th>{{$prajurit->lari_12mnt}}</th>
                                            <th>{{$prajurit->sit_up}}</th>
                                            <th>{{$prajurit->pull_up}}</th>
                                            <th>{{$prajurit->push_up}}</th>
                                            <th>{{$prajurit->lunges}}</th>
                                            <th>{{$prajurit->shutllerun}}</th>
                                            <th>{{$prajurit->ket}}</th>
                                            @if(auth()->user()->role =='admin')
                                            <th><a href="/prajurit/{{$prajurit->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('APAKAH ANDA YAKIN ?')"><i class="fa fa-warning">Hapus</i></a></th>
                                            @endif
                                        </tr>
                                        @endforeach
										</tbody>
                                        
									</table>
								</div>
							</div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Prajurit</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                    <div class="modal-body">
                        <form action="{{ route('naive') }}" method="POST" >
                        @csrf                    
                        <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="inputnrp" class="form-label">NRP</label>
                                        <input name="nrp"type="number" class="form-control" id="nrp" aria-describedby="nrp_prajurit" placeholder='Masukan NRP'  required>
                                    </div><br>
                                    <div class="mb-3">
                                        <label for="inputnama" class="form-label">Nama</label>
                                        <input name="nama_prajurit"type="text" class="form-control" id="nama_prajurit" aria-describedby="namaprajurit" placeholder='Masukan Nama'value="" required>
                                    </div><br>
                                    <div class="mb-3">
                                        <label for="pilihjeniskelamin" class="form-label" >Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
                                                <option value="0">Laki-Laki</option>
                                                <option value="1">Perempuan</option>
                                            </select>
                                    </div><br>
                                    <div class="mb-3">
                                        <label for="inputpangkat" class="form-label">Pangkat</label>
                                        <input name="pangkat"type="text" class="form-control" id="pangkat_prajurit" aria-describedby="pangkat_prajurit" placeholder='Masukan Pangkat'value="" required>
                                    </div><br>
                                    <div class="mb-3">
                                        <label for="inputjabatan" class="form-label">Jabatan</label>
                                        <input name="jabatan"type="text" class="form-control" id="jabatan_prajurit" aria-describedby="jabatan_prajurit" placeholder='Masukan Jabatan' required>
                                    </div><br>
                                    <div class="mb-3">
                                        <label for="pilihkesatuan" class="form-label">Kesatuan</label>
                                            <select name='kesatuan'class="form-control"required>
                                                <option value="ajendam">AJENDAM</option>
                                                <option value="bekang">BEKANG</option>
                                                <option value="bintaldam">BINTALDAM</option>
                                                <option value="denintel">DENINTEL</option>
                                                <option value="hubdam">HUBDAM</option>
                                                <option value="jasdam">JASDAM</option>
                                                <option value="kesdam">KESDAM</option>
                                                <option value="kudam">KUDAM</option>
                                                <option value="kumdam">KUMDAM</option>
                                                <option value="minivet">MINIVET</option>
                                                <option value="paldam">PALDAM</option>
                                                <option value="pomdam">POMDAM</option>
                                                <option value="topdam">TOPDAM</option>
                                                <option value="zidam">ZIDAM</option>
                                            </select>
                                    </div><br>
                                    <div class="mb-3">
                                        <label for="inputalamat" class="form-label">Alamat</label>
                                        <input name="alamat"type="text" class="form-control" id="alamat" aria-describedby="jabatan_prajurit" placeholder='Masukan alamat' required>
                                    </div><br>
                    </div>
                    <div class="col-md-6">
                    <div class="mb-3">
                                        <label for="inputlari" class="form-label">Lari 12 Menit</label>
                                        <input name="lari_12mnt"type="number" class="form-control" id="lari_12mnt" aria-describedby="lari_prajurit" placeholder='Masukan Nilai Lari 12 Menit' required>
                                    </div><br>
                                    <div class="mb-3">
                                        <label for="inputsitup" class="form-label">Sit Up</label>
                                        <input name="sit_up"type="number" class="form-control" id="sit_up" aria-describedby="situp_prajurit" placeholder='Masukan Nilai Sit Up' required>
                                    </div><br>
                                    <div class="mb-3">
                                        <label for="inputpullup" class="form-label">Pull Up</label>
                                        <input name="pull_up"type="number" class="form-control" id="pull_up" aria-describedby="pullup_prajurit" placeholder='Masukan Nilai Pull Up' required>
                                    </div><br>
                                    <div class="mb-3">
                                        <label for="inputpushlup" class="form-label">Push Up</label>
                                        <input name="push_up"type="number" class="form-control" id="push_up" aria-describedby="pushup_prajurit" placeholder='Masukan Nilai Push Up' required>
                                    </div><br>
                                    <div class="mb-3">
                                        <label for="inputlunges" class="form-label">Lunges</label>
                                        <input name="lunges"type="number" class="form-control" id="lunges" aria-describedby="lunges_prajurit" placeholder='Masukan Nilai lunges' required>
                                    </div><br>
                                    <div class="mb-3">
                                        <label for="inputshuttlerun" class="form-label">Shutlle Run</label>
                                        <input name="shutllerun"type="number" class="form-control" id="shutllerun" aria-describedby="shutllerun_prajurit" placeholder='Masukan Nilai Shutlle Run' required>
                                    </div><br>
                                    <div class="mb-3">
                                        <label for="keterangan" class="form-label">keterangan</label>
                                        <input name="ket"type="text" class="form-control" id="keterangan" aria-describedby="keterangan_prajurit" >
                                    </div><br>
                                    <br>
                    </div><br>
                    </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                        </div>
                        
                    
                    
                    
                    </div>
                    
                </div>
        </div>
    </div>
@stop
