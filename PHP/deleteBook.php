<?php
include 'functions/config.php';
include 'functions/functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (deleteBook($id)) {
        header("Location: catalog.php");
        exit();
    } else {
        echo '<div class="alert alert-danger">Gagal menghapus buku.</div>';
    }
} else {
    echo '<div class="alert alert-danger">ID tidak disediakan.</div>';
}
?>
