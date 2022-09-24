<?php
    $koneksi = mysqli_connect("localhost","root","","db_sekolah");

    $Id = $_GET["Id"];

    $query = "DELETE FROM tb_siswa WHERE Id = $Id";
    mysqli_query($koneksi, $query);

    if (mysqli_affected_rows($koneksi) > 0) {
        echo
        "<script>
        alert('data berhasil dihapus')
        document.location.href = 'index.php';
        </script>
        ";
    }
    else {
        echo
        "<script>
        alert('data gagal ditambahkan')
        document.location.href = 'index.php';
        </script>
        ";    
    }


?>   