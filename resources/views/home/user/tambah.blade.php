@extends('layouts.master')
@section('title', 'Tambah Data User')
@section('content')
    
<div class="content-wrapper">
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah Data User</h4>
                        </div>
                        <div class="card-body">
                            <form action="/user/simpan" method="POST" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                  <div class="mb-3">
                                    <label for="" class="form-label">Foto</label>
                                    <input type="file" class="form-control" name="photo" id="" placeholder="confirm foto" aria-describedby="fileHelpId"
                                    />
                                    <div id="fileHelpId" class="form-text"></div>
                                  </div>
                                  <div class="mb-3">
                                    <label for="" class="form-label">Username</label>
                                    <input type="text" name="username" id="" class="form-control" placeholder="Masukan Username" aria-describedby="helpId" required>
                                  </div>

                                  <div class="mb-3">
                                    <label for="" class="form-label">Password</label>
                                    <input type="password" name="password" id="" class="form-control" placeholder="Masukan Password " aria-describedby="helpId" autocomplete="new-password" required>
                                  </div>

                                  <div class="mb-3">
                                    <label for="" class="form-label">Nama User</label>
                                    <input type="text" name="nama" id="" class="form-control" placeholder="Masukan Nama User" aria-describedby="helpId" required>
                                    
                                  </div>

                                  <div class="mb-3">
                                    <label for="" class="form-label">Level</label>
                                    <select name="level" id="" class="form-control">
                                        <option value="Admin">Admin</option>
                                        <option value="Sekretaris">Sekretaris</option>
                                    </select>
                                  </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection