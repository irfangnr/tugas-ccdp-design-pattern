<?php 
// Kelas Singleton TiketStore
class TiketStore
{
 private static $instance;
 private $tiketStock;
 private function __construct()
 {
 // Private constructor untuk mencegah
pembuatan objek dari luar kelas
 // Contoh kasus sederhana: inisialisasi stok
tiket dari database atau sumber lainnya
 $this->tiketStock = [
 'VIP' => 100,
 'Reguler' => 200,
 'Economy' => 300
 ];
 }
 public static function getInstance()
 {
 if (!self::$instance) {
 self::$instance = new TiketStore();
 }
 return self::$instance;
 }
 public function getTiketStock($kategori)
 {
 return $this->tiketStock[$kategori] ?? 0;
 }
 public function updateTiketStock($kategori,
$jumlah)
 {
 if (array_key_exists($kategori, $this-
>tiketStock)) {
 $this->tiketStock[$kategori] -= $jumlah;
 if ($this->tiketStock[$kategori] < 0) {
 $this->tiketStock[$kategori] = 0;
 }
 }
 }
}
// Penggunaan Singleton Pattern
$tiketStore1 = TiketStore::getInstance();
$tiketStore2 = TiketStore::getInstance();
// Periksa apakah dua variabel mengacu pada objek
yang sama (singleton)
if ($tiketStore1 === $tiketStore2) {
 echo "tiketStore1 dan tiketStore2 adalah
singleton dan mengacu pada objek yang sama.\n";
}
// Mengakses stok tiket dari singleton instance
echo "Stok Tiket VIP: " . $tiketStore1-
>getTiketStock('VIP') . "\n";
echo "Stok Tiket Reguler: " . $tiketStore1-
>getTiketStock('Reguler') . "\n";
// Update stok tiket dari singleton instance
$tiketStore1->updateTiketStock('VIP', 5);
$tiketStore1->updateTiketStock('Reguler', 10);
// Periksa stok tiket setelah pembaruan
echo "Stok Tiket VIP setelah update: " .
$tiketStore1->getTiketStock('VIP') . "\n";
echo "Stok Tiket Reguler setelah update: " .
$tiketStore1->getTiketStock('Reguler') . "\n";
?>