<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Konversi Nilai</title>
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
        <div class="row justify-content-center">
            <div class="col-md-6 bg-light mt-5 p-4 rounded">
                <h3 class="my-3"><b>Konversi Nilai</b></h3>
                <form id="convert">
                    <div class="form-group">
                        <label for="nilai">Nilai</label>
                        <input type="number" class="form-control" id="nilai" name="nilai" placeholder="Masukkan Nilai">
                    </div>
                    <button class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#convert').submit(function(e) {
                e.preventDefault();
                var nilai = $('#nilai').val();
                $.ajax({
                    url: '/process.php',
                    type: 'POST',
                    data: {
                        nilai: nilai
                    },
                    success: function(data) {
                        console.log(data);
                        var data = JSON.parse(data);
                        swal({
                            title: "Anda Mendpatkan Grade",
                            text: data,
                            icon: "success",
                            button: "OK",
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>