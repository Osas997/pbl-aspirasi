<?php
include "../function.php";

if (isset($_SESSION["mhs"])) {
  header("Location: ../halaman_mhs.php");
  exit;
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Mahasiswa</title>
  <link rel="shortcut icon" href="../img/LOGO HMJTI2.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center" style="height: 100vh;">
      <div class="col-10 col-lg-3">
        <h2 class="text-center mb-4">Login Mahasiswa</h2>
        <?php
        if (isset($_POST["login"])) {
          $nim = $_POST["nim"];
          $password = $_POST["password"];

          $login = Login($nim, $password);
          if ($login == 0) {
            echo '<h4 class="text-center mb-4 text-danger">Login GAGAL</h4>';
          } else {
            echo '<h4 class="text-center mb-4 text-success">Login Berhasil</h4>';
            echo "<meta http-equiv='refresh' content='2;url=../halaman_mhs.php'>";
          }
        }
        ?>
        <form method="post" action="">
          <div class="mb-4">
            <input type="text" name="nim" class="form-control" style="border-radius: 17px;" id="username" aria-describedby="emailHelp" placeholder="Masukkan NIM">
          </div>
          <div class="mb-4">
            <input type="password" name="password" class="form-control" style="border-radius: 17px;" id="exampleInputPassword1" placeholder="Masukkan Password">
          </div>
          <button type="submit" class="btn btn-primary" name="login" style="border-radius: 17px; width: 100%;">Login</button>
          <div class="d-flex justify-content-between w-100">
            <p class="my-3"><a href="../index.php">Kembali</a></p>
            <p class="my-3">Register <a href="../register/index.php">Disini</a></p>
          </div>
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
              <path fill="#0D5FFF" fill-opacity="1" d="M0,224L18.5,213.3C36.9,203,74,181,111,160C147.7,139,185,117,222,122.7C258.5,128,295,160,332,149.3C369.2,139,406,85,443,69.3C480,53,517,75,554,96C590.8,117,628,139,665,154.7C701.5,171,738,181,775,165.3C812.3,149,849,107,886,122.7C923.1,139,960,213,997,229.3C1033.8,245,1071,203,1108,192C1144.6,181,1182,203,1218,197.3C1255.4,192,1292,160,1329,160C1366.2,160,1403,192,1422,208L1440,224L1440,320L1421.5,320C1403.1,320,1366,320,1329,320C1292.3,320,1255,320,1218,320C1181.5,320,1145,320,1108,320C1070.8,320,1034,320,997,320C960,320,923,320,886,320C849.2,320,812,320,775,320C738.5,320,702,320,665,320C627.7,320,591,320,554,320C516.9,320,480,320,443,320C406.2,320,369,320,332,320C295.4,320,258,320,222,320C184.6,320,148,320,111,320C73.8,320,37,320,18,320L0,320Z"></path>
            </svg>
          </div>
        </form>
      </div>
      <div class="col-5 d-none d-lg-block">
        <img src="../img/search.png" width="100%" class="mx-auto" alt="...">
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>