<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Dokumentasi Kegiatan</title>
    <link rel="stylesheet" href="{{asset('assets/css/cetak.css')}}">
    <style>
        .grid-gambar {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between; /* agar ruang diantara gambar terisi */
        }
        .grid-gambar div {
            flex-basis: calc(50% - 10px); /* setiap foto mengambil setengah lebar container, dikurangi ruang di antara mereka */
            margin-bottom: 20px; /* jarak bawah antara baris */
        }
        .grid-gambar img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto; /* mengatur foto ke tengah */
        }

        /* Menambahkan aturan CSS untuk mencetak */
        @media print {
            .header img {
                display: block;
                margin: auto;
                width: auto; /* Sesuaikan dengan lebar gambar kop surat */
            }
        }
    </style>
</head>
<body onload="window.print()">
<!-- Perbaikan tag body: tambahkan tanda petik pada onload="window.print()" -->
<div class="content-wrapper">
    <br>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="header">
                            <!-- Tambahkan aturan CSS untuk mencetak gambar -->
                            <center><img src="{{asset('assets/gambar/kopsurathmif.png')}}" alt="Kop Surat"></center>
                            <center><h2>Laporan Dokumentasi Kegiatan</h2></center>
                        </div>
                        <div class="card-body">
                            <div>
                                <th>
                                    <td>Nama Kegiatan:</td>
                                    <td>{{$detaildokumentasi->Kegiatan->namakegiatan}}</td>
                                </th>
                                <br>
                                <th>
                                    <td>Jenis Kegiatan:</td>
                                    <td>{{$detaildokumentasi->Kegiatan->Jeniskegiatan->jeniskegiatan}}</td>
                                </th>
                                <br>
                                <th>
                                    <td>Tanggal Kegiatan:</td>
                                    <td>{{$detaildokumentasi->tanggalkegiatan}}</td>
                                </th>
                            </div>
                        </div><br>
                        <main>
                            <div class="grid-gambar">
                                <!-- Ubah foreach menjadi if -->
                                @if ($detaildokumentasi->dokumentasi->photo)
                                    <!-- Ubah json_decode menjadi json_decode dengan opsi true -->
                                    @foreach (json_decode($detaildokumentasi->dokumentasi->photo, true) as $image)
                                        <!-- Tambahkan kondisi untuk membatasi jumlah foto yang ditampilkan -->
                                        @if ($loop->iteration <= 4)
                                            <div>
                                                <img src="{{ asset('storage/' . $image) }}" alt="Foto">
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    Tidak ada foto tersedia
                                @endif
                            </div>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>
