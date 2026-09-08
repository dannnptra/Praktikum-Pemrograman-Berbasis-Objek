<?php 
class Mobil {
    public $merk = "";
    public $warna = "";
    public $kecepatan ="";

    public function __construct($merk, $warna, $kecepatan){ 
        $this->merk = $merk;
        $this->warna = $warna;
        $this->kecepatan = $kecepatan;
    }

    public function getInfo(): string {
        return  "Mobil {$this->merk} warna {$this->warna} dengan kecepatan {$this->kecepatan} km/jam.<br>";
    }

    public function jalan() {
        echo "Mobil sedang berjalan dengan kecepatan {$this->kecepatan} km/jam.<br>";
    }

    public function berhenti() {
        echo "Mobil berhenti";
    }
}

$p= new Mobil("Toyota", "Hitam", 20);
    echo $p->getInfo();
    echo $p->jalan();
echo $p->berhenti();