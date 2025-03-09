<html>
<body>
  <?php

  $handler = fopen("dataform.txt", "a");
  fputs($handler, "------------------\n");
  isset($_POST["nama"]) ? fputs($handler, $_POST["nama"] . "\n") : fputs($handler, "-\n");
  isset($_POST["nrp"]) ? fputs($handler, $_POST["nrp"] . "\n") : fputs($handler, "-\n");
  isset($_POST["kelas"]) ? fputs($handler, $_POST["kelas"] . "\n") : fputs($handler, "-\n");
  isset($_POST["kelamin"]) ? fputs($handler, $_POST["kelamin"] . "\n") : fputs($handler, "-\n");
  isset($_POST["agama"]) ? fputs($handler, $_POST["agama"] . "\n") : fputs($handler, "-\n");
  isset($_POST["tempatLahir"]) ? fputs($handler, $_POST["tempatLahir"] . "\n") : fputs($handler, "-\n");
  isset($_POST["tanggalLahir"]) ? fputs($handler, $_POST["tanggalLahir"] . "\n") : fputs($handler, "-\n");
  isset($_POST["alamat"]) ? fputs($handler, $_POST["alamat"] . "\n") : fputs($handler, "-\n");
  isset($_POST["sd"]) ? fputs($handler, $_POST["sd"] . "\n") : fputs($handler, "-\n");
  isset($_POST["smp"]) ? fputs($handler, $_POST["smp"] . "\n") : fputs($handler, "-\n");
  isset($_POST["sma"]) ? fputs($handler, $_POST["sma"] . "\n") : fputs($handler, "-\n");
  isset($_POST["email"]) ? fputs($handler, $_POST["email"] . "\n") : fputs($handler, "-\n");
  isset($_POST["homepage"]) ? fputs($handler, $_POST["homepage"] . "\n") : fputs($handler, "-\n");
  isset($_POST["hobi"]) ? fputs($handler, $_POST["hobi"] . "\n") : fputs($handler, "-\n");

  if(isset($_POST["interest"])) {
    $interest = "";
    foreach($_POST["interest"] as $str) {
      $interest .= "{$str}, ";
    }
    fputs($handler, "{$interest}\n");
  }
  else fputs($handler, "-\n");

  if (isset($_POST["nama"])) {
    echo "Halo, " . $_POST["nama"] . "! Data Anda telah disimpan!";
  } 
  else echo "Data gagal disimpan!";

  fclose($handler);
  ?>
  <br>
  <br>
  <a href="form.php"><input type="reset" value="Kembali ke Form"></a>
  <a href="read.php"><input type="submit" value="Tampilkan Data"></a>
</body>
</html>