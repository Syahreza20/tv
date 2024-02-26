<?php
include "connect.php";

// Memastikan bahwa variabel id telah diterima melalui metode POST
if (isset($_POST['id'])) {
    $id = mysqli_real_escape_string($connect, $_POST['id']);

    // Menjalankan query DELETE dengan parameter binding
    $query = mysqli_query($connect, "DELETE FROM mahasiswa WHERE idmahasiswa='$id'");

    // Memeriksa apakah query berhasil dijalankan
    if ($query) {
        echo "Data berhasil dihapus";
    } else {
        echo "Gagal menghapus data: " . mysqli_error($connect);
    }
} else {
    echo "ID tidak diterima";
}
?>
