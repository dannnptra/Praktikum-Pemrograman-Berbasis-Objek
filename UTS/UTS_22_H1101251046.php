<?php

abstract class KursusCoding {
    protected $id;
    protected $nama;
    protected $hargaDasar;

    public function __construct($id, $nama, $hargaDasar) {
        $this->id = $id;
        $this->nama =$nama;
        $this->hargaDasar = $hargaDasar;
    }

    public function getId(){
        return $this->id;
    }

    public function getNama() {
        return $this->nama;
    }

    public function getHargaDasar(){
        return $this->hargaDasar;
    }

    abstract public function hitungTotal();
    abstract public function getJenis();
}

class WebDev extends KursusCoding {
    private $bulan;

    public function __construct($id, $nama, $hargaDasar, $bulan){
        parent::__construct($id, $nama, $hargaDasar);
        $this->bulan = $bulan;
    }

    //biaya sertifikat 50rb
    public function hitungTotal() {
        return ($this->hargaDasar * $this->bulan) + 50000;
    }

    public function getJenis() {
        return 'WebDev';
    }

    public function cetakDetail(){
        return "WebDev $this->bulan bulan + sertifikat";
    }
}

class MobileDev extends KursusCoding {
    private $bulan;

    public function __construct($id, $nama, $hargaDasar, $bulan) {
        parent::__construct($id, $nama, $hargaDasar);
        $this->bulan = $bulan;
    }

    public function hitungTotal(){
        $total = $this->hargaDasar * $this->bulan;

        //  diskon 10% kalau lebih dari 2 bulan
        if ($this->bulan > 2) {
            $total = $total * 0.9;
        }
        return $total;
    }

    public function getJenis() {
        return 'MobileDev';
    }

    public function cetakDetail() {
        return "MobileDev $this->bulan bulan";
    }
}

class DataScience extends KursusCoding {
    private $bulan;

    public function __construct($id, $nama, $hargaDasar, $bulan){
        parent::__construct($id, $nama, $hargaDasar);
        $this->bulan = $bulan;
    }

    public function hitungTotal() {
        return $this->hargaDasar * $this->bulan + 75000; // tools
    }

    public function getJenis(){
        return "DataScience";
    }

    public function cetakDetail() {
        return "DataScience $this->bulan bulan + tools";
    }
}


$data = [
    new WebDev("C1", "Aldan", 500000, 3),
    new MobileDev("C2", "Dimas", 600000, 3),
    new DataScience("C3", "Elki", 700000, 2),
    new MobileDev("C4", "Zaki", 550000, 2),
    new WebDev("C5", "Cikidot", 450000, 4)
];

$totalSemua = 0;

foreach ($data as $i => $item) {
    $total = $item->hitungTotal();
    $totalSemua += $total;
    // tampilkan hasil
    echo "<b>No. " . ($i + 1) . "</b><br>";
    echo "Id : " . $item->getId() . "<br>";
    echo "Nama : ".$item->getNama()."<br>";
    echo "Jenis : " . $item->getJenis() . "<br>";
    echo "Harga Dasar : ".$item->getHargaDasar() . "<br>";
    echo "Total : " . $total . "<br>";
    echo "Detail : ".$item->cetakDetail() . "<br><br>";
}

echo "<b>Total Keseluruhan : " . $totalSemua . "</b><br>";

?>

