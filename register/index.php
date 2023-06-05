<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../img/LOGO HMJTI2.png" type="image/x-icon">
    <title>Registrasi Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center" style="height: 100vh;">
            <div class="col-10 col-lg-4">
                <h2 class="text-center mb-4">Registrasi Mahasiwa</h2>
                <?php
                include "../function.php";

                if (isset($_POST["register"])) {
                    $register = Register($_POST);
                    if ($register == 100) {
                        echo '<h4 class="text-center mb-4 text-danger">NIM Sudah Terdaftar</h4>';
                    } else if ($register == 200) {
                        echo '<h4 class="text-center mb-4 text-danger">No Hp Sudah Terdaftar</h4>';
                    } else if ($register == 300) {
                        echo '<h4 class="text-center mb-4 text-danger">Konfirmasi Password Salah</h4>';
                    } else {
                        echo '<h4 class="text-center mb-4 text-success">Berhasil Registrasi</h4>';
                        echo "<meta http-equiv='refresh' content='2;url=../login/index.php'>";
                    }
                }
                ?>
                <form action="" method="post">
                    <div class="mb-4">
                        <input type="text" class="form-control" style="border-radius: 17px;" name="namaLengkap" placeholder="Masukkan Nama Lengkap">
                    </div>
                    <div class="mb-4">
                        <input type="text" class="form-control" style="border-radius: 17px;" name="nim" placeholder="Masukkan NIM">
                    </div>
                    <div class="mb-4">
                        <input type="text" class="form-control" style="border-radius: 17px;" name="noHp" placeholder="Masukkan No Hp">
                    </div>
                    <div class="mb-4">
                        <select name="kelas" required class="form-select">
                            <option value="">Pilih Kelas</option>
                            <?php
                            $sqlKelas = "SELECT * FROM tb_kelas";
                            $result = mysqli_query($conn, $sqlKelas);

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['id_kelas'] . '">' . $row["nama_kelas"] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-4">
                        <input type="password" class="form-control" style="border-radius: 17px;" name="password" placeholder="Masukkan Password">
                    </div>
                    <div class="mb-4">
                        <input type="password" class="form-control" style="border-radius: 17px;" name="confirmPassword" placeholder="Masukkan Konfirmasi Password">
                    </div>
                    <button type="submit" name="register" class="btn btn-primary" style="border-radius: 17px; width: 100%;">Register</button>
                    <p class="my-3 text-end">Login <a href="../login/index.php">Disini</a></p>
                </form>
            </div>
            <div class="col-6 d-none d-lg-block">
                <img src="../img/hacker.png" width="100%" class="mx-auto" alt="...">
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>