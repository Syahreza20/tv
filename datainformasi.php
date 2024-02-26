<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Jabatan</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Waktu</th>
        </tr>
    </thead>
    <tbody>
        <?php
            include "connect.php";
            $no=1;
            $query=mysqli_query($connect, "SELECT * FROM Mahasiswa");
            while ($result=mysqli_fetch_array($query)) {
                ?>
                   <tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $result['jabatan']; ?></td>
    <td><?php echo $result['keterangan']; ?></td>
    <td><?php echo $result['waktu']; ?></td>
    <td>
        <button type="button" class="btn btn-danger btn-hapus" data-id="<?php echo $result['idmahasiswa']; ?>">Hapus</button>
    </td>
</tr>

                <?php            }
        ?>
    </tbody>
</table>
<script>
    $(document).ready(function () {
        // Menambahkan event handler untuk tombol hapus
        $(document).on('click', '.btn-hapus', function () {
            var id = $(this).data('id');

            // Menggunakan konfirmasi sebelum menghapus
            if (confirm('Anda yakin ingin menghapus data ini?')) {
                $.ajax({
                    type: 'POST',
                    url: 'hapus.php',
                    data: { id: id },
                    success: function () {
                        // Setelah menghapus data, reload tabel
                        location.reload();
                    }
                });
            }
        });
    });
</script>
