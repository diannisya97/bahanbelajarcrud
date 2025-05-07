
<?php
// Menghubungkan ke database
include 'config/koneksi.php';

// Mengecek apakah form dikirim (submit) dengan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Menangkap data dari form input
    $nip        = $_POST['nip'];
    $nama       = $_POST['nama_dosen'];
    $email      = $_POST['email'];
    $username   = $_POST['username'];
    $password   = password_hash($_POST['password'], PASSWORD_DEFAULT); // Mengenskripsi password
    $no_hp      = $_POST['no_hp'];
    $alamat     = $_POST['alamat'];

    // Query untuk menyimpan data ke dalam tabel dosen
    $sql = "INSERT INTO dosen (nip, nama_dosen, email, username, password, no_hp, alamat)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql); // Mempersiapkan statement SQL untuk dieksekusi
    $stmt->bind_param("sssssss", $nip, $nama, $email, $username, $password, $no_hp, $alamat); 
    // Mengikat variabel ke placeholder (tanda ?) dalam query, dengan tipe string (s)

    $stmt->execute(); // Menjalankan statement yang telah disiapkan

    // Mengecek apakah ada data yang berhasil dimasukkan
    if ($stmt->affected_rows > 0) {
        echo "Data dosen berhasil ditambahkan.";
    } else {
        echo "Gagal menambahkan data.";
    }

    $stmt->close();  // Menutup statement
    $conn->close();  // Menutup koneksi database
}
?>

<!-- Form input data dosen -->
<form method="POST" action="">
    NIP: <input type="text" name="nip" required><br>
    Nama: <input type="text" name="nama_dosen" required><br>
    Email: <input type="email" name="email"><br>
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    No HP: <input type="text" name="no_hp"><br>
    Alamat: <textarea name="alamat"></textarea><br>
    <input type="submit" value="Simpan">
</form>

<a href="daftar_dosen.php">Kembali ke Daftar</a>