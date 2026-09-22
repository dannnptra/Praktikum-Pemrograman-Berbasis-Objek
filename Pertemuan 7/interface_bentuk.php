<?php

interface Bentuk
{
    public function hitungLuas();
}

class Persegi implements Bentuk
{
    private $sisi;

    public function __construct($sisi)
    {
        $this->sisi = $sisi;
    }

    public function hitungLuas()
    {
        return $this->sisi * $this->sisi;
    }
}

class Lingkaran implements Bentuk
{
    private $radius;
    private const PHI = 3.14;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function hitungLuas()
    {
        return self::PHI * $this->radius * $this->radius;
    }
}

$bentukList = [
    new Persegi(5),
    new Lingkaran(7),
];

foreach ($bentukList as $bentuk) {
    $nama = (new ReflectionClass($bentuk))->getShortName();
    echo "Luas {$nama}: " . $bentuk->hitungLuas();
}