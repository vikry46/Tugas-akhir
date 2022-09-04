<?php

namespace App\Http\Controllers;

use App\Models\Sosial;
use App\Models\Pengurus;
use Illuminate\Support\Facades\DB;
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
        $sumPemasukan =  DB::table('sosials')->sum('pemasukan');
        $sumPengeluaran =  DB::table('sosials')->sum('pengeluaran');
        $jumlah = $sumPemasukan -  $sumPengeluaran;
        return view('keuangan.sosial.index',compact('MertuaOmJamaah', 'sumPengeluaran','sumPemasukan','jumlah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keuangan.sosial.create',[
            'pengurus' => Pengurus::all(),
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
        return redirect()->route('sosial.index');
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
        return view('keuangan.sosial.edit',[
            'sosial' => $sosial,
            'pengurus' => Pengurus::all(),
        ]);
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
        $request->validate([
            'tgl'=>'required',

        ],[
            'tgl'.'required'=>'Tanggal Wajib di Isi',
        ]);
        Sosial::where('id',$sosial->id)->update([
            'tgl' =>  $request->tgl,
            'id_pengurus' =>  $request->id_pengurus,
            'pemasukan' =>  $request->pemasukan,
            'pengeluaran' =>  $request->pengeluaran,
            'keterangan' =>  $request->keterangan,   
        ]);
        return redirect()->route('sosial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sosial  $sosial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sosial $sosial)
    {
        Sosial::destroy($sosial->id);
        return redirect()->route('sosial.index');
    }
}
