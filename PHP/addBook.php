<?php
require('functions/config.php');// Koneksi database
require('functions/functions.php'); // Menyertakan file fungsi (jika ada)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari form
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];

    // Memasukkan data buku ke database
    $query = "INSERT INTO buku (judul, penulis, penerbit, tahun, kategori, deskripsi) 
              VALUES ('$judul', '$penulis', '$penerbit', '$tahun', '$kategori', '$deskripsi')";
    
    if (mysqli_query($koneksi, $query)) {
        // Jika berhasil, redirect ke halaman katalog
        header("Location: catalog.php");
        exit();
    } else {
        echo '<div class="alert alert-danger" role="alert">Gagal menambah buku. Silakan coba lagi.</div>';
    }
}
?>

<?php
require('includes/kepala.php'); // Menggunakan kepala HTML
require('includes/nav.php');  // Menyertakan navigasi
?>

<h1>Tambah Buku</h1>

<div class="container">
    <form method="POST" action="">
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" id="judul" required>
        </div>
        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>
            <input type="text" name="penulis" class="form-control" id="penulis" required>
        </div>
        <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" name="penerbit" class="form-control" id="penerbit" required>
        </div>
        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="number" name="tahun" class="form-control" id="tahun" required>
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" name="kategori" class="form-control" id="kategori" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" id="deskripsi">
        </div>
        <button type="submit" class="btn btn-primary">Tambah Buku</button>  
    </form>
</div>

<?php require('includes/buntut.php');  // Menggunakan bagian akhir HTML ?>
