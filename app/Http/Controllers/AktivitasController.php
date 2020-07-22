<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aktivitas;
use Storage;
use DataTables;

class AktivitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {
        $this->middleware(['auth', 'verified']);
        $this->Aktivitas = new Aktivitas;
    }


    public function index()
    {
        return view('aktivitas.aktivitas');
    }

    public function getData(Request $request){
        $data = $this->Aktivitas->getData();
        return \DataTables::of($data)->addIndexColumn()
            ->addColumn('Actions', function($data){
                return '
                <form action="'. url('aktivitas/'.$data->id).'" method="post" class="sa-remove" id="data-'. $data->id.'">
                    '.csrf_field().'<input type="hidden" name="_method" value="DELETE">
                    <a href="' . url('aktivitas/'.$data->id) .'"Y class="btn btn-info btn-sm"><i class="fa fa-eye"></i><span>&nbsp;Show</span></a>
                    <a href="'.url('aktivitas/'.$data->id.'/edit').'" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i><span>&nbsp;Edit</span></a>
                    <button onclick="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                </form>
                    ';
            })
            ->rawColumns(['Actions'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('aktivitas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'kode_id' => 'required',
            'nama' => 'required',
            'foto' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
            'pdf' => 'required|mimes:pdf|max:2048',
        ];

        $messages = [
            'required' => 'Bidang :attribute tidak boleh kosong!',
            'mimes' => 'File yang diunggah harus berformat :values',
            'max' => 'File yang diunggah maksimal :max'
        ];

        
        $this->validate($request,$rules,$messages);

        $foto = $request->file('foto')->store('foto_aktivitas');

        $pdf = $request->file('pdf')->store('pdf_aktivitas');
        // $tanggal = date('d M Y', strtotime($request->tanggal));

        // $ttl = $request->tempat.' '.$tanggal;
        // dd($ttl);

        $aktivitas = Aktivitas::create([
            'kode_id' => $request->kode_id,
            'nama' => $request->nama,
            'photo' => $foto,
            'file' => $pdf
        ]);

        return redirect()->route('aktivitas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($aktivitas)
    {
        $aktivitass = Aktivitas::find($aktivitas);

        return view('aktivitas.edit', compact('aktivitass'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($aktivitas, Request $request)
    {
        $rules = [
            'kode_id' => 'required',
            'nama' => 'required',
            'foto' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
            'pdf' => 'required|mimes:pdf|max:2048',
        ];

        $messages = [
            'required' => 'Bidang :attribute tidak boleh kosong!',
            'mimes' => 'File yang diunggah harus berformat :values',
            'max' => 'File yang diunggah maksimal :max'
        ];

        
        $this->validate($request,$rules,$messages);
         $aktivitas = Aktivitas::findOrFail($aktivitas);

        $foto = $aktivitas->photo;
        $pdf = $aktivitas->file;

        if($request->foto){
            $foto = $request->file('foto')->store('foto_aktivitas');
            $foto_path = $aktivitas->photo;
            if(Storage::exists($foto_path)){
                Storage::delete($foto_path);
            }
        }

        if($request->pdf){
            $pdf = $request->file('pdf')->store('pdf_aktivitas');
            $pdf_path = $aktivitas->file;
            if(Storage::exists($pdf_path)){
                Storage::delete($pdf_path);
            }
        }
        $aktivitas->update([

            'kode_id' => $request->kode_id,
            'nama' => $request->nama,
            'photo' => $foto,
            'file' => $pdf
        ]);
        return redirect()->route('aktivitas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($aktivitas)
    {
        $aktivitas = Aktivitas::findOrFail($aktivitas);
        $foto = $aktivitas->photo;
        $pdf = $aktivitas->file;

        if(Storage::exists($foto)){
            Storage::delete($foto);
        }

        if(Storage::exists($pdf)){
            Storage::delete($pdf);
        }

        $aktivitas->delete();

        return redirect()->route('aktivitas');
    }

     public function show($aktivitas)
    {
        $aktivitass = Aktivitas::find($aktivitas);

        return view('aktivitas.show', compact('aktivitass'));
    }
}
