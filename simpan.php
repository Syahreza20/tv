<?php 

include('connect.php');

$jabatan       = $_POST['jabatan'];
$keterangan    = $_POST['keterangan'];
$waktu         = $_POST['waktu'];
 
$insert = mysqli_query($connect, "insert into mahasiswa set jabatan='$jabatan', keterangan='$keterangan', waktu='$waktu'");

?>
