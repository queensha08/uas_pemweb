@extends('layouts.master')
@section('title', 'Edit Data Kegiatan')
@section('content')
    
<div class="content-wrapper">
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Data Kegiatan</h4>
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
                            <form action="/kegiatan/{{$kegiatan->id}}/update" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Nama Kegiatan</label>
                                    <input type="text" name="namakegiatan" id="" class="form-control" value="{{$kegiatan->namakegiatan}}" placeholder="Masukan Nama Kegiatan" aria-describedby="helpId" required>
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
                                    <input type="date" name="tanggalkegiatan" id="" class="form-control"  value="{{$kegiatan->tanggalkegiatan}}" placeholder="Masukan Tanggal Kegiatan" aria-describedby="helpId" required>
                                  </div>

                                  <div class="mb-3">
                                    <label for="" class="form-label">Kategori Peserta</label>
                                    <input type="text" name="kategoripeserta" id="" class="form-control"  value="{{$kegiatan->kategoripeserta}}" placeholder="Masukan Kategori Peserta" aria-describedby="helpId" required>
                                  </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a href="/kegiatan" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection