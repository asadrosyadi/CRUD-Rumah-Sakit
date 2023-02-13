<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pendaftaran;
use App\Pasien;
use App\Tindakan;
use App\Petugas;

class PendaftaranController extends Controller
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
        $datas = Pendaftaran::orderBy('no_daftar')
                          ->search($s)
                          ->paginate(10);
        return view ('pendaftaran.index', compact('datas', 'no', 's'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pasien = Pasien::all();
        $tindakan = Tindakan::all();
        $petugas = Petugas::all();
        return view('pendaftaran.create', compact('pasien', 'tindakan', 'petugas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah = new Pendaftaran;
        $tambah->nomor_rmk = $request->nomor_rmk;
        $tambah->tgl_daftar = $request->tgl_daftar;
        $tambah->keluhan = $request->keluhan;
        $tambah->kd_tindakan = $request->kd_tindakan;
        $tambah->nomor_antri = $request->nomor_antri;
        $tambah->id_petugas = $request->id_petugas;


        $tambah->save();

        return redirect('pendaftaran');
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
        $tindakan = Tindakan::all();
        $petugas = Petugas::all();
        $data = Pendaftaran::where('no_daftar', $id) -> first();
        return view('pendaftaran.edit', compact('data','pasien', 'tindakan', 'petugas'));
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
        $nomor_rmk = $request->nomor_rmk;
        $tgl_daftar = $request->tgl_daftar;
        $keluhan = $request->keluhan;
        $kd_tindakan = $request->kd_tindakan;
        $nomor_antri = $request->nomor_antri;
        $id_petugas = $request->id_petugas;

        Pendaftaran::where('nomor_rmk', $id)
          ->update([
              'nomor_rmk' => $nomor_rmk,
              'tgl_daftar' => $tgl_daftar,
              'keluhan' => $keluhan,
              'kd_tindakan' => $kd_tindakan,
              'nomor_antri' => $nomor_antri,
              'id_petugas' => $id_petugas,
          ]);

          return redirect('pendaftaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pendaftaran::where('no_daftar',$id)->delete();

        return redirect('pendaftaran');
    }

}
