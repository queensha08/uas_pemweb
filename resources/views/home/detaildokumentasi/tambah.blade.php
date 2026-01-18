@extends('layouts.master')
@section('title', 'Tambah Data Detail Dokumentasi')
@section('content')
    
<div class="content-wrapper">
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah Data Detail Dokumentasi</h4>
                        </div>
                        <div class="card-body">
                            <form action="/detaildokumentasi/simpan" method="POST" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                  <div class="mb-3">
                                    <label for="" class="form-label">Nama User</label>
                                    <select name="id_user" id="" class="form-control">
                                        @foreach($user as $user)
                                        <option value="{{$user->id}}">{{$user->nama}}</option>
                                        @endforeach
                                    </select>
                                  </div>

                                  <div class="mb-3">
                                    <label for="" class="form-label">Nama Kegiatan</label>
                                    <select name="id_kegiatan" id="" class="form-control">
                                        @foreach($kegiatan as $kegiatan)
                                        <option value="{{$kegiatan->id}}">{{$kegiatan->namakegiatan}}</option>
                                        @endforeach
                                    </select>
                                  </div>

                                  <div class="mb-3">
                                    <label for="" class="form-label">Dokumentasi</label>
                                    <select name="id_dokumentasi" id="" class="form-control">
                                        @foreach($dokumentasi as $dokumentasi)
                                        <option value="{{$dokumentasi->id}}">{{$dokumentasi->kegiatan->namakegiatan}} - {{$dokumentasi->link}}</option>
                                        @endforeach
                                    </select>
                                  </div>

                                  <div class="mb-3">
                                    <label for="" class="form-label">Tanggal Kegiatan</label>
                                    <input type="date" name="tanggalkegiatan" id="" class="form-control" placeholder="Masukan Tanggal Kegiatan" aria-describedby="helpId" required>
                                  </div>

                                  <div class="mb-3">
                                    <label for="" class="form-label">Keterangan</label>
                                    <input type="text" name="keterangan" id="" class="form-control" placeholder="Masukan Keterangan" aria-describedby="helpId" required>
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