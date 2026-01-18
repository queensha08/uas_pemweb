<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Kegiatan;
use App\Models\Dokumentasi;
use App\Models\DetailDokumentasi;
use App\Models\Laporan; 
use TCPDF;

class LaporanController extends Controller
{
    public function index()
    {
        // Ambil semua data laporan menggunakan query builder
        $detaildokumentasi = DetailDokumentasi::all();

        // Kembalikan data laporan ke view
        return view('home.laporan.index', compact (['detaildokumentasi']));
    }

    public function print($id)
    {
        // Ambil detail dokumen menggunakan Query Builder
        $detailDokumentasi = DB::table('detaildokumentasis')->find($id);

        // Periksa apakah detail dokumen ditemukan
        if (!$detailDokumentasi) {
            return redirect()->back()->with('error', 'Detail dokumentasi tidak ditemukan.');
        }

        // Misalkan disimpan di folder public/laporan
        $folderPath = public_path('/laporan');

        // Buat folder jika belum ada
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0777, true);
        }

        // Misalkan nama file adalah id_detaildokumentasi.pdf
        $fileName = $detailDokumentasi->id . '_laporan.pdf';

        // Path lengkap file laporan
        $filePath = $folderPath . '/' . $fileName;

        // Simpan file laporan menggunakan TCPDF
        $pdf = new \TCPDF();
        $pdf->AddPage();
        $pdf->SetFont('times', '', 12);
        $pdf->Write(0, 'Isi laporan disini');
        $pdf->Output($filePath, 'F');

        // Simpan data laporan menggunakan Query Builder
        DB::table('laporan')->insert([
            'id_detaildokumentasi' => $detailDokumentasi->id,
            'file' => $fileName,
        ]);

        return redirect()->back()->with('success', 'Laporan berhasil disimpan.');
    }



    public function terima($id)
    {
        $laporan = DB::table('laporan')->where('id', $id)->first();
        if ($laporan) {
            DB::table('laporan')->where('id', $id)->update(['status' => 'Diterima']);
            // Perbarui status terbaru di tabel detail_dokumentasi
            $detailDokumentasi = DB::table('detaildokumentasis')->where('id', $laporan->detaildokumentasi_id)->first();
            if ($detailDokumentasi) {
                DB::table('detaildokumentasis')->where('id', $laporan->detaildokumentasi_id)->update(['status_terbaru' => 'Diterima']);
            }
            return redirect()->back()->with('success', 'Laporan diterima.');
        } else {
            return redirect()->back()->with('error', 'Laporan tidak ditemukan.');
        }
    }

    public function tolak($id)
    {
        $laporan = DB::table('laporan')->where('id', $id)->first();
        if ($laporan) {
            DB::table('laporan')->where('id', $id)->update(['status' => 'Ditolak']);
            // Perbarui status terbaru di tabel detail_dokumentasi
            $detailDokumentasi = DB::table('detaildokumentasis')->where('id', $laporan->detaildokumentasi_id)->first();
            if ($detailDokumentasi) {
                DB::table('detaildokumentasis')->where('id', $laporan->detaildokumentasi_id)->update(['status_terbaru' => 'Ditolak']);
            }
            return redirect()->back()->with('success', 'Laporan ditolak.');
        } else {
            return redirect()->back()->with('error', 'Laporan tidak ditemukan.');
        }
    }
}
