@extends('layouts.master')
@section('content')
    <div class="main">
        <div class="min-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    <div class="panel">
                        @if(session('sukses'))
                            <div class="alert alert-dark" role="alert">
                                {{session('sukses')}}
                            </div>
                        @endif
								<div class="panel-heading">
									<h3 class="panel-title">DATA MASTER</h3>
                                    <div class="right">
                                        <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Tambah User
                                        </a>
                                    </div>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
                                            <th>NAMA</th>
                                            <th>EMAIL</th>
                                            <th>ROLE</th>
                                            <th>AKSI</th>
											</tr>
										</thead>
										<tbody>
                                        @foreach($data_User as $user)
                                        <tr>
                                            <th>{{$user->name}}</th>
                                            <th>{{$user->email}}</th>
                                            <th>{{$user->role}}</th>
                                            <th><a href="/user/{{$user->id}}/edit" class="btn btn-primary" data-toggle="modal" data-target="#modaledit" data-id="{{ $user->id }}">edit</a>
                                            <a href="/user/{{$user->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('APAKAH ANDA YAKIN ?')"><i class="fa fa-warning">Hapus</i></a></th>
                                            <th></th>
                                        </tr>
                                        @endforeach
										</tbody>
									</table>
								</div>
							</div>
                    </div>
                </div>
            </div>
            <!-- Modal tambah data user -->
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Prajurit</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                    <div class="modal-body">
                        <form action="user/create" method="POST" >
                        @csrf                    
                        <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="inputnama" class="form-label">Nama</label>
                                        <input name="name" type="text" class="form-control" id="name" aria-describedby="name" placeholder='Masukan Nama'value="" required>
                                    </div><br>
                                    <div class="mb-3">
                                        <label for="pilihrole" class="form-label" >Jenis Role</label>
                                            <select name="role" class="form-control" id="role" required>
                                                <option value="admin">ADMIN</option>
                                                <option value="penilai">PENILAI</option>
                                            </select>
                                    </div><br>
                                    <div class="mb-3">
                                        <label for="inputemail" class="form-label">Email</label>
                                        <input name="email"type="text" class="form-control" id="email" aria-describedby="email" placeholder='Masukan Email'value="" required>
                                    </div><br>
                                    <div class="mb-3">
                                        <label for="inputpassword" class="form-label">Password</label>
                                        <input name="password"type="password" class="form-control" id="password" aria-describedby="password" placeholder='Masukan Password'value="" required>
                                    </div><br>
                    </div><br>

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
      <!-- Modal edit data user -->
    <div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Prajurit</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        

                    <div class="modal-body">
                        <form action="/user/{{$user->id}}/update" method="POST" >
                        @csrf                    
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputnama" class="form-label">Nama</label>
                                    <input name="name" type="text" class="form-control" id="name" aria-describedby="name" placeholder='Masukan Nama'value="{{$user->name}}" required>
                                </div><br>
                                <div class="mb-3">
                                    <label for="pilihrole" class="form-label" >Jenis Role</label>
                                        <select name="role" class="form-control" id="role" required>
                                            <option value="admin"@if($user->role == 'admin') selected @endif>ADMIN</option>
                                            <option  value="penilai"@if($user->role == 'penilai') selected @endif>PENILAI</option>
                                        </select>
                                </div><br>
                                <div class="mb-3">
                                    <label for="inputemail" class="form-label">Email</label>
                                    <input name="email"type="text" class="form-control" id="email" aria-describedby="email" placeholder='Masukan Email'value="{{$user->email}}" required>
                                </div><br>
                                <div class="mb-3">
                                        <label for="inputpassword" class="form-label">Password</label>
                                        <input name="password"type="password" class="form-control" id="password" aria-describedby="password" placeholder='Masukan Password'value="" required>
                               </div>
                               <br>
                               <br>
                    

                        
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        </form>
                        </div>
                        
                    
                    
                    
                    </div>
                    
                </div>
        </div>
    </div>

@stop
