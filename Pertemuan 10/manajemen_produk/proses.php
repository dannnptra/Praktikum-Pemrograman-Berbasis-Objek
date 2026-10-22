<?php

require_once "Product.php";

$aksi = $_POST["aksi"] ?? "";
$pesan = "";

try {
    //cek isian form untuk aksi tambah dan ubah
    if ($aksi == "tambah" || $aksi == "ubah") {
        $nama = trim($_POST["nama"]);
        $harga = $_POST["harga"];
        $stok = $_POST["stok"];

        if ($nama == "" || !is_numeric($harga) || !is_numeric($stok) || $harga < 0 || $stok < 0) {
            header("Location: index.php?pesan=" . urlencode("Data tidak valid, periksa kembali isian form"));
            exit;
        }
    }

    if ($aksi == "tambah") {
        //proses tambah data
        $produk = new Product($nama, $harga, $stok);
        $produk->save();
        $pesan = "Data berhasil ditambahkan";
    } elseif ($aksi == "ubah") {
        //proses update data
        $produk = new Product($nama, $harga, $stok);
        $produk->update($_POST["id"]);
        $pesan = "Data berhasil diubah";
    } elseif ($aksi == "hapus") {
        //proses hapus data
        Product::delete($_POST["id"]);
        $pesan = "Data berhasil dihapus";
    }
} catch (PDOException $e) {
    $pesan = "Terjadi kesalahan: " . $e->getMessage();
}

header("Location: index.php?pesan=" . urlencode($pesan));
exit;
