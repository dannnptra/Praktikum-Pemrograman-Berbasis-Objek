<?php
class Menu {
    private $kodeMenu;
    private $namaMenu;
    private $harga;
    private $stok;

    public function __construct($kodeMenu, $namaMenu, $harga, $stok) {
        $this->kodeMenu = $kodeMenu;
        $this->namaMenu = $namaMenu;
        $this->harga = $harga;
        $this->stok = $stok;
    }

    //fungsi menampilkan info menu
    public function getInfoMenu() {
        return $this->kodeMenu . " - " . $this->namaMenu . " - Rp " . $this->harga . " - stok: " . $this->stok;
    }

    //fungsi mengubah stok (jumlah negatif untuk mengurangi stok)
    public function updateStok($jumlah) {
        $this->stok = $this->stok + $jumlah;
    }

    //getter supaya atribut private bisa dibaca class lain
    public function getNamaMenu() {
        return $this->namaMenu;
    }

    public function getHarga() {
        return $this->harga;
    }

    public function getStok() {
        return $this->stok;
    }
}
