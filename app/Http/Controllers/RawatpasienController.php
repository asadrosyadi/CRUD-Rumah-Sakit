<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rawatpasien;
use App\Pasien;
use App\Dokter;
use App\Petugas;

class RawatpasienController extends Controller
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
        $datas = Rawatpasien::orderBy('no_rawat')
                          ->search($s)
                          ->paginate(10);
        return view ('rawatpasien.index', compact('datas', 'no', 's'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pasien = Pasien::all();
        $dokter = Dokter::all();
        $petugas = Petugas::all();
        return view('rawatpasien.create', compact('pasien', 'dokter', 'petugas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah = new Rawatpasien;
        $tambah->tgl_rawat = $request->tgl_rawat;
        $tambah->nomor_rmk = $request->nomor_rmk;
        $tambah->id_dokter = $request->id_dokter;
        $tambah->hasil_diagnosa = $request->hasil_diagnosa;
        $tambah->bayar = $request->bayar;
        $tambah->id_petugas = $request->id_petugas;


        $tambah->save();

        return redirect('rawatpasien');
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
        $pasien = Pasien::all();
        $dokter = Dokter::all();
        $petugas = Petugas::all();
        $data = Rawatpasien::where('no_rawat', $id) -> first();
        return view('rawatpasien.edit', compact('data','pasien', 'dokter', 'petugas'));
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
        $tgl_rawat = $request->tgl_rawat;
        $nomor_rmk = $request->nomor_rmk;
        $id_dokter = $request->id_dokter;
        $hasil_diagnosa = $request->hasil_diagnosa;
        $bayar = $request->bayar;
        $id_petugas = $request->id_petugas;

        Rawatpasien::where('no_rawat', $id)
          ->update([
              'tgl_rawat' => $tgl_rawat,
              'nomor_rmk' => $nomor_rmk,
              'id_dokter' => $id_dokter,
              'hasil_diagnosa' => $hasil_diagnosa,
              'bayar' => $bayar,
              'id_petugas' => $id_petugas,
          ]);

          return redirect('rawatpasien');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rawatpasien::where('no_rawat',$id)->delete();

        return redirect('rawatpasien');
    }

}
