<?php
include "function.php";

if (!isset($_SESSION["mhs"])) {
   header("Location: login/index.php");
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
   <link rel="stylesheet" href="css/style.css">
   <link rel="shortcut icon" href="img/LOGO HMJTI2.png" type="image/x-icon">
   <script src="https://unpkg.com/feather-icons"></script>
   <title>Halaman Mahasiwa</title>
</head>

<body>
   <!-- navbar -->
   <nav class="fixed-top">
      <div class="container">
         <div class="logo">
            <div class="logo-img">
               <img class="img-poli" src="img/LOGO HMJTI2.png" alt="">
            </div>
            <h3 class="fs-3 poli fw-bolder mt-2 text-light">POLIWANGI</h3>
         </div>
         <div class="link">
            <ul>
               <li onclick="return location.href = '#buat_pengaduan'"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                     <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                     <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                  </svg><a href="#buat_pengaduan">Buat Pengaduan</a></li>
               <li onclick="return location.href = 'pengaduan_mhs.php#pengaduan'"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-bar-chart-fill" viewBox="0 0 16 16">
                     <path d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V2z" />
                  </svg><a href="pengaduan_mhs.php#pengaduan">Pengaduan Saya</a></li>
               <li onclick="return location.href = 'logout.php#pengaduan'"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                     <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z" />
                     <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                  </svg><a href="logout.php">Logout</a></li>
            </ul>
         </div>
         <li class="hamburg" id="hamburger-menu">
            <a><i data-feather="menu"></i></a>
         </li>
      </div>
   </nav>
   <!-- end navbar -->

   <!-- hero -->
   <section>
      <div class="wrapper">
         <div class="bgr-black">
            <div class="container">
               <div class="hero">
                  <div class="teks text-light">
                     <?php
                     $dataMhs = getUser();
                     ?>
                     <h1 class="selamat text-start">Selamat Datang <?= $dataMhs["nama_mahasiswa"] ?></h1>
                     <h1 class="selamat text-start">Di Web Aspirasi Mahasiswa</h1>
                     <div class="kata">
                        <h3 class="text-hero text-start text-md-start">Buat Pengaduan dan Pantau Statusnya dengan Mudah!</h3>
                        <h3 class="text-hero text-start text-md-start">Klik Buat Pengaduan dan Cek Pengaduan yang ada Di Navigasi</h3>
                     </div>
                     <button class="btn-tod fs-6">Mahasiswa</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- end hero -->

   <!-- pengaduan -->
   <section id="buat_pengaduan">
      <div class="teks">
         <h5 class="p-lg-3 text-center text-light mb-4" style="background-color: #ffcb0b;">BUAT PENGADUAN
         </h5>
      </div>
      <div class="container">
         <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="idMahasiswa" value="<?= $dataMhs["id_mahasiswa"] ?>">
            <div class="row d-flex justify-content-center mb-4">
               <div class="col-md-4 col-12">
                  <div class="form-outline">
                     <input type="text" value="<?= $dataMhs["nama_mahasiswa"] ?>" id="form6Example1" class="form-control" name="nama" readonly />
                     <label class="form-label" for="form6Example1">Nama</label>
                  </div>
               </div>
               <div class="col-md-4 col-12">
                  <div class="form-outline">
                     <input type="text" value="<?= $dataMhs["nim"]  ?>" id="form6Example2" class="form-control" name="nim" readonly />
                     <label class="form-label" for="form6Example2">NIM</label>
                  </div>
               </div>
            </div>

            <!-- Tanggal input -->
            <div class="row d-flex justify-content-center">
               <div class="col-md-8 col-12">
                  <div class="form-outline mb-4">
                     <input required type="date" value="<?php echo date('Y-m-d'); ?>" id="form6Example3" class="form-control" name="tanggal" />
                     <label class="form-label" for="form6Example3">Tanggal Pengaduan</label>
                  </div>
               </div>
            </div>

            <!-- Laporan input -->
            <div class="row d-flex justify-content-center">
               <div class="col-md-8 col-12">
                  <div class="form-outline mb-4">
                     <textarea required class="form-control" id="form6Example7" rows="4" name="laporan"></textarea>
                     <label class="form-label" for="form6Example7">Isi Laporan</label>
                  </div>
               </div>
            </div>

            <!-- Gambar input -->
            <div class="row d-flex justify-content-center">
               <div class="col-md-8 col-12">
                  <div class="form-outline mb-4">
                     <input required type="file" id="form6Example5" class="form-control" name="gambar" />
                     <label class="form-label" for="form6Example5">Upload Gambar</label>
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

      <?php
      if (isset($_POST["kirim"])) {
         buatPengaduan($_POST);
         echo "<meta http-equiv='refresh' content='1;url=pengaduan_mhs.php#pengaduan'>";
      }
      ?>

   </section>

   <?php include "template/footer.php" ?>
</body>

</html>