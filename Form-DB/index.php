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
        width: 100%;
        height: 100%;
        background: #fff;
        font-family: 'Noto Sans', sans-serif;
        background: #0f0c29;
        background: -webkit-linear-gradient(to right, #24243e, #302b63, #0f0c29);
        background: linear-gradient(to right, #24243e, #302b63, #0f0c29);
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

    .col-md-10 {
        margin: 0 auto;
        background: rgba(39, 40, 39, 0.1) !important;
        color: white !important;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37) !important;
        backdrop-filter: blur(4px) !important;
        -webkit-backdrop-filter: blur(4px) !important;
        border-radius: 10px !important;
        border: 1px solid rgba(255, 255, 255, 0.18) !important;
    }

    .btn-glass {
        background: rgba(255, 255, 255, 0.1) !important;
        color: white !important;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37) !important;
        backdrop-filter: blur(4px) !important;
        -webkit-backdrop-filter: blur(4px) !important;
        border-radius: 3px !important;
        border: 1px solid rgba(255, 255, 255, 0.18) !important;
    }

    table {
        color: white !important;
    }
</style>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 bg-light mt-5 p-4 rounded">
                <h3 class="my-3"><b>Data Mahasiswa</b></h3>
                <button type="button" class="btn btn-primary mb-3 btn-glass" onclick="showModal('tambah')">
                    + Data
                </button>

                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NRP</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Prodi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="submitform">
                        <input type="hidden" name="id_mhs" id="id_mhs">
                        <div class="mb-3">
                            <label for="nrp" class="form-label">NRP</label>
                            <input type="text" class="form-control" id="nrp" name="nrp">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="prodi" class="form-label">Prodi</label>
                            <input type="text" class="form-control" id="prodi" name="prodi">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#submitform').submit(function(e) {
                e.preventDefault();
                if ($('#id_mhs').val() == '') {
                    var url = '/process.php?action=insert';
                } else {
                    var url = '/process.php?action=update';
                }
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        id: $('#id_mhs').val(),
                        nrp: $('#nrp').val(),
                        nama: $('#nama').val(),
                        prodi: $('#prodi').val(),
                    },
                    success: function(response) {
                        var data = JSON.parse(response);
                        swal({
                            title: data.title,
                            text: data.message,
                            icon: 'success',
                            button: "OK",
                        }).then(function() {
                            location.reload();
                        });
                    }
                })
            })
            $.ajax({
                url: '/process.php?action=get',
                method: 'GET',
                beforeSend: function() {
                    $('#table tbody').html(`
                        <tr>
                            <td colspan="5" class="text-center">Loading...</td>
                        </tr>
                    `);
                },
                success: function(response) {
                    $('#table tbody').html('');
                    var data = JSON.parse(response);
                    $.each(data.data, function(index, value) {
                        $('#table tbody').append(`
                            <tr>
                                <th scope="row">${index + 1}</th>
                                <td>${value.nrp}</td>
                                <td>${value.nama}</td>
                                <td>${value.prodi}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" onclick="showModal('edit', ${value.id})">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" onclick="confDel(${value.id})">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        `);
                    });
                }
            });
        });

        function showModal(action, id = null) {
            console.log(action);
            if (action == 'tambah') {
                new bootstrap.Modal(document.getElementById('modal')).show();
                $('#modalLabel').html('Tambah Data');
            } else if (action == 'edit') {
                new bootstrap.Modal(document.getElementById('modal')).show();
                $('#modalLabel').html('Edit Data');
                $('#id_mhs').val(id);
                $.ajax({
                    url: '/process.php?action=get&id=' + id,
                    method: 'GET',
                    success: function(response) {
                        var data = JSON.parse(response);
                        data = data.data[0];
                        $('#nrp').val(data.nrp);
                        $('#nama').val(data.nama);
                        $('#prodi').val(data.prodi);
                    }
                });
            }
        }

        function confDel(id) {
            swal({
                title: "Are you sure?",
                text: "Jika data dihapus, data tidak dapat dikembalikan!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: '/process.php?action=delete&id=' + id,
                        method: 'GET',
                        success: function(response) {
                            var data = JSON.parse(response);
                            swal({
                                title: "Berhasil",
                                text: data.message,
                                icon: 'success',
                                button: "OK",
                            }).then(function() {
                                location.reload();
                            });
                        }
                    });
                } else {
                    swal("Your imaginary file is safe!");
                }
            });
        }
    </script>
</body>

</html>