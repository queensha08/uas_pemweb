<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jeniskegiatan;
use Illuminate\Support\Facades\Auth;

class JeniskegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->level == 'Admin'){
            $jeniskegiatan = Jeniskegiatan::all();
            return view('home.jeniskegiatan.index', compact(['jeniskegiatan']));
        }else{
            return redirect('/login')->with('error', 'Maaf Anda tidak memiliki Akses Ke halaman User Silahkan Login Kembali');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.jeniskegiatan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $existingData = Jeniskegiatan::where('jeniskegiatan', $request->jeniskegiatan)
            ->where('level', $request->level)
            ->first();
    
        if ($existingData) {
            return redirect()->back()->with('error', 'Jenis kegiatan dengan level yang sama sudah ada.');
        }
    
        Jeniskegiatan::create([
            'jeniskegiatan' => $request->jeniskegiatan,
            'level' => $request->level,
        ]);
        
        return redirect('/jeniskegiatan')->with('success', 'Data jenis kegiatan berhasil disimpan.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jeniskegiatan = Jeniskegiatan::find($id);
        return view('home.jeniskegiatan.edit', compact(['jeniskegiatan']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $existingData = Jeniskegiatan::where('jeniskegiatan', $request->jeniskegiatan)
            ->where('level', $request->level)
            ->where('id', '!=', $id)
            ->first();
    
        if ($existingData) {
            return redirect()->back()->with('error', 'Jenis kegiatan dengan level yang sama sudah ada.');
        }
    
        $jeniskegiatan = Jeniskegiatan::find($id);
        $jeniskegiatan->update([
            'jeniskegiatan' => $request->jeniskegiatan,
            'level' => $request->level,
        ]);
        
        return redirect('/jeniskegiatan')->with('success', 'Data jenis kegiatan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jeniskegiatan = Jeniskegiatan::find($id);
        $jeniskegiatan->delete();
        return redirect('/jeniskegiatan')->with('success', 'Data berhasil dihapus');
    }
}
