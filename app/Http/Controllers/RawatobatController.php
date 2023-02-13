<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rawatobat;
use App\RawatPasien;
use App\Obat;
use App\Petugas;

class RawatobatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function laporan()
    {
        $no = 1; 
        $datas = Rawatobat::orderBy('no_rawat')
                          ->paginate(10);
        return view ('rawatobat.laporan', compact('datas', 'no'));
    }
     public function index(request $request)
    {
        $s = $request->s;
        $no = 1; 
        $datas = Rawatobat::orderBy('no_rawat')
                          ->search($s)
                          ->paginate(10);
        return view ('rawatobat.index', compact('datas', 'no', 's'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rawat = RawatPasien::all();
        $obat = Obat::all();
        $petugas = Petugas::all();
        return view('rawatobat.create', compact('rawat', 'obat', 'petugas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah = new Rawatobat;
        $tambah->no_rawat = $request->no_rawat;
        $tambah->tgl_obat = $request->tgl_obat;
        $tambah->kd_obat = $request->kd_obat;
        $tambah->aturan_pakai = $request->aturan_pakai;
        $tambah->id_petugas = $request->id_petugas;

        $tambah->save();
      
        return redirect('rawatobat');
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
        $rawat = RawatPasien::all();
        $obat = Obat::all();
        $petugas = Petugas::all();
        $data = Rawatobat::where('no_rawat', $id) -> first();
        return view('rawatobat.edit', compact('data','rawat','obat', 'petugas'));
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
        $no_rawat = $request->no_rawat;
        $tgl_obat = $request->tgl_obat;
        $kd_obat = $request->kd_obat;
        $aturan_pakai = $request->aturan_pakai;
        $id_petugas = $request->id_petugas;

        Rawatobat::where('no_rawat', $id)
          ->update([
              'no_rawat' => $no_rawat,
              'tgl_obat' => $tgl_obat,
              'kd_obat' => $kd_obat,
              'aturan_pakai' => $aturan_pakai,
              'id_petugas' => $id_petugas,
          ]);

          return redirect('rawatobat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rawatobat::where('no_rawat',$id)->delete();

        return redirect('rawatobat');
    }

}
