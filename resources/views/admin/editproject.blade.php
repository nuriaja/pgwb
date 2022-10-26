@extends('admin.app')
@section('rpl','editkontak')
@section('title','editkontak')
<div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6></div>
                <div class="card-body">
                   @if (count($errors) > 0)
                      <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>    
                    </div>
                   @endif 
                   <form method="POST" enctype="multipart/form-data" action="{{route('masterproject.update', $data->id) }}">
                   @csrf
                   {{method_field('PUT') }}
                   <div class="form-group">
                   <label for="id_siswa">ID SISWA</label>
                   <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                        value="{{ $data->siswa->nama}}"disabled>
                        <input type="hidden" name="nama" value="{{ $data->siswa->nama}}">
                        <input type="hidden" name="id_siswa" value="{{ $data->siswa->id}}"> 
                    </div>
                    <div class="form-group">
                        <label for="nama_project">Name Project</label>
                        <input type="text" class="form-control" id="nama_project" name="nama_project"  value="{{ $data->nama_project }}">
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control form-select" id="tangggal" name="tanggal"  value="{{ $data->tanggal }}">    
                    </div>   
                    <div class="form-group">
                    <label for="deskripsi">Deskripsi Project</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi"  value="{{ $data->deskripsi }}">
                    </div>
                    <div class="form-group">
                    <label for="foto">Foto</label>
                        <input type="file" class="form-control-file" id="foto" name="foto"  value="{{ $data->foto }}">
                        <img src="{{ asset('/template/img/'.$data->foto) }}" width="300" class="img-thumbnail">
                    <div class="form-group">  
                    </div>   
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Simpan">
                    <a href="{{route ('masterproject.index') }}" class="btn btn-danger">Batal</a> 
                </form>
            </div>
        </div>  
        @endsection