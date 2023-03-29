<?php
include 'Helper/DB.php';
include 'Helper/Response.php';
$action = $_GET['action'];

switch ($action) {
    case 'insert':
        insert($_POST);
        break;
    case 'get':
        get((isset($_GET['id'])) ? $_GET['id'] : null);
        break;
    case 'update':
        update($_POST);
        break;
    case 'delete':
        delete($_GET['id']);
        break;
    default:
        break;
}

function dd($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    die();
}

function insert($data)
{
    $db = new DB();
    $query = $db->query('INSERT INTO mahasiswa (nrp,nama,prodi,alamat,hobi,ukm,gender,email,last_update) VALUES ( :nrp, :nama, :prodi, :alamat, :hobi, :ukm, :gender, :email, :last_update )', [
        'nrp' => (int)$data['nrp'],
        'nama' => $data['nama'],
        'prodi' => $data['prodi'],
        'alamat' => $data['alamat'],
        'hobi' => $data['hobi'],
        'ukm' => $data['ukm'],
        'gender' => $data['gender'],
        'email' => $data['email'],
        'last_update' => date('Y-m-d H:i:s')
    ]);
    $response = new Response(200, ($query) ? 'Data berhasil ditambahkan' : 'Data gagal ditambahkan', []);
    return $response->send();
}

function get($id = null)
{
    $db = new DB();
    $query = ($id) ? $db->row('SELECT * FROM mahasiswa WHERE id = :id', ['id' => $id]) : $db->row('SELECT * FROM mahasiswa');
    $response = new Response(200, 'Data berhasil diambil', $query);
    return $response->send();
}

function update($data)
{
    $db = new DB();
    $query = $db->query('UPDATE mahasiswa SET nrp = :nrp, nama = :nama, prodi = :prodi, alamat = :alamat, hobi = :hobi, ukm = :ukm, gender = :gender, email = :email, last_update = :last_update WHERE id = :id', [
        'id' => $data['id'],
        'nrp' => $data['nrp'],
        'nama' => $data['nama'],
        'prodi' => $data['prodi'],
        'alamat' => $data['alamat'],
        'hobi' => $data['hobi'],
        'ukm' => $data['ukm'],
        'gender' =>  $data['gender'],
        'email' => $data['email'],
        'last_update' => date('Y-m-d H:i:s')
    ]);



    $response = new Response(200, ($query) ? 'Data berhasil diubah' : 'Data gagal diubah', []);
    return $response->send();
}

function delete($id)
{
    $db = new DB();
    $query = $db->query('DELETE FROM mahasiswa WHERE id = :id', ['id' => $id]);

    $response = new Response(200, ($query) ? 'Data berhasil dihapus' : 'Data gagal dihapus', []);
    return $response->send();
}
