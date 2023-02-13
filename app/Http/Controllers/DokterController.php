<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dokter;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function laporan()
    {
        $no = 1; 
        $datas = Dokter::orderBy('id_dokter')
                          ->paginate(10);
        return view ('dokter.laporan', compact('datas', 'no'));
    }
    
     public function index(request $request)
    {
        $s = $request->s;
        $no = 1; 
        $datas = Dokter::orderBy('id_dokter')
                          ->search($s)
                          ->paginate(10);
        return view ('dokter.index', compact('datas', 'no', 's'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dokter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah = new Dokter;
        $tambah->nm_dokter = $request->nm_dokter;
        $tambah->jenis_kelamin = $request->jenis_kelamin;
        $tambah->tanggal_lahir = $request->tanggal_lahir;
        $tambah->no_telepon = $request->no_telepon;
        $tambah->sip = $request->sip;
        $tambah->spesialis = $request->spesialis;
        $tambah->alamat = $request->alamat;


        $tambah->save();

        return redirect('dokter');
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
        $data = Dokter::where('id_dokter', $id) -> first();
        return view('dokter.edit', compact('data'));
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
        $nm_dokter = $request->nm_dokter;
        $jenis_kelamin = $request->jenis_kelamin;
        $tanggal_lahir = $request->tanggal_lahir;
        $no_telepon = $request->no_telepon;
        $sip = $request->sip;
        $spesialis = $request->spesialis;
        $alamat = $request->alamat;

        Dokter::where('id_dokter', $id)
          ->update([
              'nm_dokter' => $nm_dokter,
              'jenis_kelamin' => $jenis_kelamin,
              'tanggal_lahir' => $tanggal_lahir,
              'no_telepon' => $no_telepon,
              'sip' => $sip,
              'spesialis' => $spesialis,
              'alamat' => $alamat
          ]);

          return redirect('dokter');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dokter::where('id_dokter',$id)->delete();

        return redirect('dokter');
    }

}
