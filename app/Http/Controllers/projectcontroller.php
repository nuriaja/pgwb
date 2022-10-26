<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project;
use App\Models\Siswa;
class projectcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = project::all();
        $data1 = Siswa::all();
        return view('admin.masterproject', compact('data','data1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_siswa = request()->query('siswa');
        $siswa = Siswa::all();
        return view('admin.createproject', compact('siswa', 'id_siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required'=>':attribute minimal diisi dong kak',
            'min'=>':attribute minimal :min karakter lah ya',
            'max'=>':attribute maksimal :max karakter dong'
        ];

        $this->validate($request,[
            'id_siswa'=>'required',
            'nama_project'=>'required |min:5|max:20',
            'tanggal'=>'required',
            'deskripsi'=>'required',
            'foto'=>'required'
        ], $message);

        // ambil informasi yang diupload
        $file = $request->file('foto');

        // rename
        $nama_file = time()."_".$file->getClientOriginalName();

        // proses upload
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload, $nama_file);

        // proses insert Database
        project::create([
            'id_siswa'=> $request->id_siswa,
            'nama_project' => $request->nama_project,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'foto' =>$nama_file
        ]);

        return redirect('/project');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Siswa::find($id)->project()->get();
        return view('admin.showproject', compact('data'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=project::find($id);
        return view('admin.editproject', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $message = [
            'required'=>':attribute minimal diisi dong kak',
            'min'=>':attribute minimal :min karakter lah ya',
            'max'=>':attribute maksimal :max karakter dong'
        ];

        $this->validate($request,[
            'nama_project' => '$required|min:5|max:20',
            'tanggal' => $required,
            'deskripsi' => '$required',
            'foto' =>'mimes:jpg,jpeg,png,gif,svg'
        ], $message);

        if($request->foto !=''){
            //ganti foto

            // hapus foto lama
            $project=Project::find($id);
            file::delete('./template/img'.$project->foto);

            // ambil informasi yang diupload
            $file = $request->file('foto');

            //rename
            $nama_file = time()."_".$file->getClientOriginalName();

            // proses upload
            $tujuan_upload = './template/img';
            $file->move($tjuan_upload, $nama_file);

            // menyimpan ke database
            $project->nama_project=$request->nama_project;
            // $project->tanggal=$request->tanggal;
            $project->deskripsi=$request->deskripsi;
            $project->foto=$nama_file;
            $project->save();
            return redirect ('masterproject');

            }else{
                $project=Project::find($id);
                $project->nama__project=$request->nama_project;
                $project->deskripsi=$request->deskripsi;
                $project->update();
                return redirect('masterproject');
            }
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=project::destroy($id);
        return redirect('masterproject');
    }
}
