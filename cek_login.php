<?php

//panggil koneksi database
include "koneksi.php";


$email = mysqli_escape_string($koneksi, $_POST['email']);
$password = mysqli_escape_string($koneksi, $_POST['password']);

//cek username, terdaftar atau tidak
$cek_user = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE email = '$email' and password='$password' ");
$user_valid = mysqli_fetch_array($cek_user);
//uji jika username terdaftar
if ($user_valid) {
    //jika username terdaftar
    //cek password sesuai atau tidak
    if ($password == $user_valid['password']) {
        //jika password sesuai
        //buat session
        session_start();
        $_SESSION['email'] = $user_valid['email'];
        $_SESSION['password'] = $user_valid['password'];

        //uji password user
        if ($password !== $repassword) {
            header('location:admin.php');
        }
    } else {
        echo "<script>alert('Periksa Kembali Email Dan Password Anda');document.location='index.php'</script>";
    }
} else {
    echo "<script>alert('Periksa Kembali Email Dan Password Anda');document.location='index.php'</script>";
}
?>