@extends('layouts.master')
@section('title', 'Tambah Data Jenis Kegiatan')
@section('content')
    
<div class="content-wrapper">
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah Data Jenis Kegiatan</h4>
                        </div>
                        <div class="card-body">
                            @if(session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form action="/jeniskegiatan/simpan" method="POST" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Jenis Kegiatan</label>
                                    <input type="text" name="jeniskegiatan" id="" class="form-control" placeholder="Masukan Jenis Kegiatan" aria-describedby="helpId" required>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Level</label>
                                    <select name="level" id="" class="form-control">
                                        <option value="Non Formal">Non Formal</option>
                                        <option value="Semi Formal">Semi Formal</option>
                                        <option value="Formal">Formal</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a href="/jeniskegiatan" class="btn btn-secondary">Cancel</a>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
