<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Models\Produksi;

class ProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_produksi = DB::table('produksi')->get();
        return view('produksi.index', compact('ar_produksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produksi.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('produksi')->insert(
            [
                'nama'=>$request->nama,
                'email'=>$request->email,
                'alamat'=>$request->alamat,
                'hp'=>$request->hp,
                'foto'=>$request->foto,
            ]
        );
        return redirect('/produksi');

        // if (!empty($request->foto)) {
        //     $request->validate(
        //         ['foto'=>'image|mimes:jpg,jpeg,png|max:2048']
        //     );
        //     $filename = $request->nama.'.'.$request->foto->extension();
        //     $request->foto->move(public_path('images'),$filename);
        // }
        // else {
        //     $filename = '';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ar_produksi = DB::table('produksi')
                        ->where('id', '=', $id)->get();
        return view('produksi.show',compact('ar_produksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('produksi')
                        ->where('id', '=', $id)->get();
        return view('produksi.form_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('produksi')->where('id', '=', $id)->update(
            [
                'nama'=>$request->nama,
                'email'=>$request->email,
                'alamat'=>$request->alamat,
                'hp'=>$request->hp,
                'foto'=>$request->foto,
            ]
        );
        //2.landing page
        return redirect('/produksi'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('produksi')->where('id', $id)->delete();
        return redirect('/produksi');
    }
}
