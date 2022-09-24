<?php
    require "function.php";

    if (isset($_POST["submit"])) {
        if (tambah($_POST) > 0) {
            echo "
                <script>
                    alert('Data Berhasil Ditambahkan');
                    document.location.href = 'index.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('data gagal ditambahkan');
                    document.location.href = 'index.php';
                </script>
            ";
        }
    }
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
        /* body {
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
        } */
    </style>
</head>

<body>

    <?php
    include "Navbar.php";
    ?>

    <div class="container">
        <h1>SISWA 11 PPLG 1</h1>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" class="form-control" name="Nama" id="Nama"  placeholder="Masukan Nama Anda" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Umur</label>
                                    <input type="number" class="form-control" name="Umur" id="Umur" placeholder="Masukan Umur Anda" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" class="form-control" name="Alamat" id="Alamat" placeholder="Masukan Alamat Anda" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Foto</label>
                                    <input type="file" class="form-control" name="Foto" id="Foto" placeholder="Masukan Foto Anda">
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</body>

</html>