<?php 
// Kelas Tiket (Product)
class Tiket
{
 private $judul;
 private $kategori;
 private $harga;
 public function setJudul($judul)
 {
 $this->judul = $judul;
 }
 public function setKategori($kategori)
 {
 $this->kategori = $kategori;
 }
 public function setHarga($harga)
 {
 $this->harga = $harga;
 }
 public function getInfo()
 {
 return "Tiket: {$this->judul} - {$this-
>kategori} - {$this->harga}";
 }
}
// Kelas TiketBuilder (Builder)
class TiketBuilder
{
 private $tiket;
 public function __construct()
 {
 $this->tiket = new Tiket();
 }
 public function setJudul($judul)
 {
 $this->tiket->setJudul($judul);
 }
 public function setKategori($kategori)
 {
 $this->tiket->setKategori($kategori);
 }
 public function setHarga($harga)
 {
 $this->tiket->setHarga($harga);
 }
 public function build()
 {
 return $this->tiket;
 }
}
// Kelas TiketDirector (Director)
class TiketDirector
{
 public function createTiketVIP($judul, $harga)
 {
 $builder = new TiketBuilder();
 $builder->setJudul($judul);
 $builder->setKategori('VIP');
 $builder->setHarga($harga);
 return $builder->build();
 }
 public function createTiketReguler($judul,
$harga)
 {
 $builder = new TiketBuilder();
 $builder->setJudul($judul);
 $builder->setKategori('Reguler');
 $builder->setHarga($harga);
 return $builder->build();
 }
}
// Penggunaan Builder Pattern
$tiketDirector = new TiketDirector();
// Membuat Tiket VIP
$tiketVIP = $tiketDirector->createTiketVIP('Konser
Band A', 500000);
echo $tiketVIP->getInfo() . "\n";
// Membuat Tiket Reguler
$tiketReguler = $tiketDirector-
>createTiketReguler('Konser Band B', 250000);
echo $tiketReguler->getInfo() . "\n";
?>