@extends('layouts.master')
@section('title', 'Kelola Data Jenis Kegiatan')
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
                            <h4>Kelola Data Jenis Kegiatan</h4>
                            <a href="/jeniskegiatan/tambah" class="btn btn-primary">Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-hover table-boerdered">
                                    <thead>
                                        <tr>
                                            <th>Id Jenis Kegiatan</th>
                                            <th>Jenis Kegiatan</th>
                                            <th>Level</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jeniskegiatan as $j)
                                        <tr>
                                            <td>{{$j->id}}</td>
                                            <td>{{$j->jeniskegiatan}}</td>
                                            <td>{{$j->level}}</td>
                                            <td>
                                                <a href="/jeniskegiatan/{{$j->id}}/edit" class="edit-link"><span class="fa fa-edit"></span></a>
                                                <a href="/jeniskegiatan/{{$j->id}}/hapus" class="delete-link"><span class="fa fa-trash"></span></a>
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
