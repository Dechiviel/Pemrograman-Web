<?php
require_once "Mahasiswa.php";

class Kampus {
  private $namaKampus;
  private $listMahasiswa = [];

  public function __construct ($namaKampus) {
    $this->namaKampus = $namaKampus;
  }
  public function tambahMahasiswa (Mahasiswa $mahasiswa) {
    $this->listMahasiswa[] = $mahasiswa;
  }
  public function tampilkanMahasiswa () {
    echo "Berikut adalah data dari kampus $this->namaKampus<br><br>";
    $no = 1;
    foreach ($this->listMahasiswa as $mahasiswa) {
      echo "No. $no<br>";
      $mahasiswa->getProfil();
      $no++;
    }
  }
}