<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Models\Sutradara;

class SutradaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_sutradara = DB::table('sutradara')->get();
        return view('sutradara.index', compact('ar_sutradara'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sutradara.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!empty($request->foto)) {
            $request->validate(
                ['foto'=>'image|mimes:png,jpg|max:2048']
            );
            $fileName = $request->nama.'.'.$request->foto->extension();
            $request->foto->move(public_path('images'),$fileName);
        } else {
            $fileName = '';
        }

        DB::table('sutradara')->insert(
            [
                'nama'=>$request->nama,
                'jenis_kelamin'=>$request->jenis_kelamin,
                'umur'=>$request->umur,
                //'foto'=>$request->foto,
                'foto'=>$fileName,
            ]
        );
        return redirect('/sutradara');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ar_sutradara = DB::table('sutradara')
                        ->where('id', '=', $id)->get();
        return view('sutradara.show',compact('ar_sutradara'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('sutradara')
                        ->where('id', '=', $id)->get();
        return view('sutradara.form_edit',compact('data'));
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
        if (!empty($request->foto)) {
            $request->validate(
                ['foto'=>'image|mimes:png,jpg|max:2048']
            );
            $fileName = $request->nama.'.'.$request->foto->extension();
            $request->foto->move(public_path('images'),$fileName);
        } else {
            $fileName = '';
        }

        DB::table('sutradara')->where('id', '=', $id)->update(
            [
                'nama'=>$request->nama,
                'jenis_kelamin'=>$request->jenis_kelamin,
                'umur'=>$request->umur,
                //'foto'=>$request->foto,
                'foto'=>$fileName,
            ]
        );
        //2.landing page
        return redirect('/sutradara'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('sutradara')->where('id', $id)->delete();
        return redirect('/sutradara');
    }
}
