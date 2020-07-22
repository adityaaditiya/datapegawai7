<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        //
        $pegawai = Pegawai::all();
        // $response = [];
        return response()->json($pegawai, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tempat' => 'required',
            'tanggal' => 'required',
            'jabatan' => 'required',
            'status_menikah' => 'required',
            'agama' => 'required'
        ];

        $messages = [
            'required' => 'Bidang :attribute tidak boleh kosong!',
            'max' => 'File yang diunggah maksimal :max'
        ];

        
        $this->validate($request,$rules,$messages);
        $pegawai = Pegawai::create([
            'user_id' => auth()->user()->id,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat' => $request->tempat,
            'tanggal' => $request->tanggal,
            'jabatan' => $request->jabatan,
            'status_menikah' => $request->status_menikah,
            'agama' => $request->agama
        ]);
        $response = ['status' => 200, 'pegawai' => $pegawai];
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        //
        $response = ['status' => 200, 'Pegawai' => $pegawai];
        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        //
        $rules = [
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tempat' => 'required',
            'tanggal' => 'required',
            'jabatan' => 'required',
            'status_menikah' => 'required',
            'agama' => 'required'
        ];

        $messages = [
            'required' => 'Bidang :attribute tidak boleh kosong!',
            'max' => 'File yang diunggah maksimal :max'
        ];

        
        $this->validate($request,$rules,$messages);
        $pegawai = Pegawai::findOrFail($pegawai->id);

        $pegawai->update([

            'user_id' => auth()->user()->id,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat' => $request->tempat,
            'tanggal' => $request->tanggal,
            'jabatan' => $request->jabatan,
            'status_menikah' => $request->status_menikah,
            'agama' => $request->agama
        ]);

        $response = ['status' => 200, 'pegawai' => $pegawai];
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        //
        $terhapus = $pegawai;
        $pegawai = Pegawai::findOrFail($pegawai->id);
        $pegawai->delete();
        $response = ['status' => 200, 'Terhapus' => $pegawai];
        return response()->json($response);
    }
}
