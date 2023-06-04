<?php

include "../function.php";

if (isset($_GET["id"])) {
   $id = $_GET["id"];
   pengaduanSelesai($id);
   header("Location: login_petugas.php");
}
