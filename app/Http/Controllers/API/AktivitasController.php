<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Aktivitas;
use Illuminate\Http\Request;

class AktivitasController extends Controller
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
        $aktivitas = Aktivitas::all();
        // $response = [];
        return response()->json($aktivitas, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'nama' => 'required'
            
        ];

        $messages = [
            'required' => 'Bidang :attribute tidak boleh kosong!',
            'max' => 'File yang diunggah maksimal :max'
        ];

        

       
        // $tanggal = date('d M Y', strtotime($request->tanggal));

        // $ttl = $request->tempat.' '.$tanggal;
        // dd($ttl);

        $this->validate($request,$rules,$messages);
        $aktivitas = Aktivitas::create([
            'kode_id' => $request->kode_id,
            'nama' => $request->nama
            
        ]);

        $response = ['status' => 200, 'Aktivitas' => $aktivitas];
        return response()->json($response);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Aktivitas $aktivitas)
    {
        $response = ['status' => 200, 'Aktivitas' => $aktivitas];
        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aktivitas $aktivitas)
    {
         $rules = [
            'kode_id' => 'required',
            'nama' => 'required'
            
        ];

        $messages = [
            'required' => 'Bidang :attribute tidak boleh kosong!',
            'max' => 'File yang diunggah maksimal :max'
        ];

        

       
        // $tanggal = date('d M Y', strtotime($request->tanggal));

        // $ttl = $request->tempat.' '.$tanggal;
        // dd($ttl);

        $this->validate($request,$rules,$messages);
        $aktivitas = Aktivitas::findOrFail($aktivitas->id);

        $aktivitas->update([
            'kode_id' => $request->kode_id,
            'nama' => $request->nama
            
        ]);

        $response = ['status' => 200, 'Aktivitas' => $aktivitas];
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aktivitas $aktivitas)
    {
        $terhapus = $aktivitas;
        $aktivitas = Aktivitas::findOrFail($aktivitas->id);
        $aktivitas->delete();
        $response = ['status' => 200, 'Terhapus' => $aktivitas];
        return response()->json($response);
    }
}
