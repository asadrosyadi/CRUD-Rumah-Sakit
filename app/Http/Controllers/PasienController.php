<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function laporan()
    {
        $no = 1; 
        $datas = Pasien::orderBy('nomor_rmk')
                          ->paginate(10);
        return view ('pasien.laporan', compact('datas', 'no'));
    }
    
     public function index(request $request)
    {
        $s = $request->s;
        $no = 1; 
        $datas = Pasien::orderBy('nomor_rmk')
                          ->search($s)
                          ->paginate(10);
        return view ('pasien.index', compact('datas', 'no', 's'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah = new Pasien;
        $tambah->nm_pasien = $request->nm_pasien;
        $tambah->no_identitas = $request->no_identitas;
        $tambah->jns_kelamin = $request->jns_kelamin;
        $tambah->gol_darah = $request->gol_darah;
        $tambah->tanggal_lahir = $request->tanggal_lahir;
        $tambah->no_telepon = $request->no_telepon;
        $tambah->alamat = $request->alamat;
        $tambah->stts_nikah = $request->stts_nikah;
        $tambah->pekerjaan = $request->pekerjaan;


        $tambah->save();

        return redirect('pasien');
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
        $data = Pasien::where('nomor_rmk', $id) -> first();
        return view('pasien.edit', compact('data'));
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
        $nm_pasien = $request->nm_pasien;
        $no_identitas = $request->no_identitas;
        $jns_kelamin = $request->jns_kelamin;
        $gol_darah = $request->gol_darah;
        $tanggal_lahir = $request->tanggal_lahir;
        $no_telepon = $request->no_telepon;
        $alamat = $request->alamat;
        $stts_nikah = $request->stts_nikah;
        $pekerjaan = $request->pekerjaan;

        Pasien::where('nomor_rmk', $id)
          ->update([
              'nm_pasien' => $nm_pasien,
              'no_identitas' => $no_identitas,
              'jns_kelamin' => $jns_kelamin,
              'gol_darah' => $gol_darah,
              'tanggal_lahir' => $tanggal_lahir,
              'no_telepon' => $no_telepon,
              'alamat' => $alamat,
              'stts_nikah' => $stts_nikah,
              'pekerjaan' => $pekerjaan
          ]);

          return redirect('pasien');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pasien::where('nomor_rmk',$id)->delete();

        return redirect('pasien');
    }

}
