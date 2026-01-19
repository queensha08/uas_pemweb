@extends('layouts.master')
@section('title', 'Kelola Data Kegiatan')
@section('content')

<style>
    .edit-link {
        color: orange;
    }
    .delete-link {
        color: red;
    }
</style>

<div class="content-wrapper">
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Kelola Data Kegiatan</h4>
                            <a href="/kegiatan/tambah" class="btn btn-primary">Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-hover table-boerdered">
                                    <thead>
                                        <tr>
                                            <th>Id Kegiatan</th>
                                            <th>Nama kegiatan</th>
                                            <th>Jenis Kegiatan</th>
                                            <th>Tanggal Kegiatan</th>
                                            <th>Kategori Peserta</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kegiatan as $k)
                                        <tr>
                                            <td>{{$k->id}}</td>
                                            <td>{{$k->namakegiatan}}</td>
                                            <td>{{$k->jeniskegiatan->jeniskegiatan}} - {{$k->jeniskegiatan->level}}</td>
                                            <td>{{$k->tanggalkegiatan}}</td>
                                            <td>{{$k->kategoripeserta}}</td>
                                            <td>
                                                <a href="/kegiatan/{{$k->id}}/edit" class="edit-link"><span class="fa fa-edit"></span></a>
                                                <a href="#" 
                                                    class="delete-link btn-delete" 
                                                    data-url="/kegiatan/{{$k->id}}/hapus">
                                                    <span class="fa fa-trash"></span>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
    
@endsection