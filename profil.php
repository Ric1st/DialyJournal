<div class="container">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Ganti Password</label>
            <input type="password" class="form-control" name="password" placeholder="Tuliskan Password Baru Jika Ingin Mengganti Password Saja">
        </div>
        <div class="mb-3">
            <label class="form-label">Ganti Foto Profil</label>
            <input type="file" class="form-control" name="gambar">
        </div>
        <div class="mb-3">
            <label class="form-label">Foto Profil Saat Ini</label><br>
            <?php
            include "koneksi.php";
                 
            $username = $_SESSION['username']; // Ambil username dari sesi
            $sql = "SELECT * FROM user WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            if ($user['foto']) {
                $foto = $user['foto'];
            } else {
                $foto = "default.jpg"; // Foto default jika belum ada
            }
            ?>
            <img src="img/<?= $foto ?>" class="img-thumbnail" alt="Foto Profil" style="width: 150px; height: 150px; object-fit: cover;" />
            </div>
        </div>
        
        <input type="submit" value="simpan" name="simpan" class="btn btn-primary">
    </form>
</div>

<?php
include "upload_foto.php";

if (isset($_POST['simpan'])) {
    include "koneksi.php";

    $username = $_SESSION['username'];
    $passwordBaru = $_POST['password']; // Ambil input password baru

    // Jika password diisi, enkripsi dengan MD5
    if (!empty($passwordBaru)) {
        $passwordEnkripsi = md5($passwordBaru);

        // Update password di database
        $sql = "UPDATE user SET password = ? WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $passwordEnkripsi, $username);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<script>
                alert('Update Password Sukses');
                document.location='admin.php?page=profil';
            </script>";
        } else {
            echo "<script>
                alert('Update Password Gagal');
                document.location='admin.php?page=profil';
            </script>";
        }
    }

    if (!empty($_FILES['gambar']['name'])) {
        // Panggil fungsi upload_foto untuk menangani upload
        $hasil_upload = upload_foto($_FILES['gambar']);
        
        // Periksa status upload
        if ($hasil_upload['status']) {
            // Jika upload sukses, update foto di database
            $new_foto = $hasil_upload['message']; // Nama file gambar baru
            $sql_update_foto = "UPDATE user SET foto = ? WHERE username = ?";
            $stmt = $conn->prepare($sql_update_foto);
            $stmt->bind_param("ss", $new_foto, $username);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "<script>
                    alert('Update Foto Sukses');
                    document.location='admin.php?page=profil';
                </script>";
            }
        } else {
            echo "<script>
                alert('Update Foto Gagal');
                document.location='admin.php?page=profil';
            </script>";
        }
    }
}

?>