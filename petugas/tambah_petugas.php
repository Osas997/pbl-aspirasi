<?php
include "../function.php";
if (!isset($_SESSION["admin"])) {
    header('Location: login_petugas.php');
    exit;
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/LOGO HMJTI2.png" type="image/x-icon">
    <title>Tambah Petugas</title>
</head>

<body>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center" style="height: 100vh;">
            <div class="col-4">
                <h2 class="text-center mb-4">Tambah Petugas</h2>
                <?php
                if (isset($_POST["tambahPetugas"])) {
                    $register = tambahPetugas($_POST);
                    if ($register == 100) {
                        echo '<h4 class="text-center mb-4 text-danger">Username Sudah Terdaftar</h4>';
                    } else if ($register == 200) {
                        echo '<h4 class="text-center mb-4 text-danger">No Hp Sudah Terdaftar</h4>';
                    } else if ($register == 300) {
                        echo '<h4 class="text-center mb-4 text-danger">Konfirmasi Password Salah</h4>';
                    } else {
                        echo '<h4 class="text-center mb-4 text-success">Berhasil Menambahkan Petugas</h4>';
                        echo "
                <meta http-equiv='refresh' content='2;url=halaman_admin.php'>";
                    }
                }
                ?>
                <form action="" method="post">
                    <div class="mb-4">
                        <input type="text" class="form-control" style="border-radius: 17px;" name="nama_petugas" placeholder="Masukkan Nama Lengkap">
                    </div>
                    <div class="mb-4">
                        <input type="text" class="form-control" style="border-radius: 17px;" name="username_ptgs" placeholder="Masukkan Username">
                    </div>
                    <div class=" mb-4">
                        <input type="password" class="form-control" style="border-radius: 17px;" name="password_ptgs" placeholder="Masukkan Password">
                    </div>
                    <div class=" mb-4">
                        <input type="password" class="form-control" style="border-radius: 17px;" name="konfirm" placeholder="Konfirmasi Password">
                    </div>
                    <div class=" mb-4">
                        <input type="text" class="form-control" style="border-radius: 17px;" name="no_hp_ptgs" placeholder="Masukkan Nomor Hp">
                    </div>
                    <div class=" mb-4">
                        <select name="level" id="" required class="form-select">
                            <option value="">Pilih</option>
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                        </select>
                    </div>
                    <button type="submit" name="tambahPetugas" class="btn btn-primary" style="border-radius: 17px; width: 100%;">Tambah Petugas</button>
                </form>
            </div>
            <div class="col-6">
                <img src="../img/cool.png" width="100%" class="mx-auto" alt="...">
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>