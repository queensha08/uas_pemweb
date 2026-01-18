@extends('layouts.master')
@section('title', 'Tambah Data Kegiatan')
@section('content')
    
<div class="content-wrapper">
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah Data Kegiatan</h4>
                        </div>
                        <div class="card-body">
                        @if(session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                                <script>
                                    // Tutup notifikasi setelah 5 detik
                                    setTimeout(function() {
                                        $('#errorAlert').fadeOut('fast');
                                    }, 5000); // 5000 milidetik = 5 detik
                                </script>
                            @endif
                            <form action="/kegiatan/simpan" method="POST" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Nama Kegiatan</label>
                                    <input type="text" name="namakegiatan" id="" class="form-control" placeholder="Masukan Nama Kegiatan" aria-describedby="helpId" required>
                                  </div>

                                  <div class="mb-3">
                                    <label for="" class="form-label">Jenis Kegiatan</label>
                                    <select name="id_jeniskegiatan" id="" class="form-control">
                                        @foreach($jeniskegiatan as $jeniskegiatan)
                                        <option value="{{$jeniskegiatan->id}}">{{$jeniskegiatan->jeniskegiatan}} - {{$jeniskegiatan->level}}</option>
                                        @endforeach
                                    </select>
                                  </div>

                                  <div class="mb-3">
                                    <label for="" class="form-label">Tanggal kegiatan</label>
                                    <input type="date" name="tanggalkegiatan" id="" class="form-control" placeholder="Masukan Tanggal Kegiatan" aria-describedby="helpId" required>
                                  </div>

                                  <div class="mb-3">
                                    <label for="" class="form-label">Kategori Peserta</label>
                                    <input type="text" name="kategoripeserta" id="" class="form-control" placeholder="Masukan Kategori Peserta" aria-describedby="helpId" required>
                                  </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection