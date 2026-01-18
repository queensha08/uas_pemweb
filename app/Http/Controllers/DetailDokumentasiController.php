<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Kegiatan;
use App\Models\Dokumentasi;
use App\Models\DetailDokumentasi;
use App\Models\Laporan;
use Dompdf\Dompdf;
use Dompdf\Options;
use TCPDF;

class DetailDokumentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $kegiatan = Kegiatan::all();
        $dokumentasi = Dokumentasi::all();
        $detaildokumentasi = DetailDokumentasi::all();
        return view('home.detaildokumentasi.index', compact(['user', 'kegiatan', 'dokumentasi', 'detaildokumentasi']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $kegiatan = Kegiatan::all();
        $dokumentasi = Dokumentasi::all();
        return view('home.detaildokumentasi.tambah', compact(['user', 'kegiatan', 'dokumentasi']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        DetailDokumentasi::create([
            'id_user' => $request->id_user,
            'id_kegiatan' => $request->id_kegiatan,
            'id_dokumentasi' => $request->id_dokumentasi,
            'tanggalkegiatan' => $request->tanggalkegiatan,
            'keterangan' => $request->keterangan ?? '-',// Menyertakan nilai default
        ]);
        return redirect('/detaildokumentasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::all();
        $kegiatan = Kegiatan::all();
        $dokumentasi = Dokumentasi::all();
        $detaildokumentasi = DetailDokumentasi::find($id);
        return view('home.detaildokumentasi.edit', compact(['user', 'kegiatan', 'dokumentasi', 'detaildokumentasi']));
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
        $detaildokumentasi = DetailDokumentasi::find($id);
        $detaildokumentasi->update([
            'id_user' => $request->id_user,
            'id_kegiatan' => $request->id_kegiatan,
            'id_dokumentasi' => $request->id_dokumentasi,
            'tanggalkegiatan' => $request->tanggalkegiatan,
            'keterangan' => $request->keterangan,
            $request->except(['_token']),
        ]);
        return redirect('/detaildokumentasi');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detaildokumentasi = DetailDokumentasi::find($id);
        $detaildokumentasi->delete();
        return redirect('/detaildokumentasi');
    }

    public function cetak()
    {
        $user = User::all();
        $kegiatan = Kegiatan::all();
        $dokumentasi = Dokumentasi::all();
        $detaildokumentasi = DetailDokumentasi::all();
        return view('home.detaildokumentasi.cetak', compact(['detaildokumentasi', 'user', 'kegiatan', 'dokumentasi']));
    }

    public function print($id)
    {
        $user = User::all();
        $kegiatan = Kegiatan::all();
        $dokumentasi = Dokumentasi::all();
        $detaildokumentasi = DetailDokumentasi::find($id);
        return view('home.detaildokumentasi.print', compact(['detaildokumentasi', 'user', 'kegiatan', 'dokumentasi']));
    }

}
