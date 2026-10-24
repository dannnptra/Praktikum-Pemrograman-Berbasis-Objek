<?php
require_once "Pesanan.php";

class Pelanggan {
    private $idPelanggan;
    private $nama;
    private $noTelepon;
    private $alamat;

    public function __construct($idPelanggan, $nama, $noTelepon, $alamat) {
        $this->idPelanggan = $idPelanggan;
        $this->nama = $nama;
        $this->noTelepon = $noTelepon;
        $this->alamat = $alamat;
    }

    //fungsi membuat pesanan baru, idPelanggan otomatis dikirim ke Pesanan
    public function buatPesanan() {
        $noPesanan = "PSN-" . rand(100, 999);
        return new Pesanan($noPesanan, $this->idPelanggan);
    }

    //fungsi menampilkan info pelanggan
    public function getInfoPelanggan() {
        return $this->idPelanggan . " - " . $this->nama . " - " . $this->noTelepon . " - " . $this->alamat;
    }
}
