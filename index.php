<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CRUD Siswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
    .container {
      max-width: 900px;
    }
    h2 {
      text-align: center;
      font-weight: 600;
    }
    .btn-custom {
      display: block;
      margin: 0 auto 20px auto;
    }
  </style>
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2 class="mb-4">Daftar Siswa</h2>
  <a href="create.php" class="btn btn-primary btn-custom">+ Tambah Siswa</a>
  <table class="table table-striped table-bordered text-center align-middle">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Gender</th>
        <th>Kelas</th>
        <th>Tanggal Lahir</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $result = $conn->query("SELECT * FROM students");
      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['jekel'] ?></td>
            <td><?= $row['kelas'] ?></td>
            <td><?= $row['tanggalLahir'] ?></td>
            <td>
              <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning me-1">Edit</a>
              <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data?')">Delete</a>
            </td>
          </tr>
        <?php endwhile;
      } else {
        echo "<tr><td colspan='6'>Belum ada data</td></tr>";
      } ?>
    </tbody>
  </table>
</div>
</body>
</html>
