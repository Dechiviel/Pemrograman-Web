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

  $interest = "";
  foreach($_POST["interest"] as $str)
  {
    $interest .= "{$str}, ";
  }
  $interest != "" ? fputs($handler, "{$interest}\n") : fputs($handler, "-\n");

  fputs($handler, "------------------\n");

  echo "Halo, " . $_POST["nama"] . "! Data Anda telah disimpan!";
  fclose($handler);
  ?>
  <br>
  <input type="reset" name="back" value="Back" onclick="window.location.href='no1.php'">
</body>
</html>