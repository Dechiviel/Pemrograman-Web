<?php
class Mahasiswa
{
  private $nama;
  private $nim;
  private $prodi;
  public function __construct($nama, $nim, $prodi)
  {
    $this->nama = $nama;
    $this->nim = $nim;
    $this->prodi = $prodi;
  }
  public function getProfil()
  {
    echo "Nama: $this->nama<br>NIM: $this->nim<br>Prodi: $this->prodi<br><br>";
  }
}
?>