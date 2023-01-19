<?php
$conn = mysqli_connect("localhost", "root", "", "akademik");

function registrasi($data){
    global $conn;

    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $repassword = mysqli_real_escape_string($conn, $data["repassword"]);

    $result= mysqli_query($conn, "SELECT email FROM tb_user WHERE email='$email'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Username sudah terdaftar');
        </script>";
        return false;
    }
    $sql="INSERT INTO tb_user (email,password,repassword) VALUES ('$email','$password','$repassword')";

    mysqli_query($conn,$sql);

    return mysqli_affected_rows($conn);

}
?>
