<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="navbar">
    <h2>Sistem Manajemen Buku</h2>
    <span>CRUD Laravel</span>
</div>

<div class="container">

    <h1 class="page-title">Daftar Buku</h1>

    <div class="card">

        <div class="header">

            <div>
                <strong>Total Buku:</strong>
                {{ count($buku) }}
            </div>

            <a href="{{ route('buku.create') }}"
               class="btn btn-primary">
                Tambah Buku
            </a>

        </div>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table>

            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($buku as $index => $item)

                <tr>

                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->penulis }}</td>
                    <td>{{ $item->penerbit }}</td>
                    <td>{{ $item->tahun }}</td>

                    <td>

                        <div class="action-buttons">

                            <a href="{{ route('buku.edit', $item->id) }}"
                               class="btn btn-warning">
                                Edit
                            </a>

                            <form action="{{ route('buku.destroy', $item->id) }}"
                                  method="POST">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus data buku ini?')">
                                    Hapus
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="6" align="center">
                        Belum ada data buku.
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<div class="footer">
    © 2026 Sistem Manajemen Buku
</div>

</body>
</html>