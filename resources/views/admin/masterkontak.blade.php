@extends('admin.app')
@section('title','masterkontak')
@section('content')
<a href="{{route('kontak.create')}}" class="btn btn-success">+</a>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-wight-bold text-primary">Data Siswa</h6>
            </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <thead>
                                <th scope="col">No.</th>
                                <th scope="col">Nama</th>
                                <!-- <th scope="col">Alamat</th> -->
                                <th scope="col">Deskripsi Kontak</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                <?php //$i = 1; ?>
                                @foreach($data as $i => $item)
                                <tr>
                                    <th scope="row">{{++$i}}</th>
                                    <td scope="row">{{$item->siswa->nama}}</td>
                                    <td scope="row">{{$item->desc_kntk}}</td>
                                    <td>
                                        <a href="{{route('masterkontak.show', $item->id)}}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-info-circle"></i></a>
                                        <a href="{{route('masterkontak.edit', $item->id)}}" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="{{route('masterkontak.destroy', $item->id)}}" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </tr>
                    </table>
                </div>
        </div>
    </div>
</div>
@endsection