<?php
include "../includes/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // ambil data dari form
    $nis            = $_POST['nis'];
    $nama           = $_POST['nama'];
    $email          = $_POST['email'];
    $password       = $_POST['password'];
    $jenis_kelamin  = $_POST['jenis_kelamin'];
    $id_kelas       = $_POST['id_kelas'];

    // hash password supaya aman
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // query simpan data
    $query = "INSERT INTO tb_user 
              (nis, nama, email, password, jenis_kelamin, id_kelas, role)
              VALUES 
              ('$nis', '$nama', '$email', '$password_hash', '$jenis_kelamin', '$id_kelas', 'siswa')";

    $simpan = mysqli_query($koneksi, $query);

    if ($simpan) {
        echo "<script>
                alert('Pendaftaran berhasil');
                window.location='login.php';
              </script>";
    } else {
        echo "<script>
                alert('Pendaftaran gagal');
                window.history.back();
              </script>";
    }
}
