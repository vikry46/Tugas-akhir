<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        return view('pengurus.tambah',[
            'jabatan' => Jabatan::all(),
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
    // public function select(Request $request)
    // {
    // $shani = Jabatan::select('id','nama_kategori')->limit(5);
    // if($request->has('q')){
    //     $shani->where('nama_kategori', 'LIKE', "%{$request->q}%");
    // }
    // return response()->json($shani->get());
    // }
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
        $validatedData = $request -> validate([
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
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            // $zoya['image']= $request->file('image')->store('image');
            $validatedData['image'] = $request->file('image')->store('image');
        }

        Pengurus::where('id', $penguru->id)->update($validatedData);
        return redirect()->route('pengurus.index');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengurus $penguru)
    {
        if($penguru->image){
            Storage::delete($penguru->image);
        }

        Pengurus::destroy($penguru->id);
        return redirect()->route('pengurus.index');
    }
}
