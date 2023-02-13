<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rawattindakan;
use App\Rawatpasien;
use App\Tindakan;
use App\Dokter;
use App\Petugas;

class RawattindakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function laporan()
    {
        $no = 1; 
        $datas = Rawattindakan::orderBy('no_tindakan')
                          ->paginate(10);
        return view ('rawattindakan.laporan', compact('datas', 'no'));
    }

     public function index(request $request)
    {
        $s = $request->s;
        $no = 1; 
        $datas = Rawattindakan::orderBy('no_tindakan')
                          ->search($s)
                          ->paginate(10);
        return view ('rawattindakan.index', compact('datas', 'no', 's'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rawat = Rawatpasien::all();
        $tindakan = Tindakan::all();
        $dokter = Dokter::all();
        $petugas = Petugas::all();
        return view('rawattindakan.create', compact('rawat', 'tindakan', 'dokter', 'petugas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah = new Rawattindakan;
        $tambah->tgl_tindakan = $request->tgl_tindakan;
        $tambah->no_rawat = $request->no_rawat;
        $tambah->kd_tindakan = $request->kd_tindakan;
        $tambah->id_dokter = $request->id_dokter;
        $tambah->keterangan = $request->keterangan;
        $tambah->id_petugas = $request->id_petugas;


        $tambah->save();

        return redirect('rawattindakan');
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
        $rawat = Rawatpasien::all();
        $tindakan = Tindakan::all();
        $dokter = Dokter::all();
        $petugas = Petugas::all();
        $data = Rawattindakan::where('no_tindakan', $id) -> first();
        return view('rawattindakan.edit', compact('data','rawat', 'tindakan', 'dokter', 'petugas'));
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
        $tgl_tindakan = $request->tgl_tindakan;
        $no_rawat = $request->no_rawat;
        $kd_tindakan = $request->kd_tindakan;
        $id_dokter = $request->id_dokter;
        $keterangan = $request->keterangan;
        $id_petugas = $request->id_petugas;

        Rawattindakan::where('no_tindakan', $id)
          ->update([
              'tgl_tindakan' => $tgl_tindakan,
              'no_rawat' => $no_rawat,
              'kd_tindakan' => $kd_tindakan,
              'id_dokter' => $id_dokter,
              'keterangan' => $keterangan,
              'id_petugas' => $id_petugas,
          ]);

          return redirect('rawattindakan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rawattindakan::where('no_tindakan',$id)->delete();

        return redirect('rawattindakan');
    }

}
