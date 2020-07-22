<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use Storage;
use DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
        $this->Pegawai = new Pegawai;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getData(Request $request){
        $data = $this->Pegawai->getData();
        return \DataTables::of($data)->addIndexColumn()
            ->addColumn('Actions', function($data){
                return '
                <form action="'. url('pegawai/'.$data->id).'" method="post" class="sa-remove" id="data-'. $data->id.'">
                    '.csrf_field().'<input type="hidden" name="_method" value="DELETE">
                    <a href="' . url('pegawai/'.$data->id) .'"Y class="btn btn-info btn-sm"><i class="fa fa-eye"></i><span>&nbsp;Show</span></a>
                    <a href="'.url('pegawai/'.$data->id.'/edit').'" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i><span>&nbsp;Edit</span></a>
                    <button onclick="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                </form>
                    ';
            })
            ->rawColumns(['Actions'])
            ->make(true);
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $rules = [
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tempat' => 'required',
            'tanggal' => 'required',
            'jabatan' => 'required',
            'status_menikah' => 'required',
            'agama' => 'required',
            'foto' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
            'pdf' => 'required|mimes:pdf|max:2048',
        ];

        $messages = [
            'required' => 'Bidang :attribute tidak boleh kosong!',
            'mimes' => 'File yang diunggah harus berformat :values',
            'max' => 'File yang diunggah maksimal :max'
        ];

        
        $this->validate($request,$rules,$messages);

        $foto = $request->file('foto')->store('foto_pegawai');

        $pdf = $request->file('pdf')->store('pdf_pegawai');
        // $tanggal = date('d M Y', strtotime($request->tanggal));

        // $ttl = $request->tempat.' '.$tanggal;
        // dd($ttl);

        $pegawai = Pegawai::create([
            'user_id' => $request->user_id,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat' => $request->tempat,
            'tanggal' => $request->tanggal,
            'jabatan' => $request->jabatan,
            'status_menikah' => $request->status_menikah,
            'agama' => $request->agama,
            'photo' => $foto,
            'file' => $pdf
        ]);

        return redirect()->route('home');
    }

    public function destroy($pegawai){
        $pegawai = Pegawai::findOrFail($pegawai);
        $foto = $pegawai->photo;
        $pdf = $pegawai->file;

        if(Storage::exists($foto)){
            Storage::delete($foto);
        }

        if(Storage::exists($pdf)){
            Storage::delete($pdf);
        }

        $pegawai->delete();

        return redirect()->route('home');
    }

    public function edit($pegawai){
        $pegawais = Pegawai::find($pegawai);

        return view('edit', compact('pegawais'));
    }

    public function update($pegawai, Request $request){
        $rules = [
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tempat' => 'required',
            'tanggal' => 'required',
            'jabatan' => 'required',
            'status_menikah' => 'required',
            'agama' => 'required',
            'foto' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
            'pdf' => 'mimes:pdf|max:2048',
        ];

        $messages = [
            'required' => 'Bidang :attribute tidak boleh kosong!',
            'mimes' => 'File yang diunggah harus berformat :values',
            'max' => 'File yang diunggah maksimal :max'
        ];

        
        $this->validate($request,$rules,$messages);

        $pegawai = Pegawai::findOrFail($pegawai);

        $foto = $pegawai->photo;
        $pdf = $pegawai->file;

        if($request->foto){
            $foto = $request->file('foto')->store('foto_pegawai');
            $foto_path = $pegawai->photo;
            if(Storage::exists($foto_path)){
                Storage::delete($foto_path);
            }
        }

        if($request->pdf){
            $pdf = $request->file('pdf')->store('pdf_pegawai');
            $pdf_path = $pegawai->file;
            if(Storage::exists($pdf_path)){
                Storage::delete($pdf_path);
            }
        }
        $pegawai->update([

            'user_id' => $request->user_id,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat' => $request->tempat,
            'tanggal' => $request->tanggal,
            'jabatan' => $request->jabatan,
            'status_menikah' => $request->status_menikah,
            'agama' => $request->agama,
            'photo' => $foto,
            'file' => $pdf
        ]);
        return redirect()->route('home');
    }

    public function show($pegawai){
        $pegawais = Pegawai::find($pegawai);

        return view('show', compact('pegawais'));
    }
}
