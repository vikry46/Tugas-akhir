<?php

namespace App\Http\Controllers;

use App\Models\Lacon;
use Illuminate\Http\Request;

class LaconController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lacon = Lacon::all(); 
        return view('lacon.index',compact('lacon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lacon.create');
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
            'nama'=>'required',
            'alamat'=>'required',
        ],[
            'nama'.'required'=>'Nama Wajib di Isi',
            'alamat'.'required'=>'Alamat Wajib di Isi',
        ]);

        Lacon::create([
            'nama'=> $request->nama,
            'alamat'=> $request->alamat,
            'keterangan'=> $request->keterangan,
        ]);
        return redirect()->route('lacon.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lacon  $lacon
     * @return \Illuminate\Http\Response
     */
    public function show(Lacon $lacon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lacon  $lacon
     * @return \Illuminate\Http\Response
     */
    public function edit(Lacon $lacon)
    {
        return view('lacon.edit',[
            'lacon' => $lacon,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lacon  $lacon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lacon $lacon)
    {
        $request->validate([
            'nama'=>'required',
            'alamat'=>'required',
        ],[
            'nama'.'required'=>'Nama Wajib di Isi',
            'alamat'.'required'=>'Alamat Wajib di Isi',
        ]);

        Lacon::where('id',$lacon->id)->update([
            'nama'=> $request->nama,
            'alamat'=> $request->alamat,
            'keterangan'=> $request->keterangan,
        ]);
        return redirect()->route('lacon.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lacon  $lacon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lacon $lacon)
    {
        Lacon::destroy($lacon->id);
        return redirect()->route('lacon.index');
    }
}
