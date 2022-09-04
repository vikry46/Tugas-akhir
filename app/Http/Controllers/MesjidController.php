<?php

namespace App\Http\Controllers;

use App\Models\Mesjid;
use App\Models\Pengurus;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MesjidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $AziziShafaaAsadel = Mesjid::all();
        $sumPemasukan =  DB::table('mesjids')->sum('pemasukan');
        $sumPengeluaran =  DB::table('mesjids')->sum('pengeluaran');
        $jumlah = $sumPemasukan -  $sumPengeluaran;
        return view('keuangan.mesjid.index',compact('AziziShafaaAsadel', 'sumPengeluaran','sumPemasukan','jumlah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keuangan.mesjid.create',[
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
        
        Mesjid::create([
            'tgl' =>  $request->tgl,
            'id_pengurus' =>  $request->id_pengurus,
            'pemasukan' =>  $request->pemasukan,
            'pengeluaran' =>  $request->pengeluaran,
            'keterangan' =>  $request->keterangan,
        ]);
        return redirect()->route('mesjid.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mesjid  $mesjid
     * @return \Illuminate\Http\Response
     */
    public function show(Mesjid $mesjid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mesjid  $mesjid
     * @return \Illuminate\Http\Response
     */
    public function edit(Mesjid $mesjid)
    {
        return view('keuangan.mesjid.edit',[
            'jinan' => $mesjid,
            'marsha' => Pengurus::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mesjid  $mesjid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mesjid $mesjid)
    {
        $request->validate([
            'tgl'=>'required',

        ],[
            'tgl'.'required'=>'Tanggal Wajib di Isi',
        ]);
        Mesjid::where('id',$mesjid->id)->update([
            'tgl' =>  $request->tgl,
            'id_pengurus' =>  $request->id_pengurus,
            'pemasukan' =>  $request->pemasukan,
            'pengeluaran' =>  $request->pengeluaran,
            'keterangan' =>  $request->keterangan,   
        ]);
        return redirect()->route('mesjid.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mesjid  $mesjid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mesjid $mesjid)
    {
        Mesjid::destroy($mesjid->id);
        return redirect()->route('sosial.index');
    }
}
