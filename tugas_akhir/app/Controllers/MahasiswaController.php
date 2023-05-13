<?php

namespace App\Controllers;

use App\Helpers\Debug;
use App\Models\Mahasiswa;

class MahasiswaController extends BaseController
{
    public function index()
    {
        $data = Mahasiswa::all();
        echo $this->blade->run('admin.data-mahasiswa', ['data' => $data]);
    }

    public function get($id)
    {
        $data = Mahasiswa::where('id', $id)->first();
        // Debug::dd($data);
        echo json_encode($data);
    }

    public function create()
    {

        $foto = $_FILES['foto'] ?? null;
        if ($foto) {
            $targetDir = BASE_PATH . 'public/uploads/';
            $fileName = microtime(true) . '-' . $foto['name'];
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            $allowTypes = ['jpg', 'png', 'jpeg', 'gif'];
            if (!in_array($fileType, $allowTypes)) {
                // set HTTP response code - 400 bad request
                http_response_code(400);
                echo "Tipe file tidak diizinkan.";
                return;
            }
            if (move_uploaded_file($foto['tmp_name'], $targetFilePath)) {
                $fileName = $fileName;
            } else {
                // set HTTP response code - 500 internal server error
                http_response_code(500);
                echo "Terjadi kesalahan saat mengunggah file.";
                return;
            }
        } else {
            $fileName = 'default.png';
        }

        $data = [
            'nama' => input()->post('nama'),
            'nrp' => input()->post('nrp'),
            'prodi' => input()->post('prodi'),
            'alamat' => input()->post('alamat'),
            'hobi' => input()->post('hobi'),
            'ukm' => input()->post('ukm'),
            'gender' => input()->post('gender'),
            'email' => input()->post('email'),
            'foto' => $fileName
        ];
        $data = Mahasiswa::create($data);
        if ($data) {
            // set HTTP response code - 201 created
            http_response_code(201);
            echo json_encode($data);
        } else {
            // set HTTP response code - 503 service unavailable
            http_response_code(503);
            echo json_encode($data);
        }
    }

    public function edit()
    {
        $id = input()->post('id');
        $mahasiswa = Mahasiswa::find($id);
        if (!$mahasiswa) {
            // set HTTP response code - 404 not found
            http_response_code(404);
            echo "Mahasiswa dengan ID $id tidak ditemukan.";
            return;
        }
        $foto = $_FILES['foto'] ?? null;
        if ($foto) {
            $targetDir = BASE_PATH . 'public/uploads/';
            $fileName = microtime(true) . '-' . $foto['name'];
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            $allowTypes = ['jpg', 'png', 'jpeg', 'gif'];
            if (!in_array($fileType, $allowTypes)) {
                // set HTTP response code - 400 bad request
                http_response_code(400);
                echo "Tipe file tidak diizinkan.";
                return;
            }
            if (move_uploaded_file($foto['tmp_name'], $targetFilePath)) {
                $fileName = $fileName;
            } else {
                // set HTTP response code - 500 internal server error
                http_response_code(500);
                echo "Terjadi kesalahan saat mengunggah file.";
                return;
            }
        } else {
            $fileName = $mahasiswa->foto;
        }



        $data = [
            'nama' => input()->post('nama'),
            'nrp' => input()->post('nrp'),
            'prodi' => input()->post('prodi'),
            'alamat' => input()->post('alamat'),
            'hobi' => input()->post('hobi'),
            'ukm' => input()->post('ukm'),
            'gender' => input()->post('gender'),
            'email' => input()->post('email'),
            'foto' => $fileName
        ];

        $updated = $mahasiswa->update($data);
        if ($updated) {
            // set HTTP response code - 200 ok
            http_response_code(200);
            echo "Data mahasiswa dengan ID $id berhasil diubah.";
        } else {
            // set HTTP response code - 503 service unavailable
            http_response_code(503);
            echo "Terjadi kesalahan saat mengubah data mahasiswa.";
        }
    }

    public function delete($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if (!$mahasiswa) {
            // set HTTP response code - 404 not found
            http_response_code(404);
            echo "Mahasiswa dengan ID $id tidak ditemukan.";
            return;
        }
        $deleted = $mahasiswa->delete();
        if ($deleted) {
            // set HTTP response code - 200 ok
            http_response_code(200);
            echo "Data mahasiswa dengan ID $id berhasil dihapus.";
        } else {
            // set HTTP response code - 503 service unavailable
            http_response_code(503);
            echo "Terjadi kesalahan saat menghapus data mahasiswa.";
        }
    }
}
