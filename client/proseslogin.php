<?php
session_start();

include("../env.php");

$randomnumber = rand(100000000, 999999999);
$stringnumber = (string) $randomnumber;
$telepon = "081" . $stringnumber;

$sql_cek = "SELECT telepon FROM akun WHERE telepon = '$telepon' ";
$run_cek = mysqli_query($conn, $sql_cek);
$count_cek = mysqli_num_rows($run_cek);



if ($count_cek > 0) {
    header("Location: proseslogin.php");
    die();
} else {
    $insert_sql = "INSERT INTO akun (telepon) VALUES ('$telepon')";
    $run_insert_sql = mysqli_query($conn, $insert_sql);
    if ($run_insert_sql) {
        $last_id = mysqli_insert_id($conn);
        $_SESSION["id"] = $last_id;
        header("Location: index.php");
        die();
    }
}




?>