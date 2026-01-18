@extends('layouts.master')
@section('title', 'Kelola Data Laporan')
@section('content')

<style>
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
                            <h4>Laporan Dokumentasi</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-hover table-boerdered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kegiatan</th>
                                            <th>Tanggal Kegiatan</th>
                                            <th>Dokumentasi</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($detaildokumentasi as $l)
                                        <tr>
                                            <td>{{$l->id}}</td>
                                            <td>{{$l->kegiatan->namakegiatan}} - {{$l->kegiatan->jeniskegiatan->jeniskegiatan}}</td>
                                            <td>{{ $l->tanggalkegiatan }}</td>
                                            <td><a href="{{$l->dokumentasi->link}}" target="_blank"><span class="fa fa-link"></span></a></td>
                                            <td>{{ $l->keterangan }}</td>
                                            <td><a href="{{ route('detaildokumentasi.print', ['id' => $l->id]) }}" class="print-link"><span class="fa fa-print"></span></a></td>
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

<!-- Include CSS Datatables -->
<link rel="stylesheet" href="{{asset('datatable/dataTables.bootstrap4.min.css')}}">

<!-- Include JS Datatables -->
<script src="{{asset('datatable/datatables.min.js')}}"></script>

<!-- Inisialisasi Datatables -->
<script>
    $(document).ready(function() {
        $('#example').dataTable();
    });
</script>

@endsection
