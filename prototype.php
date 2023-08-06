<?php 
// Kelas Prototype Tiket
class TiketPrototype
{
 private $judul;
 private $kategori;
 private $harga;
 public function __construct($judul, $kategori, $harga)
 {
 $this->judul = $judul;
 $this->kategori = $kategori;
 $this->harga = $harga;
 }
 public function getJudul()
 {
 return $this->judul;
 }
 public function getKategori()
 {
 return $this->kategori;
 }
 public function getHarga()
 {
 return $this->harga;
 }
 // Metode untuk mengklon objek Tiket
 public function clone()
 {
 // Membuat klon Tiket dengan atribut yang sama
 $clonedTiket = new TiketPrototype($this->judul,
$this->kategori, $this->harga);
 return $clonedTiket;
 }
}
// Penggunaan Prototype Pattern untuk mengkloning Tiket
// Membuat tiket asli
$tiketAsli = new TiketPrototype('Konser Band A', 'Musik',
250000);
// Mengklon tiket asli untuk membuat tiket berbeda
$tiketVip = $tiketAsli->clone();
$tiketVip->setKategori('VIP');
$tiketVip->setHarga(500000);
$tiketReguler = $tiketAsli->clone();
$tiketReguler->setKategori('Reguler');
$tiketReguler->setHarga(200000);
// Menampilkan informasi tiket
echo "Tiket Asli: " . $tiketAsli->getJudul() . " - " .
$tiketAsli->getKategori() . " - " . $tiketAsli->getHarga()
. "\n";
echo "Tiket VIP: " . $tiketVip->getJudul() . " - " .
$tiketVip->getKategori() . " - " . $tiketVip->getHarga() .
"\n";
echo "Tiket Reguler: " . $tiketReguler->getJudul() . " - "
. $tiketReguler->getKategori() . " - " . $tiketReguler-
>getHarga() . "\n";
?>