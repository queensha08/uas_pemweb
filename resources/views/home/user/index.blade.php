@extends('layouts.master')
@section('title', 'Kelola Data User')
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
                            <h4>Kelola Data User</h4>
                            <a href="/user/tambah" class="btn btn-primary">Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-hover table-boerdered">
                                    <thead>
                                        <tr>
                                            <th>Id User</th>
                                            <th>Photo</th>
                                            <th>Username</th>
                                            <th>Nama User</th>
                                            <th>Level</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $u)
                                        <tr>
                                            <td>{{$u->id}}</td>
                                            <td><img class="img-xs rounded-circle ml-2" src="{{ asset("assets/image/user/$u->photo") }}" alt="" width="50px" height="50px"></td>
                                            <td>{{$u->username}}</td>
                                            <td>{{$u->nama}}</td>
                                            <td>{{$u->level}}</td>
                                            <td>
                                                <a href="/user/{{$u->id}}/edit" class="edit-link"><span class="fa fa-edit"></span></a>
                                                <a href="#" 
                                                    class="delete-link btn-delete" 
                                                    data-url="/user/{{$u->id}}/hapus">
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
