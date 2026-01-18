@extends('layouts.master')
@section('title', 'Edit Data User')
@section('content')
    
<div class="content-wrapper">
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Data User</h4>
                        </div>
                        <div class="card-body">
                            <form action="/user/{{$user->id}}/update" method="post" enctype="multipart/form-data">
                                @csrf
                                  <div class="mb-3">
                                    <label for="" class="form-label">Foto (max 2mb)</label>
                                    <input type="file" class="form-control" name="photo" id="" placeholder="confirm foto" aria-describedby="fileHelpId"/>
                                    <div id="fileHelpId" class="form-text"></div>
                                  </div>

                                  <div class="mb-3">
                                    <label for="" class="form-label">Username</label>
                                    <input type="text" name="username" id="" class="form-control" value="{{$user->username}}" placeholder="Masukan Username" aria-describedby="helpId" required>
                                  </div>

                                  <div class="mb-3">
                                    <label for="" class="form-label">Password</label>
                                    <input type="password" name="password" id="" class="form-control" placeholder="Masukan Password Baru" aria-describedby="helpId" required>
                                  </div>

                                  <div class="mb-3">
                                    <label for="" class="form-label">Nama User</label>
                                    <input type="text" name="nama" id="" class="form-control"  value="{{$user->nama}}" placeholder="Masukan Nama User" aria-describedby="helpId" required>
                                  </div>

                                  <div class="mb-3">
                                    <label for="" class="form-label">Level</label>
                                    <select name="level" id="" class="form-control">
                                        <option value="Admin">Admin</option>
                                        <option value="Sekretaris">Sekretaris</option>
                                    </select>
                                  </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a href="/user" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection