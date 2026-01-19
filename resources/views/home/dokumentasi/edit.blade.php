@extends('layouts.master')
@section('title', 'Edit Data Dokumentasi')
@section('content')
    
<div class="content-wrapper">
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Data Dokumentasi</h4>
                        </div>
                        <div class="card-body">
                            <form action="/dokumentasi/{{$dokumentasi->id}}/update" method="post" enctype="multipart/form-data">
                                @csrf
                                  <div class="mb-3">
                                    <label for="" class="form-label">Nama Kegiatan</label>
                                    <select name="id_kegiatan" id="" class="form-control">
                                        @foreach($kegiatan as $items)
                                        <option value="{{$items->id}}">{{$items->namakegiatan}}</option>
                                        @endforeach
                                    </select>
                                  </div>

                                  <div class="mb-3">
                                    <label for="" class="form-label">Link</label>
                                    <input type="text" name="link" id="" class="form-control"  value="{{$dokumentasi->link}}" placeholder="Masukan Link " aria-describedby="helpId" required>
                                  </div>

                                  <div class="mb-3">
                                    <label for="photos" class="form-label">Foto (multiple selection allowed)</label>
                                    <input type="file" name="photos[]" id="photos" class="form-control" multiple accept="image/*" aria-describedby="fileHelpId" required>
                                    <!-- <div id="fileHelpId" class="form-text">Pilih satu atau lebih foto untuk diunggah</div> -->
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a href="/dokumentasi" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection