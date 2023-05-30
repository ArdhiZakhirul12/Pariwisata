<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use App\Http\Requests\StoreUlasanRequest;
use App\Http\Requests\UpdateUlasanRequest;
use App\Models\Pariwisata;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('ulasan.create',[
            'title' => 'Create Ulasan',
            'id'    => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUlasanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'ulasan'   => 'required',            
        ]);

        $ulasan   = $request->ulasan;
        $pariwisata = $request->id;
        $rating = $request->rating;

        $sql = "insert into ulasans (ulasan,pariwisata_id,rating) values (?,?,?)";
        DB::insert($sql,[$ulasan,$pariwisata,$rating]);
      

        return redirect('/home/'.$pariwisata)->with('success', 'Berhasil menambahkan ulasan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ulasan  $ulasan
     * @return \Illuminate\Http\Response
     */
    public function show(Ulasan $ulasan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ulasan  $ulasan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $ulasan = DB::select('select * from ulasans where id ='. $id);
        $ulasan = $ulasan[0];
        
        return view('ulasan.edit',[
            'title' => 'edit ulasan',
            'ulasan' => $ulasan,
            // 'id' => $id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUlasanRequest  $request
     * @param  \App\Models\Ulasan  $ulasan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ulasan'   => 'required',            
        ]);

        $ulasan   = $request->ulasan;
        $pariwisata = $request->pariwisata;
        $rating = $request->rating;

        $sql = "update ulasans set pariwisata_id=?,ulasan=?,rating=? where id=?";

        DB::update($sql,[$pariwisata,$ulasan,$rating,$id]);
        return redirect('/home/'.$pariwisata)->with('success', 'Berhasil mengedit ulasan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ulasan  $ulasan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        
        DB::delete('delete from ulasans where id='.$id);
        return redirect('/home')->with('success', 'Berhasil menghapus ulasans!');
    }
}
