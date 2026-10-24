<?php
require_once "src/Pelanggan.php";
require_once "src/Menu.php";
require_once "src/Pesanan.php";

//1. membuat objek pelanggan
echo "<h3>1. Data Pelanggan</h3>";
$budi = new Pelanggan("P001", "Budi Santoso", "081234567890", "Jl. Merdeka No. 10, Pontianak");
$sari = new Pelanggan("P002", "Sari Dewi", "082198765432", "Jl. Ahmad Yani No. 5, Pontianak");
echo $budi->getInfoPelanggan() . "<br>";
echo $sari->getInfoPelanggan() . "<br>";

//2. membuat objek menu
echo "<h3>2. Daftar Menu</h3>";
$nasiGoreng = new Menu("M001", "Nasi Goreng", 20000, 5);
$mieAyam = new Menu("M002", "Mie Ayam", 15000, 5);
$esTeh = new Menu("M003", "Es Teh Manis", 5000, 1);
echo $nasiGoreng->getInfoMenu() . "<br>";
echo $mieAyam->getInfoMenu() . "<br>";
echo $esTeh->getInfoMenu() . "<br>";

//3. Budi membuat pesanan (relasi Pelanggan ke Pesanan)
echo "<h3>3. Budi Membuat Pesanan</h3>";
$pesanan1 = $budi->buatPesanan();
echo "No Pesanan: " . $pesanan1->getNoPesanan() . "<br>";
echo "idPelanggan: " . $pesanan1->getIdPelanggan() . "<br>";
echo "Tanggal: " . $pesanan1->getTanggalPemesanan() . "<br>";
echo "Status: " . $pesanan1->getStatusPesanan() . "<br>";

//4. menambah menu ke pesanan (relasi Pesanan ke Menu)
echo "<h3>4. Menambah Menu ke Pesanan Budi</h3>";
$pesanan1->tambahMenu($nasiGoreng);
$pesanan1->tambahMenu($nasiGoreng);
$pesanan1->tambahMenu($esTeh);
echo "Total: Rp " . $pesanan1->hitungTotal() . "<br>";

//5. Sari membuat pesanan
echo "<h3>5. Sari Membuat Pesanan</h3>";
$pesanan2 = $sari->buatPesanan();
$pesanan2->tambahMenu($mieAyam);
echo "No Pesanan: " . $pesanan2->getNoPesanan() . "<br>";
echo "idPelanggan: " . $pesanan2->getIdPelanggan() . "<br>";
echo "Total: Rp " . $pesanan2->hitungTotal() . "<br>";

//6. mengubah status pesanan
echo "<h3>6. Update Status Pesanan Budi</h3>";
$pesanan1->updateStatus("Diproses");
echo "Status: " . $pesanan1->getStatusPesanan() . "<br>";

//7. cek stok menu
echo "<h3>7. Stok Menu Setelah Pemesanan</h3>";
echo $nasiGoreng->getInfoMenu() . "<br>";
echo $mieAyam->getInfoMenu() . "<br>";
echo $esTeh->getInfoMenu() . "<br>";

//8. uji stok habis
echo "<h3>8. Uji Stok Habis</h3>";
$pesanan2->tambahMenu($esTeh);
