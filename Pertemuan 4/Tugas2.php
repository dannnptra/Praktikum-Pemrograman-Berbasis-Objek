<?php
class Product{
    public $nama = "";
    public $harga= "";
    public $kategori= "";

    public function __construct($nama, $harga, $kategori){
        $this->nama = $nama;
        $this->harga = $harga;
        $this->kategori = $kategori;
    }

    public function getInfo(): string{
        return "Nama Produk: {$this->nama} <br>
        Harga Produk: Rp.{$this->harga}<br>
        Kategori: {$this->kategori}<br>";
    }

    public function diskon($jumlah){
        if ($jumlah >= 0 && $jumlah <= 100) 
            {
            $potongan = $jumlah / 100;
            $hargaDiskon = $this->harga - ($this->harga * $potongan);
            return $hargaDiskon;
        }
        else 
        {
            echo "Diskon terlalu kecil/besar";
            return $this->harga;
        }
    }
}

$prod1 = new Product("Sabun", 20000, "Kebersihan");
echo $prod1->getInfo();
echo "Harga setelah diskon adalah: Rp.";
echo $prod1->diskon(10);
echo "<br>"