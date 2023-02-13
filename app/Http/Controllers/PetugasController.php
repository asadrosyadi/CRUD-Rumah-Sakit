<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petugas;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function laporan()
    {
        $no = 1; 
        $datas = Petugas::orderBy('id')
                          ->paginate(10);
        return view ('petugas.laporan', compact('datas', 'no'));
    }
   
     public function index(request $request)
    {
        $s = $request->s;
        $no = 1; 
        $datas = Petugas::orderBy('id')
                          ->search($s)
                          ->paginate(10);
        return view ('petugas.index', compact('datas', 'no', 's'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah = new Petugas;
        $tambah->nm_petugas = $request->nm_petugas;
        $tambah->no_telepon = $request->no_telepon;
        $tambah->username = $request->username;
        $password = $request->nm_petugas;
        $tambah->password = bcrypt($password);
        $tambah->level = $request->level;


        $tambah->save();

        return redirect('petugas');
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
        $data = Petugas::where('id', $id) -> first();
        return view('petugas.edit', compact('data'));
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
        $nm_petugas = $request->nm_petugas;
        $no_telepon = $request->no_telepon;
        $username = $request->username;
        $password = $request->password;
        $password = bcrypt($password);
        $level = $request->level;

        Petugas::where('id', $id)
          ->update([
              'nm_petugas' => $nm_petugas,
              'no_telepon' => $no_telepon,
              'username' => $username,
              'password' => $password,
              'level' => $level
          ]);

          return redirect('petugas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Petugas::where('id',$id)->delete();

        return redirect('petugas');
    }
}
