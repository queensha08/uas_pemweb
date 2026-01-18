@extends('layouts.master')

@section('title', 'Edit Profil')

@section('content')
<div class="content-wrapper">
    <section class="content py-5">
        <div class="container-fluid">
            <div class="row justify-content-center">

                <div class="col-lg-6 col-md-8">
                    <div class="card shadow-lg border-0 rounded-4">

                        {{-- HEADER --}}
                        <div class="card-header text-white rounded-top-4"
                             style="background: linear-gradient(135deg, #4e73df, #1cc88a);">
                            <h4 class="mb-0"><i class="fas fa-user-edit"></i> Edit Profil Pengguna</h4>
                        </div>

                        {{-- BODY --}}
                        <div class="card-body p-4">

                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Terjadi Kesalahan!</strong>
                                    <ul class="mb-0 mt-2">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            <form action="/profil/update" method="POST" enctype="multipart/form-data">
                                @csrf

                                {{-- FOTO PROFIL --}}
                                <div class="text-center mb-4">
                                    <img id="photoPreview"
                                         src="{{ asset('assets/image/user/' . ($user->photo ?? 'default.jpg')) }}"
                                         class="rounded-circle shadow mb-3"
                                         width="150"
                                         height="150"
                                         style="object-fit: cover;">
                                    <div>
                                        <label for="photo" class="form-label fw-semibold">Foto Profil</label>
                                        <input type="file" class="form-control" id="photo" name="photo"
                                               accept="image/*" onchange="previewPhoto(event)">
                                        <small class="text-muted">Ukuran maksimal: 2MB (JPG, PNG, GIF)</small>
                                    </div>
                                </div>

                                <hr>

                                {{-- NAMA --}}
                                <div class="mb-3">
                                    <label for="nama" class="form-label fw-semibold">Nama Lengkap</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                           id="nama" name="nama" value="{{ old('nama', $user->nama) }}" required>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- USERNAME --}}
                                <div class="mb-3">
                                    <label for="username" class="form-label fw-semibold">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                           id="username" name="username" value="{{ old('username', $user->username) }}" required>
                                    @error('username')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <hr>

                                {{-- PASSWORD BARU (OPSIONAL) --}}
                                <div class="mb-3">
                                    <label for="password" class="form-label fw-semibold">Password Baru (Opsional)</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                           id="password" name="password" placeholder="Biarkan kosong jika tidak ingin mengubah">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- KONFIRMASI PASSWORD --}}
                                <div class="mb-4">
                                    <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password</label>
                                    <input type="password" class="form-control"
                                           id="password_confirmation" name="password_confirmation"
                                           placeholder="Ulangi password baru Anda">
                                </div>

                                {{-- BUTTON --}}
                                <div class="d-flex justify-content-between gap-2">
                                    <a href="/profil" class="btn btn-outline-secondary px-4">
                                        <i class="fas fa-times"></i> Batal
                                    </a>
                                    <button type="submit" class="btn btn-success px-4">
                                        <i class="fas fa-save"></i> Simpan Perubahan
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

<script>
function previewPhoto(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('photoPreview').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}
</script>
@endsection
