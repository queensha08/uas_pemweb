@extends('layouts.master')
@section('title', 'Kelola Data Dokumentasi')
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
                            <h4>Kelola Data Dokumentasi</h4>
                            <a href="/dokumentasi/tambah" class="btn btn-primary">Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            
                                <table id="example" class="table table-striped table-hover table-boerdered">
                                    <thead>
                                        <tr>
                                            <th>Id Dokumentasi</th>
                                            <th>Nama Folder</th>
                                            <th>Link</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($dokumentasi as $d)
                                        <tr>
                                            <td>{{$d->id}}</td>
                                            <td>{{$d->kegiatan->namakegiatan}} - {{$d->kegiatan->jeniskegiatan->jeniskegiatan}}</td>
                                            <!-- Gunakan $d->link untuk menampilkan properti link -->
                                            <td><a href="{{$d->link}}" target="_blank"><span class="fa fa-link"></span></a></td>
                                            <td>
                                                @if ($d->photo)
                                                    @foreach(json_decode($d->photo, true) as $image)
                                                        <img src="{{ asset('storage/' . $image) }}" alt="Foto" style="max-width:100px; margin:2px;">
                                                    @endforeach
                                                @else
                                                    No photo available
                                                @endif
                                            </td>


                                            <td>
                                                <a href="/dokumentasi/{{$d->id}}/edit" class="edit-link"><span class="fa fa-edit"></span></a>
                                                <a href="#" 
                                                    class="delete-link btn-delete" 
                                                    data-url="/dokumentasi/{{$d->id}}/hapus">
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
