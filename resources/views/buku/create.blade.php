<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="navbar">
    <h2>Sistem Manajemen Buku</h2>
    <span>CRUD Laravel</span>
</div>

<div class="container">

    <h1 class="page-title">Tambah Buku</h1>

    <div class="card">

        @if($errors->any())

            <div class="alert-danger">

                <ul>

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('buku.store') }}"
              method="POST">

            @csrf

            <div class="form-group">
                <label>Judul Buku</label>
                <input type="text"
                       name="judul"
                       class="form-control"
                       value="{{ old('judul') }}">
            </div>

            <div class="form-group">
                <label>Penulis</label>
                <input type="text"
                       name="penulis"
                       class="form-control"
                       value="{{ old('penulis') }}">
            </div>

            <div class="form-group">
                <label>Penerbit</label>
                <input type="text"
                       name="penerbit"
                       class="form-control"
                       value="{{ old('penerbit') }}">
            </div>

            <div class="form-group">
                <label>Tahun Terbit</label>
                <input type="text"
                       name="tahun"
                       class="form-control"
                       value="{{ old('tahun') }}">
            </div>

            <button type="submit"
                    class="btn btn-success">
                Simpan
            </button>

            <a href="{{ route('buku.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

<div class="footer">
    © 2026 Sistem Manajemen Buku
</div>

</body>
</html>