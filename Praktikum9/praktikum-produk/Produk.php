<?php
class Produk {
  private $nama;
  private $harga;
  private $kategori;

  public function __construct($nama, $harga, $kategori) {
    $this->nama = $nama;
    $this->harga = $harga;
    $this->kategori = $kategori;
  }
  public function getInfoProduk () {
    echo "Nama produk: $this->nama <br>";
    echo "Harga produk: $this->harga <br>";
    echo "Kategori: $this->kategori <br><br>";
  }
}