<?php
include 'config/koneksi.php'; // Koneksi ke database
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Dosen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-warning {
            background-color: #ffc107;
            color: black;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-sm {
            padding: 5px 10px;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <h2>Daftar Dosen</h2>
            <div>
                <form method="GET" style="display: inline;">
                    <input type="text" name="search" placeholder="Cari..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" style="padding: 5px; font-size: 14px;">
                    <select name="filter" style="padding: 5px; font-size: 14px;">
                        <option value="nama_dosen" <?= (isset($_GET['filter']) && $_GET['filter'] == 'nama_dosen') ? 'selected' : '' ?>>Nama</option>
                        <option value="nip" <?= (isset($_GET['filter']) && $_GET['filter'] == 'nip') ? 'selected' : '' ?>>NIP</option>
                        <option value="email" <?= (isset($_GET['filter']) && $_GET['filter'] == 'email') ? 'selected' : '' ?>>Email</option>
                        <option value="username" <?= (isset($_GET['filter']) && $_GET['filter'] == 'username') ? 'selected' : '' ?>>Username</option>
                    </select>
                    <button type="submit" class="btn btn-primary btn-sm">Cari</button>
                </form>
                <a href="tambah_dosen.php" class="btn btn-primary">+ Tambah Dosen</a>
            </div>
        </div>

        <?php
        // Query untuk mengambil semua dosen dari database
        $search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
        $filter = isset($_GET['filter']) ? $conn->real_escape_string($_GET['filter']) : 'nama_dosen';
        $sql = "SELECT * FROM dosen";

        if (!empty($search)) {
            $sql .= " WHERE $filter LIKE '%$search%'";
        }

        $sql .= " ORDER BY created_at DESC";
        $result = $conn->query($sql); // Menjalankan query
        ?>

        <div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($row = $result->fetch_assoc()):
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['nip'] ?></td>
                            <td><?= $row['nama_dosen'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?= $row['no_hp'] ?></td>
                            <td><?= $row['alamat'] ?></td>
                            <td>
                                <a href="edit_dosen.php?id=<?= $row['id_dosen'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="hapus_dosen.php?id=<?= $row['id_dosen'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>