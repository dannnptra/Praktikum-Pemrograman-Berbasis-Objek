<?php

trait CetakLabel {
    public function cetakQR() {
        return "[QR-CODE] " . $this->merek . " - Rp " .
            number_format($this->harga, 0, ',', '.'); //Format nomor biar rapi
    }
}

//Parent class Produk
class Produk {
    protected $nama;
    protected $merek;
    protected $harga;

    public function __construct($nama, $merek, $harga) {
        //Validasi harga di constructor
        if (!is_numeric($harga) || $harga <= 0) {
            throw new Exception("Harga tidak valid: harga produk '$nama' harus berupa angka lebih besar dari 0.");
        }
        $this->nama  = $nama;
        $this->merek = $merek;
        $this->harga = $harga;
    }

    public function getInfo() {
        return "Merek: {$this->merek}<br>" .
            "Harga: Rp " . number_format($this->harga, 0, ',', '.');
    }
}

//Child class Makanan
class Makanan extends Produk {
    use CetakLabel;

    protected $tanggalKadaluarsa;

    public function __construct($nama, $merek, $harga, $tanggalKadaluarsa) {
        parent::__construct($nama, $merek, $harga);
        $this->tanggalKadaluarsa = $tanggalKadaluarsa;
    }

    public function cekStatus() {
        $hariIni = date('Y-m-d');
        return ($this->tanggalKadaluarsa < $hariIni) ? "Kadaluarsa" : "Segar";
    }

    //Override getInfo()
    public function getInfo() {
        $infoParent = parent::getInfo();
        return "Produk: Makanan - {$this->nama}<br>" .
            $infoParent . "<br>" .
            "Tanggal Kadaluarsa: {$this->tanggalKadaluarsa}<br>" .
            "Status: " . $this->cekStatus();
    }
}

//Child class Elektronik
class Elektronik extends Produk {
    use CetakLabel;

    protected $garansi; // dalam bulan

    public function __construct($nama, $merek, $harga, $garansi) {
        parent::__construct($nama, $merek, $harga);
        $this->garansi = $garansi;
    }

    //Override getInfo()
    public function getInfo() {
        $infoParent = parent::getInfo();
        return "Produk: Elektronik - {$this->nama}<br>" .
            $infoParent . "<br>" .
            "Garansi: {$this->garansi} bulan";
    }
}

//Penggunaan
try {
    $makanan    = new Makanan("Mie Instan", "Indomie", 3500, "2025-06-30");
    $elektronik = new Elektronik("Smart TV", "Samsung", 5000000, 12);

    echo $makanan->getInfo();
    echo "<br>" . $makanan->cetakQR();
    echo "<br><br>";
    echo $elektronik->getInfo();
    echo "<br>" . $elektronik->cetakQR();

    //Uji validasi harga
    $produkInvalid = new Elektronik("Kipas Angin", "Miyako", -50000, 6);
} catch (Exception $e) {
    echo "<br><br>Terjadi kesalahan: " . $e->getMessage();
}