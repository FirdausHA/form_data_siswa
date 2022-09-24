<?php
    $conn = mysqli_connect("localhost", "root", "", "db_sekolah");
    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows; //kembalikan wadah (array)
    }

    //function tambah
    function tambah ($data){
        global $conn;
        $nama   = htmlspecialchars  ($data["Nama"]);
        $umur   = htmlspecialchars  ($data["Umur"]);
        $alamat = htmlspecialchars  ($data["Alamat"]);
        // $foto   = htmlspecialchars  ($data["Foto"]);

        
        $foto = upload_foto();
        if (!$foto) {
            return false;
        }
        $tanggal = htmlspecialchars($data[date('Y-m-d')]);

        $query = "INSERT INTO tb_siswa VALUES ('','$nama', '$umur', '$alamat', '$foto', CURRENT_TIMESTAMP)";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }
    function hapus($Id){
        global $conn;
        mysqli_query($conn,"DELETE FROM tb_siswa WHERE Id = $Id");
        return mysqli_affected_rows($conn);
    }

    function ubah($data) {
        global $conn;
        $Id = $_GET['Id'];
        $nama   = htmlspecialchars ($data["Nama"]);
        $umur   = htmlspecialchars ($data["Umur"]);
        $alamat = htmlspecialchars ($data["Alamat"]);
        // $foto   = htmlspecialchars ($data["Foto"]);

        $Foto_lama = $data['Foto_lama'];
        $noUploadFoto = $_FILES['Foto']['error'];

        if ($noUploadFoto === 4) {
            $foto = $Foto_lama;
        }else {
            $foto = upload_foto();
        }

        $query = "UPDATE tb_siswa SET Nama = '$nama', Umur = $umur, Alamat = '$alamat', Foto = '$foto', created =  CURRENT_TIMESTAMP WHERE Id = $Id";


        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    // function untuk menerima foto
    function upload_foto(){
        $namaFoto = $_FILES['Foto']['name']; //menerima foto
        $ukuranFoto = $_FILES['Foto']['size']; //menerima ukuran foto
        $errorFoto = $_FILES['Foto']['error'];//mengetahui error atau tidak
        $tempFoto = $_FILES['Foto']['tmp_name'];//menaruh foto sementara

        // cek upload_foto
        if ($errorFoto === 4) {
           echo "<script>
                  alert('Mohon Upload Foto Terlebih Dahulu !');
           </script>";
           return false;
        }

            // cek ekstensi file
     $ektensiFotoValid = ['jpg', 'jpeg', 'png', 'gif'];//mengatur format apa saja yang bisa diupload
     $ektensiFoto      = explode('.', $namaFoto);//memisahkan nama foto dan ekstensi
     $ektensiFoto      = strtolower(end($ektensiFoto));//mengambil ektensi dari paling akhir

      // cek upload_foto
        if (!in_array($ektensiFoto, $ektensiFotoValid)) {
            echo "<script>
                alert('File yang anda upload bukan gambar !');
            </script>";
            return false;
        }

        if ($ukuranFoto == 1000000) {
            echo "<script>
                alert('Ukuran file terlalu besar !')
            </script>";
            return false;
        }
        //  jika sudah melewati beberapa validasi, maka file akan disimpan ke storage
        $date = date('YmdHis');
        move_uploaded_file($tempFoto, 'img/' . $date . $namaFoto);
        return $date . $namaFoto;

    }


?>