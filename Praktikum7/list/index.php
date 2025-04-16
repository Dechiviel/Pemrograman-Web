<?php

require_once '../config.php';

$sql = 'SELECT * FROM data_user';

$stmt = $pdo->query($sql);
$rows = $stmt->fetchAll();

if ($rows) {
  foreach ($rows as $row) {
    echo "Data ke- " . $row['id_data_user'] . "<br>";
    echo "Nama: " . $row['nama'] . "<br>";
    echo "NRP: " . $row['nrp'] . "<br>";
    echo "Kelas: " . $row['kelas'] . "<br>";
    echo "Jenis Kelamin: " . $row['kelamin'] . "<br>";
    echo "Agama: " . $row['agama'] . "<br>";
    echo "Tempat/Tanggal Lahir: " . $row['tempat_lahir'] . 
    ((!empty($row['tempat_lahir']) && !empty($row['tanggal_lahir'])) ? ", " : "") . $row['tanggal_lahir'] . "<br>";
    echo "Alamat: " . $row['alamat'] . "<br>";
    echo "Riwayat Pendidikan SD: " . $row['riwayat_pendidikan_sd'] . "<br>";
    echo "Riwayat Pendidikan SMP: " . $row['riwayat_pendidikan_smp'] . "<br>";
    echo "Riwayat Pendidikan SMA: " . $row['riwayat_pendidikan_sma'] . "<br>";
    echo "Email: " . $row['email'] . "<br>";
    echo "Homepage: " . $row['homepage'] . "<br>";
    echo "Hobby: " . $row['hobby'] . "<br>";
    echo "Interest: " . $row['interest'] . "<br>";
    echo "<br>";
  }
} 
else {
  echo "Tidak ada data yang ditemukan.";
}
?>