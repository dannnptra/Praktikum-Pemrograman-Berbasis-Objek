<?php

require_once "Product.php";

//ambil satu data produk berdasarkan id dari url
$id = $_GET["id"] ?? 0;
$produk = Product::findById($id);

//kalau data tidak ditemukan, kembali ke halaman utama
if (!$produk) {
    header("Location: index.php?pesan=" . urlencode("Data produk tidak ditemukan"));
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        input { padding: 6px; margin: 4px 0 12px 0; width: 250px; }
    </style>
</head>
<body>
    <h2>Edit Produk</h2>

    <form action="proses.php" method="post">
        <input type="hidden" name="aksi" value="ubah">
        <input type="hidden" name="id" value="<?php echo $produk["id"]; ?>">

        Nama produk<br>
        <input type="text" name="nama" value="<?php echo htmlspecialchars($produk["nama"]); ?>" required><br>

        Harga<br>
        <input type="number" name="harga" value="<?php echo $produk["harga"]; ?>" min="0" required><br>

        Stok<br>
        <input type="number" name="stok" value="<?php echo $produk["stok"]; ?>" min="0" required><br>

        <button type="submit">Simpan Perubahan</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>
