<?php
require('functions/config.php'); // Koneksi database
require('functions/functions.php');// Menyertakan file fungsi



// Memastikan ID buku disediakan
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Mengambil data buku berdasarkan ID
    $query = "SELECT * FROM buku WHERE id = $id";
    $result = mysqli_query($koneksi, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo '<div class="alert alert-danger" role="alert">Buku tidak ditemukan.</div>';
        exit();
    }
} else {
    echo '<div class="alert alert-danger" role="alert">ID buku tidak disediakan.</div>';
    exit();
}

// Menangani form pengiriman
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];

    // Memanggil fungsi untuk memperbarui buku
    if (updateBook($id, $judul, $penulis, $penerbit, $tahun, $kategori, $deskripsi)) {
        header("Location: catalog.php");
        exit();
    } else {
        echo '<div class="alert alert-danger" role="alert">Gagal memperbarui buku. Silakan coba lagi.</div>';
    }
}
?>

<?php
require('includes/kepala.php'); // Menggunakan kepala HTML
require('includes/nav.php');  // Menyertakan navigasi
?>
<div class="container">
    <h1>Edit Buku</h1>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" id="judul" value="<?php echo htmlspecialchars($row['judul']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>
            <input type="text" name="penulis" class="form-control" id="penulis" value="<?php echo htmlspecialchars($row['penulis']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" name="penerbit" class="form-control" id="penerbit" value="<?php echo htmlspecialchars($row['penerbit']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="number" name="tahun" class="form-control" id="tahun" value="<?php echo htmlspecialchars($row['tahun']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" name="kategori" class="form-control" id="kategori" value="<?php echo htmlspecialchars($row['kategori']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id="deskripsi" required><?php echo htmlspecialchars($row['deskripsi']); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui Buku</button>
    </form>
</div>

<?php require('includes/buntut.php');  // Menggunakan bagian akhir HTML ?>
