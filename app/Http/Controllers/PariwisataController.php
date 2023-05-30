<?php

namespace App\Http\Controllers;

use App\Models\Pariwisata;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePariwisataRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePariwisataRequest;
use Illuminate\Support\Facades\Storage;

class PariwisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pariwisata = DB::select('select * from pariwisatas');
        // return $pariwisata;
        return view('pariwisata.index', [
            'title' => 'Pariwisata',
            'pariwisatas' => $pariwisata
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pariwisata.create',[
            'title' => 'Create Pariwisata'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePariwisataRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request;
        $request->validate([
            'nama_tempat'   => 'required | max:70 ',
            'deskripsi'     => 'required',
            'alamat'        => 'required',
            'image'         => 'required |image'
        ]);

        $nama_tempat   = $request->nama_tempat;
        $deskripsi     = $request->deskripsi;
        $alamat        = $request->deskripsi;
        $image         = $request->file('image')->store('post-image');

        $sql = "insert into pariwisatas (nama_tempat,deskripsi,alamat,image) values (?,?,?,?)";

        DB::insert($sql,[$nama_tempat,$deskripsi,$alamat,$image]);
      

        return redirect('/pariwisata')->with('success', 'Berhasil menambahkan Pariwisata!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pariwisata  $pariwisata
     * @return \Illuminate\Http\Response
     */
    public function show(Pariwisata $pariwisata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pariwisata  $pariwisata
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $pariwisatas = DB::select('select * from pariwisatas where id ='. $id);
        $pariwisata = $pariwisatas[0];
        
        return view('pariwisata.edit',[
            'title' => 'edit '.$pariwisata->nama_tempat,
            'pariwisata' => $pariwisata,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePariwisataRequest  $request
     * @param  \App\Models\Pariwisata  $pariwisata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        if($request->image){
        $request->validate([
            'nama_tempat'   => 'required | max:70 ',
            'deskripsi'     => 'required',
            'alamat'        => 'required',
            'image'         => 'required |image'
        ]);
        $nama_tempat   = $request->nama_tempat;
        $deskripsi     = $request->deskripsi;
        $alamat        = $request->deskripsi;
        $image         = $request->file('image')->store('post-image');
        }   
        $request->validate([
            'nama_tempat'   => 'required | max:70 ',
            'deskripsi'     => 'required',
            'alamat'        => 'required',
        ]);

        $nama_tempat   = $request->nama_tempat;
        $deskripsi     = $request->deskripsi;
        $alamat        = $request->deskripsi;
        

        if($request->image){
            $sql = "update pariwisatas set nama_tempat=?,deskripsi=?,alamat=?,image=? where id=?";
        DB::update($sql,[$nama_tempat,$deskripsi,$alamat,$image,$id]);
        }


        $sql = "update pariwisatas set nama_tempat=?,deskripsi=?,alamat=? where id=?";
        DB::update($sql,[$nama_tempat,$deskripsi,$alamat,$id]);
      

        return redirect('/pariwisata')->with('success', 'Berhasil mengedit Pariwisata!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pariwisata  $pariwisata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pariwisata $pariwisata, $id)
    {
        
        if($pariwisata->image){
            Storage::delete($pariwisata->image);
        }
        
        DB::delete('delete from pariwisatas where id='.$id);
        return redirect('/pariwisata')->with('success', 'Berhasil menghapus pariwisata!');
    }
}
