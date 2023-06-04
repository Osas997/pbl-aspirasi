<?php
include "../function.php";

if (!isset($_SESSION["admin"])) {
   header("Location: login_petugas.php");
   exit;
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   <link rel="stylesheet" href="../css/style.css">
   <link rel="shortcut icon" href="../img/LOGO HMJTI2.png" type="image/x-icon">
   <title>Tanggapi Pengaduan</title>
</head>

<body>
   <!-- navbar -->
   <nav class="fixed-top">
      <div class="container">
         <div class="logo">
            <div class="logo-img">
               <img class="img-poli" src="../img/LOGO HMJTI2.png" alt="">
            </div>
            <a href="../index.php" class="fs-3 fw-bolder mt-2 text-light">POLIWANGI</a>
         </div>
         <div class="link">
            <ul>
               <li onclick="return location.href = '../logout.php'"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                     <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z" />
                     <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                  </svg><a href="../logout.php">Logout</a></li>
            </ul>
         </div>
      </div>
   </nav>
   <!-- end navbar -->
   <!-- hero -->
   <section style="height: 65vh;">
      <div class="wrapper" style="height: 65vh;">
         <div class="bgr-black">
            <div class="container">
               <div class="hero">
                  <div class="teks text-light">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- end hero -->

   <!-- pengaduan -->
   <section id="pengaduan">
      <div class="teks">
         <h5 class="p-lg-3 text-center text-light mb-4" style="background-color: #ffcb0b;">TANGGAPI PENGADUAN
            </PENGADUAN>
         </h5>
      </div>
      <?php
      $cekTanggapan = cekTanggapan($_GET["id"]);
      if ($cekTanggapan == true) { ?>
         <div class="container">
            <?php
            $dataAdmin = getUserAdmin();
            ?>
            <form action="" method="post" enctype="multipart/form-data">
               <input type="hidden" name="idPetugas" value="<?= $dataAdmin["id_petugas"] ?>">
               <div class="row d-flex justify-content-center mb-4">
                  <div class="col-md-4 col-12">
                     <div class="form-outline">
                        <input type="text" value="<?= $dataAdmin["nama_petugas"] ?>" id="form6Example1" class="form-control" name="namaPetugas" readonly />
                        <label class="form-label" for="form6Example1">Nama Petugas</label>
                     </div>
                  </div>
                  <div class="col-md-4 col-12">
                     <div class="form-outline">
                        <input type="text" value="<?= $dataAdmin["no_hp_ptgs"] ?>" id="form6Example1" class="form-control" name="noHpPetugas" readonly />
                        <label class="form-label" for="form6Example2">No Hp Petugas</label>
                     </div>
                  </div>
               </div>

               <!-- Laporan input -->
               <?php
               $dataPengaduan = getPengaduanById($_GET["id"]);
               ?>
               <input type="hidden" name="idPengaduan" value="<?= $dataPengaduan['id_pengaduan'] ?>">
               <div class="row">
                  <div class="d-flex justify-content-center my-1 mb-4">
                     <div class="col-md-8 col-12">
                        <div class="isii-laporan">
                           <?= $dataPengaduan["isi_laporan"]  ?>
                        </div>
                        <label class="form-label">Isi Laporan</label>
                     </div>
                  </div>
               </div>

               <!-- Tanggal input -->
               <div class="row d-flex justify-content-center">
                  <div class="col-md-8 col-12">
                     <div class="form-outline mb-4">
                        <input value="<?php echo date('Y-m-d'); ?>" required type="date" id="form6Example3" class="form-control" name="tanggal" />
                        <label class="form-label" for="form6Example3">Tanggal Tanggapan</label>
                     </div>
                  </div>
               </div>

               <!-- Gambar input -->
               <div class="row d-flex justify-content-center">
                  <div class="col-md-8 col-12">
                     <div class="form-outline mb-4">
                        <textarea required class="form-control" id="form6Example7" rows="4" name="tanggapan"></textarea>
                        <label class="form-label" for="form6Example7">Isi Tanggapan</label>
                     </div>
                  </div>
               </div>

               <!-- Submit button -->
               <div class="row d-flex justify-content-center">
                  <div class="col-12 col-md-8">
                     <button type="submit" name="kirim" class="btn btn-success mb-4">Kirim</button>
                  </div>
               </div>
            </form>
         </div>
      <?php } else { ?>
         <h1 class="text-center text-danger">SUDAH DITANGGAPI</h1>
      <?php } ?>
   </section>
   <?php

   if (isset($_POST["kirim"])) {
      buatTanggapan($_POST);
      echo "<meta http-equiv='refresh' content='1;url=halaman_admin.php'>";
   }

   ?>
   <?php include "../template/footer.php" ?>
   <script src="../js/script.js"></script>
</body>

</html>