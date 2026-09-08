<?php
// File: Mobil.php

class Mobil {
    private $merek;
    private $warna;
    private $kecepatan;
    private $tahun;

    public function __construct($merek, $warna, $kecepatan, $tahun) {
        $this->merek = $merek;
        $this->warna = $warna;
        $this->kecepatan = $kecepatan;
        $this->tahun = $tahun;
    }

    // Getter tiap property
    public function getMerek() {
        return $this->merek;
    }

    public function getWarna() {
        return $this->warna;
    }

    public function getKecepatan() {
        return $this->kecepatan;
    }

    public function getTahun() {
        return $this->tahun;
    }

    // Setter warna dengan validasi
    public function setWarna($warna) {
        if (empty($warna) || strlen($warna) < 3) {
            return "Warna tidak valid! Warna gaboleh kosong dan minimal 3 karakter.";
        }
        $this->warna = $warna;
        return "Warna berhasil diubah menjadi $this->warna";
    }

    // Setter kecepatan dengan validasi
    public function setKecepatan($kecepatan) {
        if ($kecepatan < 0) {
            return "Kecepatan tidak valid! Kecepatan gaboleh negatif.";
        }
        if ($kecepatan > 200) {
            return "Kecepatan tidak valid! Kecepatan maksimal 200 km/jam.";
        }
        $this->kecepatan = $kecepatan;
        return "Kecepatan berhasil diubah menjadi $this->kecepatan km/jam";
    }

    public function getInfo() {
        return "Mobil $this->merek ($this->tahun) berwarna $this->warna, kecepatan $this->kecepatan km/jam";
    }

    public function percepat($tambahan) {
        $this->kecepatan += $tambahan;
        if ($this->kecepatan > 200) {
            $this->kecepatan = 200;
        }
        return "Kecepatan sekarang: $this->kecepatan km/jam";
    }

    public function rem($pengurangan) {
        $this->kecepatan -= $pengurangan;
        if ($this->kecepatan < 0) $this->kecepatan = 0;
        return "Kecepatan sekarang: $this->kecepatan km/jam";
    }
}

// Membuat 3 objek berbeda
$mobil1 = new Mobil("Toyota Avanza", "Putih", 80, 2020);
$mobil2 = new Mobil("Honda Civic", "Hitam", 120, 2022);
$mobil3 = new Mobil("Suzuki Ertiga", "Silver", 60, 2019);

echo $mobil1->getInfo() . "<br>";
echo $mobil2->getInfo() . "<br>";
echo $mobil3->getInfo() . "<br>";

echo $mobil1->percepat(20) . "<br>";

echo $mobil1->rem(50) . "<br>";

// Contoh pemakaian getter
echo "Merek mobil1: " . $mobil1->getMerek() . "<br>";
echo "Warna mobil1: " . $mobil1->getWarna() . "<br>";

// Contoh pemakaian setter warna
echo $mobil1->setWarna("Merah") . "<br>";
echo $mobil1->setWarna("A") . "<br>"; // gagal, kurang dari 3 karakter

// Contoh pemakaian setter kecepatan
echo $mobil1->setKecepatan(150) . "<br>";
echo $mobil1->setKecepatan(-10) . "<br>"; // gagal, negatif
echo $mobil1->setKecepatan(250) . "<br>"; // gagal, lebih dari 200

?>