<?php

require_once "DatabaseConnection.php";

class Product
{
    public $nama;
    public $harga;
    public $stok;

    public function __construct($nama, $harga, $stok)
    {
        $this->nama = $nama;
        $this->harga = $harga;
        $this->stok = $stok;
    }

    //fungsi tambah data
    public function save()
    {
        $db = DatabaseConnection::getConnection();

        $sql = "INSERT INTO products (nama, harga, stok) VALUES (:nama, :harga, :stok)";
        $query = $db->prepare($sql);

        return $query->execute([
            ":nama" => $this->nama,
            ":harga" => $this->harga,
            ":stok" => $this->stok
        ]);
    }

    //fungsi lihat semua data
    public static function findAll()
    {
        $db = DatabaseConnection::getConnection();

        $query = $db->query("SELECT * FROM products ORDER BY id ASC");

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    //fungsi lihat satu data berdasarkan id
    public static function findById($id)
    {
        $db = DatabaseConnection::getConnection();

        $query = $db->prepare("SELECT * FROM products WHERE id = :id");
        $query->execute([":id" => $id]);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    //fungsi update data berdasarkan id
    public function update($id)
    {
        $db = DatabaseConnection::getConnection();

        $sql = "UPDATE products SET nama = :nama, harga = :harga, stok = :stok WHERE id = :id";
        $query = $db->prepare($sql);

        return $query->execute([
            ":nama" => $this->nama,
            ":harga" => $this->harga,
            ":stok" => $this->stok,
            ":id" => $id
        ]);
    }

    //fungsi hapus data berdasarkan id
    public static function delete($id)
    {
        $db = DatabaseConnection::getConnection();

        $query = $db->prepare("DELETE FROM products WHERE id = :id");

        return $query->execute([":id" => $id]);
    }
}
