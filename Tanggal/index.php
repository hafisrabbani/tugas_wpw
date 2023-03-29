<?php
date_default_timezone_set('Asia/Jakarta');
function tanggalIndonesia() :?string{
    // Format (Hari, Tanggal Bulan Tahun)
    $day = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    $month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    $date = date('d-m-Y');
    $date = explode('-', $date);

    $day = $day[date('w')];
    $month = $month[(int)$date[1] - 1];
    $year = $date[2];

    return $day . ', ' . $date[0] . ' ' . $month . ' ' . $year;
}

$date = (isset($_GET['date'])) ? $_GET['date'] : null;

if(isset($date)){
    echo json_encode(tanggalIndonesia());
    exit;
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tanggal Indonesia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<style>
    body {
        background: #eaeaea;
    }

    /* centering container */
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .row {
        width: 100%;
    }

    .col-md-6 {
        margin: 0 auto;
    }
</style>

<body>

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 bg-light mt-5 p-4 rounded">
                <h3 class="my-3 text-center">Sekarang Hari : <span id="date"></span></h3>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>

        function getTime() {
            $.ajax({
                url: '?date',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#date').html(data);
                }
            });
        }
        $(document).ready(function() {
            getTime();
            setInterval(function() {
                getTime();
            }, 10000);
        });
    </script>
</body>

</html>