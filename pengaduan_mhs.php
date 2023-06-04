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
   <title>Pengaduan Mahasiswa</title>
</head>

<body>
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
               <li onclick="return location.href = 'halaman_mhs.php#buat_pengaduan'"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                     <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                     <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                  </svg><a href="halaman_mhs.php#buat_pengaduan">Buat Pengaduan</a></li>
               <li onclick="return location.href = '#pengaduan'"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-bar-chart-fill" viewBox="0 0 16 16">
                     <path d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V2z" />
                  </svg><a href="#pengaduan">Pengaduan Saya</a></li>
               <li onclick="return location.href = 'logout.php'"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                     <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z" />
                     <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                  </svg><a href="logout.php">Logout</a></li>
            </ul>
         </div>
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
                     <h1>Selamat Datang <?= $dataMhs["nama_mahasiswa"] ?></h1>
                     <h1>Di Web Aspirasi Mahasiswa</h1>
                     <h3>Lihat Pengaduan Disini</h3>
                     <button class="btn-tod fs-6">Mahasiswa</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- end hero -->

   <!-- pengaduan -->
   <?php

   $dataPengaduan = getPengaduanByUser();

   ?>
   <section id="pengaduan" class="">
      <div class="teks">
         <h5 class="p-lg-3 text-center text-light" style="background-color: #ffcb0b;">PENGADUAN SAYA</h5>
      </div>
      <div class="container">
         <?php if (!empty($dataPengaduan)) { ?>
            <table class="table table-striped">
               <thead class="bg-light">
                  <tr>
                     <th>No</th>
                     <th class="waktu-pengaduan">Waktu Pengaduan</th>
                     <th class="isi-laporan">Isi Laporan</th>
                     <th>Status</th>
                     <th></th>
                     <th class="text-center">Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  $no = 1;
                  foreach ($dataPengaduan as $pengaduan) { ?>
                     <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $pengaduan["waktu_pengaduan"] ?></td>
                        <td><?= $pengaduan["isi_laporan"] ?></td>
                        <td><?= $pengaduan["status"] ?></td>
                        <td class="text-center"><a class="btn btn-warning" href="detail_pengaduan.php?id=<?= $pengaduan["id_pengaduan"] ?>">Lihat Detail</a></td>
                        <td class="text-center">
                           <a class="btn btn-warning" href="lihat_tanggapan.php?id=<?= $pengaduan['id_pengaduan'] ?>">Lihat Tanggapan</a>
                           <a class="btn btn-danger" onclick="return confirm('Yakin Hapus??')" href="hapus_pengaduan.php?id=<?= $pengaduan['id_pengaduan'] ?>">Hapus</a>
                        </td>
                     </tr>
                  <?php } ?>
               </tbody>
            </table>
         <?php } else { ?>
            <h3 class="text-center fw-bold text-danger">Belum Ada Pengaduan</h3>
         <?php } ?>
      </div>

   </section>

   <?php include "template/footer.php" ?>
</body>

</html>