<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use DB;
use App\Models\Film;
use PDF;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_film = DB::table('film')
                ->join('sutradara', 'sutradara.id', '=', 'film.sutradara_id')
                ->join('produksi', 'produksi.id', '=', 'film.produksi_id')
                ->join('genre', 'genre.id', '=', 'film.genre_id')
                ->select('film.*', 'sutradara.nama AS sut', 'produksi.nama AS pro',
                        'genre.nama AS gen')
                ->get();
        return view('film.index', compact('ar_film'));
    }

    public function filmPDF()
    {
        $ar_film = DB::table('film')
                ->join('sutradara', 'sutradara.id', '=', 'film.sutradara_id')
                ->join('produksi', 'produksi.id', '=', 'film.produksi_id')
                ->join('genre', 'genre.id', '=', 'film.genre_id')
                ->select('film.*', 'sutradara.nama AS sut', 'produksi.nama AS pro',
                        'genre.nama AS gen')
                ->get();

        $pdf = PDF::loadView('film.daftarFilm', ['ar_film'=>$ar_film]);

        return $pdf->download('daftarFilm.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('film.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!empty($request->gambar)) {
            $request->validate(
                ['gambar'=>'image|mimes:png,jpg|max:2048']
            );
            $fileName = $request->nama.'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images'),$fileName);
        } else {
            $fileName = '';
        }

        DB::table('film')->insert(
            [
                'title'=>$request->title,
                'sinopsis'=>$request->sinopsis,
                'rating'=>$request->rating,
                'durasi'=>$request->durasi,
                'tahun'=>$request->tahun,
                'produksi_id'=>$request->produksi_id,
                'sutradara_id'=>$request->sutradara_id,
                'genre_id'=>$request->genre_id,
                'gambar'=>$fileName,
            ]
            );
            return redirect('/film');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ar_film = DB::table('film')
        ->join('sutradara', 'sutradara.id', '=', 'film.sutradara_id')
                ->join('produksi', 'produksi.id', '=', 'film.produksi_id')
                ->join('genre', 'genre.id', '=', 'film.genre_id')
                ->select('film.*', 'sutradara.nama', 'produksi.nama AS pro',
                        'genre.nama AS gen')
                ->where('film.id', '=', $id)->get();
            return view('film.show',compact('ar_film'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data = DB::table('film')
                        ->where('id', '=', $id)->get();
        return view('film.form_edit',compact('data'));
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
        if (!empty($request->gambar)) {
            $request->validate(
                ['gambar'=>'image|mimes:png,jpg|max:2048']
            );
            $fileName = $request->nama.'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images'),$fileName);
        } else {
            $fileName = '';
        }
        DB::table('film')->where('id', '=', $id)->update(
            [
                'title'=>$request->title,
                'sinopsis'=>$request->sinopsis,
                'rating'=>$request->rating,
                'durasi'=>$request->durasi,
                'tahun'=>$request->tahun,
                'produksi_id'=>$request->produksi_id,
                'sutradara_id'=>$request->sutradara_id,
                'genre_id'=>$request->genre_id,
                'cover'=>$fileName,
            ]
        );
        //2.landing page
        return redirect('/film'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('film')->where('id', $id)->delete();
        return redirect('/film');
    }

    public function generatePDF()
    {
        $data = [
            'title' => 'Welcome to Ext Generate PDF',
            'date' => date('m/d/Y')
        ];

        $pdf = PDF::loadView('film.myPDF', $data);

        return $pdf->download('tesPDF.pdf');
    }
}
