<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class SoapController extends Controller
{
    // SOAP SERVER
    public function server()
    {
        $server = new \SoapServer(null, [
            'uri' => 'http://localhost/soap-server'
        ]);

        $server->addFunction(function ($judul, $penulis, $penerbit, $tahun) {

            Buku::create([
                'judul' => $judul,
                'penulis' => $penulis,
                'penerbit' => $penerbit,
                'tahun' => $tahun
            ]);

            return "Data buku berhasil ditambahkan";
        });

        $server->handle();
    }

    // SOAP CLIENT
    public function client(Request $request)
    {
        $hasil = null;

        if ($request->isMethod('post')) {

            $client = new \SoapClient(null, [
                'location' => url('/soap/server'),
                'uri' => 'http://localhost/soap-server',
                'trace' => 1
            ]);

            $hasil = $client->__soapCall('', [
                $request->judul,
                $request->penulis,
                $request->penerbit,
                $request->tahun
            ]);
        }

        return view('soap.client', compact('hasil'));
    }
}