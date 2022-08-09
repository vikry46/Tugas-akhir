<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zoya = Pengurus::all();
        return view('pengurus.index',compact('zoya'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = Jabatan::all();
        return view('pengurus.tambah',compact('jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $zoya = $request->validate([
              'kode'=>'required',
              'id_jabatan'=>'required',
              'nama'=>'required',
              'jk'=>'required',
              'umur'=>'required',
              'no_hp'=>'required',
              'image'=> 'image|file|max:10240',
        ],[
            'kode'.'required'=>'Kode Wajib di Isi',
            'id_jabatan'.'required'=>'id_jabatan Wajib di Isi',
            'nama'.'required'=>'Nama Wajib di Isi',
            'jk'.'required'=>'jenis_kelamin Wajib di Isi',
            'umur'.'required'=>'umur Wajib di Isi',
            'no_hp'.'required'=>'umur Wajib di Isi',
            'image'.'required'=>'foto Wajib di Isi'
         ]);
         if($request->file('image')){
            $zoya['image']= $request->file('image')->store('image');
        }

         Pengurus::create($zoya);
         return redirect()->route('pengurus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function show(Pengurus $pengurus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengurus $penguru)
    {
        return view('pengurus.edit', [
            'pengurus' => $penguru,
            'jabatan' => Jabatan::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengurus $penguru)
    {
        $fanjul = $request -> validate([
            'kode'=>'required',
            'id_jabatan'=>'required',
            'nama'=>'required',
            'jk'=>'required',
            'umur'=>'required',
            'no_hp'=>'required',
            'image'=> 'image|file|max:10240',
        ],[
            'kode'.'required'=>'Kode Wajib di Isi',
            'id_jabatan'.'required'=>'id_jabatan Wajib di Isi',
            'nama'.'required'=>'Nama Wajib di Isi',
            'jk'.'required'=>'jenis_kelamin Wajib di Isi',
            'umur'.'required'=>'umur Wajib di Isi',
            'no_hp'.'required'=>'umur Wajib di Isi',
            'image'.'required'=>'foto Wajib di Isi'
        ]);
        $pengurus->update($fanjul);
        return redirect()->route('pengurus.index');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengurus $pengurus)
    {
        //
    }
}
