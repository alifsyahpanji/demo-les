<?php
session_start();

include("../env.php");

$randomnumber = rand(100000000, 999999999);
$stringnumber = (string) $randomnumber;
$telepon = "081" . $stringnumber;


$insert_sql = "INSERT INTO akun (telepon) VALUES ('$telepon')";
$run_insert_sql = mysqli_query($conn, $insert_sql);
if ($run_insert_sql) {
    $last_id = mysqli_insert_id($conn);
    $_SESSION["id"] = $last_id;
    header("Location: index.php");
    die();
}

?>