@if($data->isEmpty())
    <h6 class="text-center">Siswa belum memiliki project</h6>
@else
    @foreach ($data as $item)
    <div class="card">
        <div class="card-header">
            {{$item->nama_project}}
        </div>
        <div class="card-body">
            <img class="w-50" src="{{ asset('template/img/'.$item->foto) }}" alt="">
        </div>
        <div class="card-body">
            <h5>Judul</h5>
            {{$item->nama_project}}
            <h5>Tanggal Project</h5>
            {{$item->tanggal}}
            <h5>Deskripsi Project</h5>
            {{$item->deskripsi}}
        </div>
        <div class="card-footer">
            <a href="{{ route('project.show' , $item ->id) }}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-info-circle"></i></a>
            <a href="{{ route('project.edit' , $item ->id) }}"class="btn btn-warning btn-circle btn-sm"><i class="fas fa-plus"></i></a>
        </div>


 </div>
    @endforeach
@endif    