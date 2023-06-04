<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   <link rel="stylesheet" href="css/style.css">
   <link rel="shortcut icon" href="img/LOGO HMJTI2.png" type="image/x-icon">
   <title>Lihat Tanggapan</title>
</head>

<body>
   <?php
   include "function.php";
   if (isset($_GET["id"])) { ?>
      <!-- navbar -->
      <nav class="fixed-top">
         <div class="container">
            <div class="logo">
               <div class="logo-img">
                  <img class="img-poli" src="img/LOGO HMJTI2.png" alt="">
               </div>
               <h3 class="fs-3 fw-bolder mt-2 text-light">POLIWANGI</h3>
            </div>
            <div class="link">
               <ul>
                  <li onclick="return location.href = 'index.php'"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                     </svg><a href="index.php">Home</a></li>
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
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end hero -->

      <!-- pengaduan -->
      <?php
      $dataTanggapan = getTanggapanbyId($_GET["id"]);
      ?>
      <section id="pengaduan">
         <div class=" teks">
            <h5 class="p-lg-3 text-center text-light" style="background-color: #ffcb0b;">TANGGAPAN PENGADUAN</h5>
         </div>
         <div class="container">
            <?php if (!empty($dataTanggapan)) { ?>
               <div class="row">
                  <div class="d-flex justify-content-between my-3">
                     <h5 class="">Waktu Tanggapan</h5>
                     <div class="col-8">
                        <input type="text" class="form-control" value="<?= $dataTanggapan['waktu_tanggapan'] ?>" readonly>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="d-flex justify-content-between my-3">
                     <h5 class="">Nama Petugas</h5>
                     <div class="col-8">
                        <input type="text" class="form-control" value="<?= $dataTanggapan['nama_petugas'] ?>" readonly>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="d-flex justify-content-between my-3">
                     <h5 class="">No Hp Petugas</h5>
                     <div class="col-8">
                        <input type="text" class="form-control" value="<?= $dataTanggapan['no_hp_ptgs'] ?>" readonly>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="d-flex justify-content-between my-3 mb-4">
                     <h5 class="">Isi Laporan</h5>
                     <div class="col-8">
                        <div class="isii-laporan">
                           <?= $dataTanggapan["isi_laporan"]  ?>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="d-flex justify-content-between my-3 mb-4">
                     <h5 class="">Isi Tanggapan</h5>
                     <div class="col-8">
                        <div class="isii-laporan">
                           <?= $dataTanggapan["isi_tanggapan"]  ?>
                        </div>
                     </div>
                  </div>
               </div>
            <?php } else { ?>
               <h3 class="text-center text-danger">BELUM ADA TANGGAPAN</h3>
            <?php } ?>
         </div>
      </section>
   <?php } else {
      echo "404";
   } ?>
   <?php include "template/footer.php" ?>
</body>

</html>