<?php

require_once 'validate.php';
require_once 'response.php';
$input = $_POST;

$rules = [
    'nama' => 'required|isAlphabet',
    'nilai' => 'required|min:1|max:100|numeric'
];

$messages = [
    'nama' => [
        'required' => 'Nama tidak boleh kosong',
        'isAlphabet' => 'Nama hanya boleh berisi huruf'
    ],
    'nilai' => [
        'required' => 'Nilai tidak boleh kosong',
        'integer' => 'Nilai hanya boleh berisi angka',
        'min' => 'Nilai minimal 0',
        'max' => 'Nilai maksimal 100'
    ]
];

$validation = new Validation($input, $rules, $messages);
$errors = $validation->validate();
if (count($errors) > 0) {
    $response = new Response(400, 'Data tidak valid', $errors);
    $response->send();
} else {
    $nama = $input['nama'];
    $nilai = $input['nilai'];
    $grade = convertGrade($nilai);
    $response = new Response(200, 'Data valid', [
        'nama' => $nama,
        'nilai' => $nilai,
        'grade' => $grade
    ]);
    $response->send();
}


function convertGrade(int $nilai): string
{
    if ($nilai <= 100 && $nilai >= 81) {
        $grade = 'A';
    } else if ($nilai <= 80 && $nilai >= 71) {
        $grade = 'AB';
    } else if ($nilai <= 70 && $nilai >= 66) {
        $grade = 'B';
    } else if ($nilai <= 65 && $nilai >= 60) {
        $grade = 'BC';
    } else if ($nilai <= 59 && $nilai >= 56) {
        $grade = 'C';
    } else if ($nilai <= 55 && $nilai >= 41) {
        $grade = 'D';
    } else if ($nilai <=  41 && $nilai >= 0) {
        $grade = 'E';
    } else {
        $grade = 'Nilai tidak valid';
    }

    return $grade;
}
