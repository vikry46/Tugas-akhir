<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Lacon;
use App\Models\Jeniskegiatan;
use App\Models\Pengurus;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $kegiatans = Kegiatan::all();

        if($request->ajax()) {

    
            $data = Kegiatan::whereDate('tgl_mulai', '>=', $request->start)

                      ->whereDate('tgl_selesai',   '<=', $request->end)

                      ->get(['id', 'nama', 'tgl_mulai', 'tgl_selesai']);


            return response()->json($data);

       }

        return view('kegiatan.index', compact('kegiatans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('kegiatan.create',[
            'lacon'=> Lacon::all(),   
            'jeniskegiatan'=> Jeniskegiatan::all(),   
            'pengurus'=> Pengurus::all(),   
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'nama' => 'required',
            'id_jenis_kegiatan' => 'required',
            'id_lacon' => 'required',
            'id_penceramah' => 'required',
            'id_pengurus' => 'required',
            'keterangan' => 'required',
        ],[
            'tgl_mulai.required' => 'Wajib Diisi',
            'tgl_selesai.required' => 'Wajib Diisi',
            'nama.required' => 'Wajib Diisi',
            'id_jenis_kegiatan.required' => 'Wajib Diisi',
            'id_lacon.required' => 'Wajib Diisi',
            'id_penceramah.required' => 'Wajib Diisi',
            'id_pengurus.required' => 'Wajib Diisi',
            'keterangan.required' => 'Wajib Diisi',
        ]);

        Kegiatan::create($validatedData);
        return redirect()->route('kegiatan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kegiatan $kegiatan)
    {
        //
    }

        /**

     * Write code on Method

     *

     * @return response()

     */

    public function ajax(Request $request)

    {

        switch ($request->type) {

           case 'add':

              $event = Kegiatan::create([

                'nama' => $request->nama,

                'id_jenis_kegiatan' => 1,

                'id_lacon' => 1,

                'id_penceramah' => 1,

                'id_pengurus' => 1,

                'keterangan' => $request->keterangan,

                'tgl_mulai' => $request->tgl_mulai,

                'tgl_selesai' => $request->tgl_selesai,

              ]);

 

              return response()->json($event);

             break;

  

           case 'update':

              $event = Kegiatan::find($request->id)->update([

                'nama' => $request->nama,

                'id_jenis_kegiatan' => 1,

                `id_lacon` => 1,

                `id_penceramah` => 1,

                'tgl_mulai' => $request->tgl_mulai,

                'tgl_selesai' => $request->tgl_selesai,

              ]);

 

              return response()->json($event);

             break;

  

           case 'delete':

              $event = Kegiatan::find($request->id)->delete();

  

              return response()->json($event);

             break;

             

           default:

             # code...

             break;

        }

    }

    public function singleKegiatan(Request $request){

        $kegiatan = Kegiatan::with(['lacon', 'penceramah', 'jeniskegiatan', 'pengurus'])->where('id', $request->id)->first();

        return response()->json($kegiatan);

    }
}
