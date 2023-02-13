<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tindakan;

class TindakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function laporan()
    {
        $no = 1; 
        $datas = Tindakan::orderBy('kd_tindakan')
                           ->paginate(10);
        return view ('tindakan.laporan', compact('datas', 'no'));
    }


    public function index(request $request)
    {
        $s = $request->s;
        $no = 1; 
        $datas = Tindakan::orderBy('kd_tindakan')
                          ->search($s)
                          ->paginate(10);
        return view ('tindakan.index', compact('datas', 'no', 's'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tindakan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah = new Tindakan;
        $tambah->nm_tindakan = $request->nm_tindakan;
        $tambah->harga = $request->harga;


        $tambah->save();

        return redirect('tindakan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Tindakan::where('kd_tindakan', $id) -> first();
        return view('tindakan.edit', compact('data'));
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
        $nm_tindakan = $request->nm_tindakan;
        $harga = $request->harga;

        Tindakan::where('kd_tindakan', $id)
          ->update([
              'nm_tindakan' => $nm_tindakan,
              'harga' => $harga
          ]);

          return redirect('tindakan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tindakan::where('kd_tindakan',$id)->delete();

        return redirect('tindakan');
    }
}
