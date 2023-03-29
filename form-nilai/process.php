<?php
if (isset($_POST['nilai'])) {
    $nilai = $_POST['nilai'];
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

    echo json_encode($grade);
}
