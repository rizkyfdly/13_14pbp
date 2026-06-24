<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="navbar">
    <h2>Sistem Manajemen Buku</h2>
    <span>CRUD Laravel</span>
</div>

<div class="container">

    <h1 class="page-title">Edit Buku</h1>

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

        <form action="{{ route('buku.update', $buku->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Judul Buku</label>
                <input type="text"
                       name="judul"
                       class="form-control"
                       value="{{ old('judul', $buku->judul) }}">
            </div>

            <div class="form-group">
                <label>Penulis</label>
                <input type="text"
                       name="penulis"
                       class="form-control"
                       value="{{ old('penulis', $buku->penulis) }}">
            </div>

            <div class="form-group">
                <label>Penerbit</label>
                <input type="text"
                       name="penerbit"
                       class="form-control"
                       value="{{ old('penerbit', $buku->penerbit) }}">
            </div>

            <div class="form-group">
                <label>Tahun Terbit</label>
                <input type="text"
                       name="tahun"
                       class="form-control"
                       value="{{ old('tahun', $buku->tahun) }}">
            </div>

            <button type="submit"
                    class="btn btn-success">
                Update
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