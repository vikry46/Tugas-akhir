<?php

namespace App\Http\Controllers;

use App\Models\Yatim;
use App\Models\Pengurus;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class YatimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ShaniaGracia = Yatim::all();
        $sumPemasukan =  DB::table('yatims')->sum('pemasukan');
        $sumPengeluaran =  DB::table('yatims')->sum('pengeluaran');
        $jumlah = $sumPemasukan -  $sumPengeluaran;
        return view('keuangan.yatim.index',compact('ShaniaGracia', 'sumPengeluaran','sumPemasukan','jumlah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keuangan.yatim.create',[
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
        
        Yatim::create([
            'tgl' =>  $request->tgl,
            'id_pengurus' =>  $request->id_pengurus,
            'pemasukan' =>  $request->pemasukan,
            'pengeluaran' =>  $request->pengeluaran,
            'keterangan' =>  $request->keterangan,
        ]);
        return redirect()->route('yatim.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Yatim  $yatim
     * @return \Illuminate\Http\Response
     */
    public function show(Yatim $yatim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Yatim  $yatim
     * @return \Illuminate\Http\Response
     */
    public function edit(Yatim $yatim)
    {
        return view('keuangan.yatim.edit',[
            'jinan' => $yatim,
            'marsha' => Pengurus::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Yatim  $yatim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Yatim $yatim)
    {
        $request->validate([
            'tgl'=>'required',

        ],[
            'tgl'.'required'=>'Tanggal Wajib di Isi',
        ]);
        Yatim::where('id',$yatim->id)->update([
            'tgl' =>  $request->tgl,
            'id_pengurus' =>  $request->id_pengurus,
            'pemasukan' =>  $request->pemasukan,
            'pengeluaran' =>  $request->pengeluaran,
            'keterangan' =>  $request->keterangan,   
        ]);
        return redirect()->route('yatim.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Yatim  $yatim
     * @return \Illuminate\Http\Response
     */
    public function destroy(Yatim $yatim)
    {
        Yatim::destroy($yatim->id);
        return redirect()->route('yatim.index');
    }
}
