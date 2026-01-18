<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keseluruhan Dokumentasi</title>
    <link rel="stylesheet" href="{{asset('assets/css/cetak.css')}}">
</head>
<body onload="window.print()">
   <div class="content-wrapper">
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <center><img src="{{asset('assets/gambar/kopsurat.png')}}" alt="Kop Surat"></center>
                            <center><h2>Laporan Keseluruhan Dokumentasi Kegiatan Sekolah</h2></center>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <center><table border="2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kegiatan</th>
                                            <th>Tanggal Kegiatan</th>
                                            <th>Dokumentasi</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($detaildokumentasi as $e)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$e->kegiatan->namakegiatan}}</td>
                                            <td>{{$e->tanggalkegiatan}}</td>
                                            <td>{{$e->dokumentasi->link}}</td>
                                            <td>{{$e->keterangan}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>
