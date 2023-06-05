<?php

session_start();

include "koneksi.php";

// Login user / Mahasiswa
function Login($nim, $password)
{
   global $conn;
   $sql = "SELECT * FROM tb_mahasiswa WHERE nim = '$nim' AND password = '$password'";
   $result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION["mhs"] = $row["id_mahasiswa"];
      return 1;
   } else {
      return 0;
   }
}

// Login petugas / admin
function LoginPetugas($username, $password)
{
   global $conn;
   $sql = "SELECT * FROM tb_petugas WHERE username_ptgs = '$username' AND password_ptgs = '$password'";
   $result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      if ($row["level"] == "admin") {
         $_SESSION["admin"] = $row["id_petugas"];
         return 1;
      } else if ($row["level"] == "petugas") {
         $_SESSION["petugas"] = $row["id_petugas"];
         return 2;
      }
   } else {
      return 0;
   }
}

// register mahasiswa
function Register($data)
{
   global $conn;
   $namaLengkap = $data["namaLengkap"];
   $nim = $data["nim"];
   $noHp = $data["noHp"];
   $kelas = $data["kelas"];
   $password = $data["password"];
   $confirmPassword = $data["confirmPassword"];

   $queryNim = "SELECT * FROM tb_mahasiswa WHERE nim = '$nim'";
   $resultNim = mysqli_query($conn, $queryNim);
   if (mysqli_num_rows($resultNim) > 0) {
      return 100;
   }

   $queryNohp = "SELECT * FROM tb_mahasiswa WHERE no_hp = '$noHp'";
   $resultNohp = mysqli_query($conn, $queryNohp);
   if (mysqli_num_rows($resultNohp) > 0) {
      return 200;
   }

   if ($password != $confirmPassword) {
      return 300;
   }

   $queryInsert =  "INSERT into tb_mahasiswa VALUES (NULL,'$nim', '$namaLengkap' , '$kelas' , '$password' ,'$noHp')";
   mysqli_query($conn, $queryInsert);
   return 1;
}

// Tambah petugas admin
function tambahPetugas($data)
{
   global $conn;
   $nama = $data["nama_petugas"];
   $username = $data["username_ptgs"];
   $password = $data["password_ptgs"];
   $noHp = $data["no_hp_ptgs"];
   $level = $data["level"];
   $confirmPassword = $data["konfirm"];

   $queryUsername = "SELECT * FROM tb_petugas WHERE username_ptgs = '$username'";
   $resultUsername = mysqli_query($conn, $queryUsername);
   if (mysqli_num_rows($resultUsername) > 0) {
      return 100;
   }

   $queryNohp = "SELECT * FROM tb_petugas WHERE no_hp_ptgs = '$noHp'";
   $resultNohp = mysqli_query($conn, $queryNohp);
   if (mysqli_num_rows($resultNohp) > 0) {
      return 200;
   }

   if ($password != $confirmPassword) {
      return 300;
   }

   $queryInsert =  "INSERT into tb_petugas VALUES (NULL,'$nama', '$username' , '$password' , '$noHp' ,'$level')";
   mysqli_query($conn, $queryInsert);
   return 1;
}

// Get data mahasiswa dari session login
function getUser()
{
   global $conn;
   $mhs = [];
   $queryUser = "SELECT * FROM tb_mahasiswa WHERE id_mahasiswa = '$_SESSION[mhs]'";
   $result = mysqli_query($conn, $queryUser);
   $mhs = mysqli_fetch_assoc($result);
   return $mhs;
}

// Get data petugas dari session login
function getUserPetugas()
{
   global $conn;
   $petugas = [];
   $queryUser = "SELECT * FROM tb_petugas WHERE id_petugas = '$_SESSION[petugas]'";
   $result = mysqli_query($conn, $queryUser);
   $petugas = mysqli_fetch_assoc($result);
   return $petugas;
}

// Get data admin dari session login
function getUserAdmin()
{
   global $conn;
   $admin = [];
   $queryUser = "SELECT * FROM tb_petugas WHERE id_petugas = '$_SESSION[admin]'";
   $result = mysqli_query($conn, $queryUser);
   $admin = mysqli_fetch_assoc($result);
   return $admin;
}

// fungsi upload gambar / pindahkan gambar
function uploadGambar()
{
   $namaGambar = $_FILES["gambar"]["name"];
   $tmpGambar = $_FILES["gambar"]["tmp_name"];

   move_uploaded_file($tmpGambar, "img/" . $namaGambar);
   return $namaGambar;
}

// fungsi buat pengaduan mahasiswa dengan param post
function buatPengaduan($data)
{
   global $conn;
   $idMhs = $data["idMahasiswa"];
   $tglPengaduan = $data["tanggal"];
   $isiLaporan = $data["laporan"];
   $gambar = uploadGambar();
   $status = "Proses";
   $queryInsert = "INSERT into tb_pengaduan VALUES (NULL,'$idMhs','$tglPengaduan','$isiLaporan','$gambar','$status')";
   mysqli_query($conn, $queryInsert);
}

// get data pengaduan berdasarkan session login mahasiswa
function getPengaduanByUser()
{
   global $conn;
   $dataPengaduan = [];
   $queryPengaduan = "SELECT * FROM tb_pengaduan INNER JOIN tb_mahasiswa ON tb_pengaduan.id_mahasiswa = tb_mahasiswa.id_mahasiswa WHERE tb_pengaduan.id_mahasiswa = '$_SESSION[mhs]'";
   $result = mysqli_query($conn, $queryPengaduan);
   while ($row = mysqli_fetch_assoc($result)) {
      $dataPengaduan[] = $row;
   }
   return $dataPengaduan;
}

// get data pengaduan berdasarkan id pengaduan
function getPengaduanById($id)
{
   global $conn;
   $dataPengaduan = [];
   $queryPengaduan = "SELECT * FROM tb_pengaduan INNER JOIN tb_mahasiswa ON tb_pengaduan.id_mahasiswa = tb_mahasiswa.id_mahasiswa INNER JOIN tb_kelas ON tb_mahasiswa.id_kelas = tb_kelas.id_kelas WHERE tb_pengaduan.id_pengaduan = '$id'";
   $result = mysqli_query($conn, $queryPengaduan);
   $dataPengaduan = mysqli_fetch_assoc($result);
   return $dataPengaduan;
}

// get semua data pengaduan mahasiswa
function getPengaduan()
{
   global $conn;
   $dataPengaduan  = [];
   $queryPengaduan = "SELECT * FROM tb_pengaduan INNER JOIN tb_mahasiswa ON tb_pengaduan.id_mahasiswa = tb_mahasiswa.id_mahasiswa";
   $result = mysqli_query($conn, $queryPengaduan);
   while ($row = mysqli_fetch_assoc($result)) {
      $dataPengaduan[] = $row;
   }
   return $dataPengaduan;
}

// fungsi untuk update status selesai
function pengaduanSelesai($id)
{
   global $conn;
   $query = "UPDATE `tb_pengaduan` SET `status` = 'Selesai' WHERE id_pengaduan = $id";
   mysqli_query($conn, $query);
}

// fungsi untuk membuat tanggapan untuk petuugas / admin dengan param post
function buatTanggapan($data)
{
   global $conn;
   $idPengaduan = $data["idPengaduan"];
   $idPetugas = $data["idPetugas"];
   $waktuTanggapan = $data["tanggal"];
   $isiTanggapan = $data["tanggapan"];

   $queryInsert = "INSERT INTO tb_tanggapan VALUES (NULL,'$idPengaduan','$idPetugas','$waktuTanggapan','$isiTanggapan')";
   mysqli_query($conn, $queryInsert);
}

// mendapat data tanggapan dari petugas / admin
function getTanggapanbyId($id)
{
   global $conn;
   $dataPengaduan = [];
   $queryTanggapan = "SELECT * FROM tb_tanggapan INNER JOIN tb_pengaduan ON tb_tanggapan.id_pengaduan = tb_pengaduan.id_pengaduan
   INNER JOIN tb_petugas ON tb_tanggapan.id_petugas = tb_petugas.id_petugas 
   WHERE tb_pengaduan.id_pengaduan = '$id'";
   $result = mysqli_query($conn, $queryTanggapan);
   $dataPengaduan = mysqli_fetch_assoc($result);
   return $dataPengaduan;
}

// cek apakah pengaduan sudah ditanggapi atau belum
function cekTanggapan($id)
{
   global $conn;
   $query = "SELECT * FROM tb_tanggapan WHERE id_pengaduan = '$id'";
   $result = mysqli_query($conn, $query);
   if (mysqli_num_rows($result) > 0) {
      return false;
   }
   return true;
}

// fungsi untuk menghapus pengaduan
function hapusPengaduan($id)
{
   global $conn;
   $queryHapus = "DELETE FROM tb_pengaduan WHERE id_pengaduan = '$id'";
   mysqli_query($conn, $queryHapus);
}
