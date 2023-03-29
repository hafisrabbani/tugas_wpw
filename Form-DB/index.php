<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Konversi Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://kit.fontawesome.com/1d954ea888.js"></script>
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

    .circle-1 {
        position: absolute;
        top: 25%;
        left: 30%;
        background: #4776E6;
        background: -webkit-linear-gradient(to right, #8E54E9, #4776E6);
        background: linear-gradient(to right, #8E54E9, #4776E6);
        height: 250px;
        width: 250px;
        border-radius: 50%;
    }

    .circle-2 {
        position: absolute;
        bottom: 5%;
        right: 40%;
        background: #bc4e9c;
        background: -webkit-linear-gradient(to right, #f80759, #bc4e9c);
        background: linear-gradient(to right, #f80759, #bc4e9c);
        height: 300px;
        width: 300px;
        border-radius: 50%;
    }

    .circle-3 {
        position: absolute;
        top: 30%;
        right: 35%;
        background-color: #FF3CAC;
        background: #ff9966;
        background: -webkit-linear-gradient(to right, #ff5e62, #ff9966);
        background: linear-gradient(to right, #ff5e62, #ff9966);
        height: 100px;
        width: 100px;
        border-radius: 50%;
    }
</style>

<body>
    <div class="circle-1"></div>
    <div class="circle-2"></div>
    <div class="circle-3"></div>
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
                            <th scope="col">Alamat</th>
                            <th scope="col">Hobi</th>
                            <th scope="col">UKM</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Email</th>
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
                        <div class="row">
                            <div class="col-md-6">
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
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="hobi" class="form-label">hobi</label>
                                    <input type="text" class="form-control" id="hobi" name="hobi">
                                </div>
                                <div class="mb-3">
                                    <label for="ukm" class="form-label">ukm</label>
                                    <input type="text" class="form-control" id="ukm" name="ukm">
                                </div>
                                <div class="mb-3">
                                    <label for="gender" class="form-label">gender</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="0" disabled>-- pilih gender --</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                            </div>
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
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.table').DataTable();
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
                        alamat: $('#alamat').val(),
                        hobi: $('#hobi').val(),
                        ukm: $('#ukm').val(),
                        gender: $('#gender').val(),
                        email: $('#email').val(),
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
                                <td>${value.alamat}</td>
                                <td>${value.hobi}</td>
                                <td>${value.ukm}</td>
                                <td>${value.gender}</td>
                                <td>${value.email}</td>
                                <td class="d-flex">
                                    <button type="button" class="btn btn-warning text-white" onclick="showModal('edit', ${value.id})">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                    &nbsp;
                                    <button type="button" class="btn btn-danger" onclick="confDel(${value.id})">
                                        <i class="fas fa-trash"></i>
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
                $('#gender').val(0);
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
                        $('#alamat').val(data.alamat);
                        $('#hobi').val(data.hobi);
                        $('#ukm').val(data.ukm);
                        $('#gender').val(data.gender);
                        $('#email').val(data.email);
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