<?php 
require_once "Kampus.php";

$kampus = new Kampus("Poltek Surabaya");
$kampus->tambahMahasiswa(new Mahasiswa("Faris Akmal Soehartono", 101, "D4 IT D"));
$kampus->tambahMahasiswa(new Mahasiswa("Nama Dari Mahasiswa", 102, "D4 IT E"));
$kampus->tambahMahasiswa(new Mahasiswa("Nama Dari Mahasiswa Lainnya", 103, "D4 IT F"));
$kampus->tampilkanMahasiswa();
?>