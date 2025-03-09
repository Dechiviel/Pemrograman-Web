<html>
<body>
  <?php
  $line = "";
  $no = 1;
  $handler = fopen("dataform.txt", "r");

  while (!feof($handler)) {
    $line = trim(fgets($handler)); // menghapus pemisah baris

    $nama = trim(fgets($handler));
    $nrp = trim(fgets($handler));
    $kelas = trim(fgets($handler));
    $kelamin = trim(fgets($handler));
    $agama = trim(fgets($handler));
    $tempatLahir = trim(fgets($handler));
    $tanggalLahir = trim(fgets($handler));
    $tgl = explode("-", $tanggalLahir);
    $alamat = trim(fgets($handler));
    $sd = trim(fgets($handler));
    $smp = trim(fgets($handler));
    $sma = trim(fgets($handler));
    $email = trim(fgets($handler));
    $homepage = trim(fgets($handler));
    $hobi = trim(fgets($handler));
    $interest = trim(fgets($handler));

    $line = trim(fgets($handler)); // menghapus pemisah baris
    
    echo "<br>Data ke-$no<br>";
    echo "Nama : $nama<br>";
    echo "NRP : $nrp<br>";
    echo "Kelas : $kelas<br>";
    echo "Kelamin : $kelamin<br>";
    echo "Agama : $agama<br>";
    echo "Tempat Lahir/Tanggal Lahir : $tempatLahir, $tanggalLahir<br>";
    echo "Alamat : $alamat<br>";
    echo "Pendidikan SD : $sd<br>";
    echo "Pendidikan SMP : $smp<br>";
    echo "Pendidikan SMA : $sma<br>";
    echo "Email : $email<br>";
    echo "Homepage : $homepage<br>";
    echo "Hobi : $hobi<br>";
    echo "Interest : $interest";

    $no++;

  }
  fclose($handler);
  ?>
  <br>
</body>
</html>