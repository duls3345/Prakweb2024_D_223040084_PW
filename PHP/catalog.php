<?php
include 'includes/kepala.php';
include 'includes/nav.php';
include 'functions/functions.php';

$books = getAllBooks();
?>

<div class="container">
    <h1>Katalog Buku</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($books)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['judul']; ?></td>
                    <td><?php echo $row['penulis']; ?></td>
                    <td><?php echo $row['penerbit']; ?></td>
                    <td><?php echo $row['tahun']; ?></td>
                    <td><?php echo $row['kategori']; ?></td>
                    <td><?php echo $row['deskripsi']; ?></td>
                    <td>
                        <a href="editBook.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="deleteBook.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include 'includes/buntut.php'; ?>
