@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
      
      <!-- Admin Dashboard Info Boxes -->
        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah User</span>
              <span class="info-box-number">{{$jumlah_user}}</span>
              <a href="/user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Kegiatan</span>
              <span class="info-box-number">{{$jumlah_kegiatan}}</span>
              <a href="/kegiatan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box mb-">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-camera"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Dokumentasi</span>
              <span class="info-box-number">
                {{ $total_minggu }}
              </span>
              <a href="/detaildokumentasi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- TABLE: Admin Dokumentasi Kegiatan -->
        <div class="col-12">
          <div class="card">
            <div class="card-header border-transparent">
              <h3 class="card-title">Dokumentasi Kegiatan</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
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
                      <td>{{$e->deskripsi}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
  </section>
</div>
@endsection
