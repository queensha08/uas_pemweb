@extends('layouts.master')
@section('title', 'Edit Data Jenis Kegiatan')
@section('content')
    
<div class="content-wrapper">
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Data Jenis Kegiatan</h4>
                        </div>
                        <div class="card-body">
                            @if(session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form action="/jeniskegiatan/{{$jeniskegiatan->id}}/update" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Jenis Kegiatan</label>
                                    <input type="text" name="jeniskegiatan" id="" class="form-control" value="{{$jeniskegiatan->jeniskegiatan}}" placeholder="Masukan Jenis Kegiatan" aria-describedby="helpId" required>
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
