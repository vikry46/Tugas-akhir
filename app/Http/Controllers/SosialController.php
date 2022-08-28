<?php

namespace App\Http\Controllers;

use App\Models\Sosial;
use Illuminate\Http\Request;

class SosialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $MertuaOmJamaah = Sosial::all();
        return view('keuangan.sosial.index',compact('MertuaOmJamaah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keuangan.sosial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tgl'=>'required',

        ],[
            'tgl'.'required'=>'Tanggal Wajib di Isi',
        ]);
        
        Sosial::create([
            'tgl' =>  $request->tgl,
            'id_pengurus' =>  $request->id_pengurus,
            'pemasukan' =>  $request->pemasukan,
            'pengeluaran' =>  $request->pengeluaran,
            'keterangan' =>  $request->keterangan,
        ]);
        return redirect()->route('keuangan.sosial.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sosial  $sosial
     * @return \Illuminate\Http\Response
     */
    public function show(Sosial $sosial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sosial  $sosial
     * @return \Illuminate\Http\Response
     */
    public function edit(Sosial $sosial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sosial  $sosial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sosial $sosial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sosial  $sosial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sosial $sosial)
    {
        //
    }
}
