<?php

namespace App\Http\Controllers;

use App\Models\Jeniskegiatan;
use Illuminate\Http\Request;

class JeniskegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deldel = Jeniskegiatan::all();
        return view('JenisKegiatan.index',compact('deldel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('JenisKegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $deldel = $request->validate([
            'jenis_kegiatan'=>'required',
        ],[
            'jenis_kegiatan'.'required'=>'Jenis Kegiatan Wajib di Isi',
        ]);
        Jeniskegiatan::create($deldel);
        return redirect()->route('jeniskegiatan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jeniskegiatan  $jeniskegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jeniskegiatan $jeniskegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jeniskegiatan  $jeniskegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jeniskegiatan $jeniskegiatan)
    {
        return view('JenisKegiatan.edit',[
            'deldel'  => $jeniskegiatan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jeniskegiatan  $jeniskegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jeniskegiatan $jeniskegiatan)
    {
         $request->validate([
            'jenis_kegiatan'=>'required',
        ],[
            'jenis_kegiatan'.'required'=>'Jenis Kegiatan Wajib di Isi',
        ]);
        Jeniskegiatan::where('id',$jeniskegiatan->id)->update([
            'jenis_kegiatan'=>$request->jenis_kegiatan,
        ]);
        return redirect()->route('jeniskegiatan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jeniskegiatan  $jeniskegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jeniskegiatan $jeniskegiatan)
    {
        Jeniskegiatan::destroy($jeniskegiatan->id);
        return redirect()->route('jeniskegiatan.index');
    }
}
