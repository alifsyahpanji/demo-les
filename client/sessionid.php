<?php
session_start();
if ($_SESSION['id'] == "") {
    header("Location: proseslogin.php");
    die();
}
?>