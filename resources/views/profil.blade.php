@extends('layouts.master')

@section('title', 'Profil Saya')

@section('content')
<div class="content-wrapper">
    <section class="content py-5">
        <div class="container-fluid">
            <div class="row justify-content-center">

                <div class="col-lg-5 col-md-7">
                    <div class="card shadow-lg border-0 rounded-4">

                        {{-- HEADER --}}
                        <div class="card-header text-center text-white rounded-top-4"
                             style="background: linear-gradient(135deg, #4e73df, #1cc88a);">
                            <h4 class="mb-0">Profil Pengguna</h4>
                            <small>Sistem Informasi Dokumentasi</small>
                        </div>

                        {{-- BODY --}}
                        <div class="card-body text-center p-">

                            {{-- FOTO PROFIL --}}
                            <div class="position-relative mb-4">
                                <img src="{{ asset('assets/image/user/' . ($user->photo ?? 'default.jpg')) }}"
                                     class="rounded-circle shadow"
                                     width="280"
                                     height="280"
                                     style="object-fit: cover; margin-top: 50px; background: #fff;">
                            </div>

                            {{-- NAMA --}}
                            <h3 class="fw-bold mb-1">{{ $user->nama }}</h3>
                            <h3><span class="badge bg-primary mb-4">{{ $user->level }}</span></h3>

                            {{-- INFO --}}
                            <div class="list-group list-group-flush text-start mt-4">
                                <div class="list-group-item d-flex justify-content-between">
                                    <span class="fw-semibold">Username</span>
                                    <span>{{ $user->username }}</span>
                                </div>
                                <div class="list-group-item d-flex justify-content-between">
                                    <span class="fw-semibold">Password</span>
                                    <span>********</span>
                                </div>
                                <div class="list-group-item d-flex justify-content-between">
                                    <span class="fw-semibold">Bergabung</span>
                                    <span>{{ $user->created_at->format('d M Y') }}</span>
                                </div>
                            </div>

                            {{-- BUTTON --}}
                            <div class="d-flex justify-content-center gap-2 mt-4">
                                <a href="/dashboard" class="btn btn-outline-secondary px-4">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                                <a href="/profil/edit" class="btn btn-primary px-4">
                                    <i class="fas fa-edit"></i> Edit Profil
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection
