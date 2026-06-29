<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Buku;

class BukuService
{
    public function tambahBuku($judul, $penulis, $penerbit, $tahun)
    {
        Buku::create([
            'judul' => $judul,
            'penulis' => $penulis,
            'penerbit' => $penerbit,
            'tahun' => $tahun
        ]);

        return "Data buku berhasil ditambahkan";
    }
}

$server = new SoapServer(null, [
    'uri' => 'http://localhost/soap'
]);

$server->setClass(BukuService::class);

$server->handle();