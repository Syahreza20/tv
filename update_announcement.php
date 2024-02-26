<?php
include "connect.php";

$query = mysqli_query($connect, "SELECT * FROM mahasiswa");
while ($result = mysqli_fetch_array($query)) {
    echo '<tr>
            <td>' . $result['jabatan'] . '</td>
            <td>' . $result['keterangan'] . '</td>
            <td>' . $result['waktu'] . '</td>
          </tr>';
}
?>
