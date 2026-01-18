<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\Jeniskegiatan;
use Illuminate\Support\Facades\Auth;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->level == 'Admin'){
            $kegiatan = Kegiatan::all();
            $jeniskegiatan = Jeniskegiatan::all();
            return view('home.kegiatan.index', compact(['kegiatan', 'jeniskegiatan']));
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
        $jeniskegiatan = Jeniskegiatan::all();
        return view('home.kegiatan.tambah', compact(['jeniskegiatan']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi bahwa nama kegiatan dan tanggal kegiatan tidak boleh duplikat
        $existingData = Kegiatan::where('namakegiatan', $request->namakegiatan)
        ->where('tanggalkegiatan', $request->tanggalkegiatan)
        ->first();

        if ($existingData) {
            return redirect('/kegiatan/tambah')->with('error', 'Data dengan nama kegiatan dan tanggal kegiatan yang sama sudah ada.');
        }

        Kegiatan::create([
            'namakegiatan' => $request->namakegiatan,
            'id_jeniskegiatan' => $request->id_jeniskegiatan,
            'tanggalkegiatan' => $request->tanggalkegiatan,
            'kategoripeserta' => $request->kategoripeserta,
        ]);

        return redirect('/kegiatan')->with('success', 'Data kegiatan berhasil ditambahkan.');
        }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kegiatan = Kegiatan::find($id);
        $jeniskegiatan = Jeniskegiatan::all();
        return view('home.kegiatan.edit', compact(['kegiatan', 'jeniskegiatan']));
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
        // Validasi bahwa nama kegiatan dan tanggal kegiatan tidak boleh duplikat
        $existingData = Kegiatan::where('namakegiatan', $request->namakegiatan)
            ->where('tanggalkegiatan', $request->tanggalkegiatan)
            ->where('id', '!=', $id) // exclude current edited record
            ->first();
    
        if ($existingData) {
            return redirect('/kegiatan/' . $id . '/edit')->with('error', 'Data dengan nama kegiatan dan tanggal kegiatan yang sama sudah ada.');
        }
    
        $kegiatan = Kegiatan::find($id);
        $kegiatan->update([
            'namakegiatan' => $request->namakegiatan,
            'id_jeniskegiatan' => $request->id_jeniskegiatan,
            'tanggalkegiatan' => $request->tanggalkegiatan,
            'kategoripeserta' => $request->kategoripeserta,
        ]);
    
        return redirect('/kegiatan')->with('success', 'Data kegiatan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kegiatan = Kegiatan::find($id);
        $kegiatan->delete();
        return redirect('/kegiatan');
    }
}
