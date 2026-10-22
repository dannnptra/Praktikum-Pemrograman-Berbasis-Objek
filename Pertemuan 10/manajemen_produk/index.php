<?php

require_once "Product.php";

//ambil semua data produk dari database
$daftarProduk = Product::findAll();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Manajemen Produk</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #999; padding: 8px; text-align: left; }
        th { background-color: #e0e0e0; }
        input { padding: 6px; margin-right: 8px; }
        .pesan { background-color: #e8f4e8; border: 1px solid #7cae7c; padding: 8px; margin-bottom: 15px; }
        .aksi form { display: inline; }
    </style>
</head>
<body>
    <h2>Manajemen Produk</h2>

    <?php if (isset($_GET["pesan"]) && $_GET["pesan"] != "") { ?>
        <div class="pesan"><?php echo htmlspecialchars($_GET["pesan"]); ?></div>
    <?php } ?>

    <h3>Tambah Produk</h3>
    <form action="proses.php" method="post">
        <input type="hidden" name="aksi" value="tambah">
        <input type="text" name="nama" placeholder="Nama produk" required>
        <input type="number" name="harga" placeholder="Harga" min="0" required>
        <input type="number" name="stok" placeholder="Stok" min="0" required>
        <button type="submit">Simpan</button>
    </form>

    <h3>Daftar Produk</h3>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php if (count($daftarProduk) == 0) { ?>
            <tr>
                <td colspan="5">Belum ada data produk.</td>
            </tr>
        <?php } ?>
        <?php foreach ($daftarProduk as $no => $produk) { ?>
            <tr>
                <td><?php echo $no + 1; ?></td>
                <td><?php echo htmlspecialchars($produk["nama"]); ?></td>
                <td>Rp <?php echo number_format($produk["harga"], 0, ",", "."); ?></td>
                <td><?php echo $produk["stok"]; ?></td>
                <td class="aksi">
                    <a href="edit.php?id=<?php echo $produk["id"]; ?>">Edit</a>
                    <form action="proses.php" method="post" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                        <input type="hidden" name="aksi" value="hapus">
                        <input type="hidden" name="id" value="<?php echo $produk["id"]; ?>">
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
