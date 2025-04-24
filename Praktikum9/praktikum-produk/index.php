<?php
require_once "Toko.php";

$toko = new Toko("Toko Jaya");

$toko->tambahProduk(new Produk("Laptop Asus", 7000000, "Gadget"));
$toko->tambahProduk(new Produk("Beras 1kg", 10000, "Sembako"));
$toko->tambahProduk(new Produk("Kursi kayu", 500000, "Mebel"));

$toko->tampilkanProduk();
?>