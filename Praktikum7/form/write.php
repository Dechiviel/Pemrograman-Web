<?php

require_once '../config.php';

$sql = 'INSERT INTO data_user (
  nama, nrp, kelas, kelamin, agama, tempat_lahir, tanggal_lahir, alamat,
  riwayat_pendidikan_sd, riwayat_pendidikan_smp, riwayat_pendidikan_sma,
  email, homepage, hobby, interest
) 
VALUES (
  :nama, :nrp, :kelas, :kelamin, :agama, :tempat_lahir, :tanggal_lahir,
  :alamat, :riwayat_pendidikan_sd, :riwayat_pendidikan_smp, :riwayat_pendidikan_sma,
  :email, :homepage, :hobby, :interest
)';

$stmt = $pdo->prepare($sql);
$stmt->execute([
  ':nama' => isset($_POST['nama']) ? $_POST['nama'] : '',
  ':nrp' => isset($_POST['nrp']) ? $_POST['nrp'] : '',
  ':kelas' => isset($_POST['kelas']) ? $_POST['kelas'] : '',
  ':kelamin' => isset($_POST['kelamin']) ? $_POST['kelamin'] : '',
  ':agama' => isset($_POST['agama']) ? $_POST['agama'] : '',
  ':tempat_lahir' => isset($_POST['tempatLahir']) ? $_POST['tempatLahir'] : '',
  ':tanggal_lahir' => !empty($_POST['tanggalLahir']) ? $_POST['tanggalLahir'] : null,
  ':alamat' => isset($_POST['alamat']) ? $_POST['alamat'] : '',
  ':riwayat_pendidikan_sd' => isset($_POST['sd']) ? $_POST['sd'] : '',
  ':riwayat_pendidikan_smp' => isset($_POST['smp']) ? $_POST['smp'] : '',
  ':riwayat_pendidikan_sma' => isset($_POST['sma']) ? $_POST['sma'] : '',
  ':email' => isset($_POST['email']) ? $_POST['email'] : '',
  ':homepage' => isset($_POST['homepage']) ? $_POST['homepage'] : '',
  ':hobby' => isset($_POST['hobi']) ? $_POST['hobi'] : '',
  ':interest' => isset($_POST['interest']) ? implode(', ', $_POST['interest']) : ''
]);

if ($stmt) {
  echo "Halo, " . $_POST["nama"] . "! Data Anda telah disimpan!";
} 
else {
  echo "Data gagal disimpan!";
}
?>
<html>
  <body>
    <br>
    <br>
    <a href="index.php"><input type="reset" value="Kembali ke Form"></a>
    <a href="../list"><input type="submit" value="Tampilkan Data"></a>
  </body>
</html>
