@extends('layouts.master')
@section('title', 'Tambah Data Dokumentasi')
@section('content')
    
<div class="content-wrapper">
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah Data Dokumentasi</h4>
                        </div>
                        <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            <form action="/dokumentasi/simpan" method="POST" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                  <div class="mb-3">
                                    <label for="" class="form-label">Nama Kegiatan</label>
                                    <select name="id_kegiatan" id="" class="form-control">
                                        @foreach($kegiatan as $kegiatan)
                                        <option value="{{$kegiatan->id}}">{{$kegiatan->namakegiatan}}</option>
                                        @endforeach
                                    </select>
                                  </div>

                                  <div class="mb-3">
                                    <label for="" class="form-label">Link</label>
                                    <input type="text" name="link" id="" class="form-control" placeholder="Masukan Link " aria-describedby="helpId" autocomplete="new-password" required>
                                  </div>

                                  <div class="mb-3">
                                    <label for="photos" class="form-label">Foto (multiple selection allowed)</label>
                                    <input type="file" name="photos[]" id="photos" class="form-control" multiple accept="image/*" aria-describedby="fileHelpId" required>
                                    <!-- <div id="fileHelpId" class="form-text">Pilih satu atau lebih foto untuk diunggah</div> -->
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
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@endsection