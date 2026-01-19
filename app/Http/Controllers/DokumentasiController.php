<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Client;
use App\Models\Dokumentasi;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;



class DokumentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if(Auth::user()->level == 'Admin'){
            $dokumentasi = Dokumentasi::all();
            $kegiatan = Kegiatan::all();
            return view('home.dokumentasi.index', compact(['dokumentasi', 'kegiatan']));
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
        $kegiatan = Kegiatan::all();
        return view('home.dokumentasi.tambah', compact(['kegiatan']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_kegiatan' => 'required|string',
            'link' => 'required|string',
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk setiap foto
        ]);

        $dokumentasi = Dokumentasi::create([
            'id_kegiatan' => $validatedData['id_kegiatan'],
            'link' => $validatedData['link'],
            'photo' => json_encode($this->storePhotos($request->file('photos'))), // Simpan path/nama file foto dalam format JSON
        ]);

        // Redirect dengan pesan sukses
        return redirect('/dokumentasi')->with('success', 'Data berhasil disimpan');
    }

    private function storePhotos($photos)
    {
        $storedPhotos = [];

        foreach ($photos as $photo) {
            $filename = time() . '_' . $photo->getClientOriginalName();
            $photo->storeAs('photos', $filename, 'public'); // Simpan foto ke dalam penyimpanan publik dengan nama yang unik
            $storedPhotos[] = 'photos/' . $filename; // Simpan path foto ke dalam array
        }

        return $storedPhotos;
    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dokumentasi = Dokumentasi::find($id);
        $kegiatan = Kegiatan::all();
        return view('home.dokumentasi.edit', compact(['dokumentasi', 'kegiatan']));
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
        $validatedData = $request->validate([
            'id_kegiatan' => 'required|string',
            'link' => 'required|string',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ubah validasi foto agar dapat menerima input foto kosong
        ]);

        $dokumentasi = Dokumentasi::findOrFail($id);

        // Update data namafolder dan link
        $dokumentasi->id_kegiatan = $validatedData['id_kegiatan'];
        $dokumentasi->link = $validatedData['link'];

        // Periksa apakah ada foto yang diunggah
        if ($request->hasFile('photos')) {
            // Hapus foto lama jika ada
            Storage::delete($dokumentasi->photo);

            // Simpan path foto baru
            $photoPaths = [];
            foreach ($request->file('photos') as $photo) {
                $filename = time().'_'.$photo->getClientOriginalName();
                $photo->storeAs('photos', $filename, 'public');
                $photoPaths[] = 'photos/' . $filename;
            }
            $dokumentasi->photo = json_encode($photoPaths);
        }

        // Simpan perubahan
        $dokumentasi->save();

        return redirect('/dokumentasi')->with('success', 'Data berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dokumentasi = Dokumentasi::find($id);
        $dokumentasi->delete();
        return redirect('/dokumentasi')->with('success', 'Data berhasil dihapus');
    }
}
