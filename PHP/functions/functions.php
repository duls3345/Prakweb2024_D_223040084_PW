<?php
include 'config.php';

function getAllBooks() {
    global $koneksi;
    $query = "SELECT * FROM buku";
    return mysqli_query($koneksi, $query);
}

function getBookById($id) {
    global $koneksi;
    $query = "SELECT * FROM buku WHERE id = $id";
    return mysqli_query($koneksi, $query);
}

function addBook($judul, $penulis, $penerbit, $tahun, $kategori, $deskripsi) {
    global $koneksi;
    $query = "INSERT INTO buku (judul, penulis, penerbit, tahun, kategori, deskripsi) VALUES ('$judul', '$penulis', '$penerbit', '$tahun', '$kategori', '$deskripsi')";
    return mysqli_query($koneksi, $query);
}

function updateBook($id, $judul, $penulis, $penerbit, $tahun, $kategori, $deskripsi) {
    global $koneksi;
    $query = "UPDATE buku SET judul='$judul', penulis='$penulis', penerbit='$penerbit', tahun='$tahun', kategori='$kategori', deskripsi='$deskripsi' WHERE id=$id";
    return mysqli_query($koneksi, $query);
}

function deleteBook($id) {
    global $koneksi;
    $query = "DELETE FROM buku WHERE id = $id";
    return mysqli_query($koneksi, $query);
}
?>
