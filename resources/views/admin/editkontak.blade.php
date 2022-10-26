@extends('admin.app')
@section('rpl','editkontak')
@section('title','editkontak')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-wight-bold text-primary">Data Siswa</h6>
            </div>
                <div class="card-body">
                    @if (count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('masterkontak.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="desc_kntk">Deskripsi</label>
                            <input type="text" class="form-control" id="desc_kntk" name="desc_kntk" value ="{{old('desc_kntk')}}"required>
                            </div>
                            <div class="form-group">
                                <label for="id_jns">Jenis Kontak</label>
                                <select type="multiple" class="form-control form-select" id="id_jns" name="id_jns" required>
                                    @foreach($data as $item )
                                    <option value="{{$item->id}}" selected>{{$item->jenis}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_siswa">Siswa</label>
                                <select type="multiple" class="form-control form-select" id="id_siswa" name="id_siswa" required>
                                @foreach($data1 as $item )
                                    <option value="{{$item->id}}" selected>{{$item->nama}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Add">
                                <a href="{{route('masterkontak.index')}}" class="btn btn-danger">Batal</a>
                            </div>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection