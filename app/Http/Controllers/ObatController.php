<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Obat;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index(request $request)
    {
        $s = $request->s;
        $no = 1; 
        $datas = Obat::orderBy('kd_obat')
                          ->search($s)
                          ->paginate(10);
        return view ('obat.index', compact('datas', 'no', 's'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('obat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah = new Obat;
        $tambah->nm_obat = $request->nm_obat;
        $tambah->harga_modal = $request->harga_modal;
        $tambah->harga_jual = $request->harga_jual;
        $tambah->stok = $request->stok;
        $tambah->keterangan = $request->keterangan;


        $tambah->save();

        return redirect('obat');
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
        $data = Obat::where('kd_obat', $id) -> first();
        return view('obat.edit', compact('data'));
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
        $nm_obat = $request->nm_obat;
        $harga_modal = $request->harga_modal;
        $harga_jual = $request->harga_jual;
        $stok = $request->stok;
        $keterangan = $request->keterangan;

        Obat::where('kd_obat', $id)
          ->update([
              'nm_obat' => $nm_obat,
              'harga_modal' => $harga_modal,
              'harga_jual' => $harga_jual,
              'stok' => $stok,
              'keterangan' => $keterangan
          ]);

          return redirect('obat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Obat::where('kd_obat',$id)->delete();

        return redirect('obat');
    }
}
