<?php

include "function.php";
if (!isset($_SESSION["mhs"])) {
    header("location: login.php");
    exit;
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    hapusPengaduan($id);
    header("Location: pengaduan_mhs.php");
}
