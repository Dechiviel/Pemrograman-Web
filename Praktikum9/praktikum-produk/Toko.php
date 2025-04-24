<?php 
require_once "Produk.php";
class Toko {
  private $namaToko;
  private $listProduk = [];
  
  public function __construct($namaToko) {
    $this->namaToko = $namaToko;
  }
  public function tambahProduk (Produk $produk) {
    $this->listProduk[] = $produk;
  }
  public function tampilkanProduk() {
    echo "Berikut adalah produk-produk dari $this->namaToko <br><br>";
    $no = 1;
    foreach ($this->listProduk as $produk) {
      echo "No: $no<br>";
      $produk->getInfoProduk();
      $no++;
    }
  }
}
?>