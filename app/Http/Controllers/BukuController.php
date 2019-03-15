<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function create(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'judul' => 'required|string',
            'penulis' => 'required|string',
            'penerbit' => 'required|string',
            'supplier' => 'required|string',
            'tahun_terbit' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();
            return [
                'status' =>'error',
                'message' => $errors,
                'result' => null
            ];
        }

        $result = \App\Buku::create($request->all());
        if ($result) {
            return [
                'status' => 'success',
                'message' => 'Data Berhasil Ditambahkan',
                'result' => $result
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'Data Gagal Ditambahkan',
                'result' => null
            ];
        }
    }

    public function read(Request $request)
    {
        $result = \App\Buku::all();
        return [
            'status' => 'success',
            'message' => '',
            'result' => $result
        ];
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'judul' => 'required|string',
            'penulis' => 'required|string',
            'penerbit' => 'required|string',
            'supplier' => 'required|string',
            'tahun_terbit' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();
            return [
                'status' => 'error',
                'message' => $errors,
                'result' => null
            ];
        }

        $buku = \App\Buku::find($id);
        if (empty($buku)) {
            return [
                'status' => 'error',
                'message' => 'Data Tidak Ditemukan',
                'result' => null
            ];
        }

        $result = $buku->update($request->all());
        if ($result) {
            return [
                'status' => 'success',
                'message' => 'Data Berhasil Diubah',
                'result' => $result
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'Data Gagal Diubah',
                'result' => null
            ];
        }
    }

    public function delete(Request $request, $id)
    {
        $buku = \App\Buku::find($id);
        if (empty($buku)) {
            return [
                'status' => 'error',
                'message' => 'Data Tidak Ditemukan',
                'result' => null
            ];
        }

        $result = $buku->delete($id);
        if ($result) {
            return [
                'status' => 'success',
                'message' => 'Data Berhasil Dihapus',
                'result' => $result
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'Data Gagal Dihapus',
                'result' => null
            ];
        }
    }

    public function detail($id)
    {
        $buku = \App\Buku::find($id);

        if (empty($buku)) {
            return [
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
                'result' => null
            ];
        }

        return [
            'status' => 'success',
            'result' => $buku
        ];
    }
}
