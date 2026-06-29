<?php

$hasil = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    try {

        $client = new SoapClient(null, [
            'location' => 'http://localhost/13_14pbp/public/soap_server.php',
            'uri' => 'http://localhost/soap'
        ]);

        $hasil = $client->tambahBuku(
            $_POST['judul'],
            $_POST['penulis'],
            $_POST['penerbit'],
            $_POST['tahun']
        );

    } catch (Exception $e) {

        $hasil = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>SOAP Client Buku</title>
</head>
<body>

<h2>SOAP Client</h2>

<form method="post">
    <input type="text" name="judul" placeholder="Judul" required><br><br>
    <input type="text" name="penulis" placeholder="Penulis" required><br><br>
    <input type="text" name="penerbit" placeholder="Penerbit" required><br><br>
    <input type="number" name="tahun" placeholder="Tahun" required><br><br>

    <button type="submit">Kirim</button>
</form>

<hr>

<?php echo $hasil; ?>

</body>
</html>