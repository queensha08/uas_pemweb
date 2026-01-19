@extends('layouts.master')
@section('title', 'Kelola Data Detail Dokumentasi')
@section('content')
    
<style>
    .edit-link {
        color: orange;
    }
    .delete-link {
        color: red;
    }
    .print-link {
        color: green;
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
                            <h4>Kelola Data Detail Dokumentasi</h4>
                            <a href="/detaildokumentasi/tambah" class="btn btn-primary">Tambah Data</a>
                            <a href="/detaildokumentasi/cetak" target="_blank" class="btn btn-success"><span class="fa fa-print"></span> Cetak Laporan</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-hover table-boerdered">
                                    <thead>
                                        <tr>
                                            <th>Id Detail Dokumentasi</th>
                                            <th>Nama User</th>
                                            <th>Nama Kegiatan</th>
                                            <th>Dokumentasi</th>
                                            <th>Tanggal Kegiatan</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($detaildokumentasi as $e)
                                        <tr>
                                            <td>{{$e->id}}</td>
                                            <td>{{$e->user->nama}}</td>
                                            <td>{{$e->kegiatan->namakegiatan}} - {{$e->kegiatan->jeniskegiatan->jeniskegiatan}}</td>
                                            <td><a href="{{$e->dokumentasi->link}}" target="_blank"><span class="fa fa-link"></span></a></td>
                                            <td>{{$e->tanggalkegiatan}}</td>
                                            <td>{{$e->keterangan}}</td>
                                            <td>
                                                <a href="/detaildokumentasi/{{$e->id}}/edit" class="edit-link"><span class="fa fa-edit"></span></a>
                                                <a href="#" 
                                                class="delete-link btn-delete" 
                                                data-url="/detaildokumentasi/{{$e->id}}/hapus">
                                                <span class="fa fa-trash"></span>
                                                </a>
                                                <a href="{{ route('detaildokumentasi.print', ['id' => $e->id]) }}" class="print-link"><span class="fa fa-print"></span></a>
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