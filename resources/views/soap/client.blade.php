<!DOCTYPE html>
<html>
<head>
    <title>SOAP Client Buku</title>

    <style>
        body{
            font-family: Arial;
            max-width:700px;
            margin:40px auto;
        }

        input{
            width:100%;
            padding:10px;
            margin-bottom:10px;
        }

        button{
            padding:10px 20px;
        }

        .success{
            margin-top:20px;
            background:#d4edda;
            padding:15px;
            border-radius:5px;
        }
    </style>
</head>
<body>

<h2>SOAP Client - Tambah Buku</h2>

<form method="POST">

    @csrf

    <input type="text" name="judul" placeholder="Judul Buku" required>

    <input type="text" name="penulis" placeholder="Penulis" required>

    <input type="text" name="penerbit" placeholder="Penerbit" required>

    <input type="number" name="tahun" placeholder="Tahun" required>

    <button type="submit">
        Tambah Buku via SOAP
    </button>

</form>

@if($hasil)

<div class="success">
    {{ $hasil }}
</div>

@endif

</body>
</html>