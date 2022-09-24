<?php
    $nama_depan = "Firdaus";
    $nama_belakang = "Hafidz Al-kaff";

    // function
    function salam() {
        return "Selamat Datang Firdaus";
    }

    // // function dengan parameter
    // function salampembuka ($Nama) {
    // }

    $siswa = [
        "Hegel",
        "Danar",
        "Akbar",
    ];

    // array multidimensi
    $datasiswa = [
        [
            "Nama" => "Hegel",
            "Umur" => "17",
            "Kota" => "Kudus",
            "Foto" => "Batman.jpg
            ",
        ],
        [
            "Nama" => "Danar",
            "Umur" => "15",
            "Kota" => "Jaktim",
            "Foto" => "Foto1.jpeg",
        ],[
            "Nama" =>"Akbar",
            "Umur" =>"17",
            "Kota" =>"Semarang",
            "Foto" => "Kingbob.png",
        ],
    ];

    // print_r($datasiswa[1][0]." ".$datasiswa[2][0]);
        
    require "function.php";

    $datasiswa = mysqli_query($conn, "SELECT * FROM tb_siswa");
    

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar PHP Dasar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        body {
            width: 100%;
            height: 100vh;
        }

        h1 {
            font-weight: 800;
        }

        .container {
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        h1 {
            width: 100%;
            text-align: center;
        }

        tbody tr:nth-child(odd) {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>

    <?php
    include "Navbar.php";
    ?>

    <div class="container mt-5">
        <h1>SISWA 11 PPLG 1</h1>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                    <a href="Tambah.php" type="button" class="btn btn-primary float-end">Tambah Data Baru</a>

                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Umur</th>
                                    <th>Asal</th>
                                    <!-- <th>Foto</th> -->
                                    <th>Aksi</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($datasiswa as $siswa) : ?>
                                    <tr>
                                        <td><?= $siswa["Id"] ?></td>
                                        <td><?= $siswa["Nama"]; ?></td>
                                        <td><?= $siswa["Umur"]; ?></td>
                                        <td><?= $siswa["Alamat"]; ?></td>
                                        <!-- <td>
                                            
                                            <img src="img/<?= $siswa["Foto"]; ?>" width="100" height="100">   
                                        </td> -->
                                           
                                        <td>
                                            <a type="button" class="btn btn-info" href="" data-toggle="modal" data-target="#exampleModal<?= $siswa["Id"]; ?>">Detail</a>
                                            <a type="button" class="btn btn-warning" href="ubah.php?Id=<?= $siswa["Id"]; ?>">Ubah</a>
                                            <a type="button" onclick="return confirm('Yakin mau hapus ?')" class="btn btn-danger" href="hapus.php?Id=<?= $siswa["Id"]; ?>">Hapus</a>
                                        </td>
                                        <td><?= $siswa["created"]; ?></td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal<?= $siswa["Id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail data siswa</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Nama</label>
                                                        <input type="text" class="form-control" name="Nama" id="Nama" value="<?= $siswa["Nama"]; ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Umur</label>
                                                        <input type="text" class="form-control" name="Nama" id="Nama" value="<?= $siswa["Umur"]; ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Alamat</label>
                                                        <input type="text" class="form-control" name="Nama" id="Nama" value="<?= $siswa["Alamat"]; ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Foto</label>
                                                        <img src="img/<?= $siswa["Foto"]; ?>" width="100" height="100">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a type="button" class="btn btn-warning" href="ubah.php?Id=<?= $siswa["Id"]; ?>">Ubah</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>