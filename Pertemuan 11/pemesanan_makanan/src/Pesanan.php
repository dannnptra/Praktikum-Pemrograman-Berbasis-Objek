<?php
require_once "Menu.php";

class Pesanan {
    private $noPesanan;
    private $idPelanggan; //foreign key dari class Pelanggan
    private $tanggalPemesanan;
    private $statusPesanan;
    private $daftarMenu = array(); //menyimpan objek Menu yang dipesan

    public function __construct($noPesanan, $idPelanggan) {
        $this->noPesanan = $noPesanan;
        $this->idPelanggan = $idPelanggan;
        $this->tanggalPemesanan = date("d-m-Y");
        $this->statusPesanan = "Menunggu";
    }

    //fungsi menambah menu ke pesanan
    public function tambahMenu($menu) {
        if ($menu->getStok() > 0) {
            $menu->updateStok(-1);
            $this->daftarMenu[] = $menu;
            echo $menu->getNamaMenu() . " berhasil ditambahkan ke pesanan<br>";
        } else {
            echo "Stok " . $menu->getNamaMenu() . " habis<br>";
        }
    }

    //fungsi mengubah status pesanan
    public function updateStatus($statusBaru) {
        $this->statusPesanan = $statusBaru;
    }

    //fungsi menghitung total harga semua menu
    public function hitungTotal() {
        $total = 0;
        foreach ($this->daftarMenu as $menu) {
            $total = $total + $menu->getHarga();
        }
        return $total;
    }

    //getter
    public function getNoPesanan() {
        return $this->noPesanan;
    }

    public function getIdPelanggan() {
        return $this->idPelanggan;
    }

    public function getTanggalPemesanan() {
        return $this->tanggalPemesanan;
    }

    public function getStatusPesanan() {
        return $this->statusPesanan;
    }

    public function getDaftarMenu() {
        return $this->daftarMenu;
    }
}
