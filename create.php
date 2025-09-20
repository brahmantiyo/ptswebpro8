<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tambah Siswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
    h2 {
      text-align: center;
      font-weight: 600;
    }
    .form-card {
      max-width: 600px;
      margin: 0 auto;
    }
    .btn-group-custom {
      text-align: center;
    }
    .btn-group-custom .btn {
      margin: 5px;
      min-width: 120px;
    }
  </style>
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2 class="mb-4">Tambah Data Siswa</h2>
  <form method="POST" class="card p-4 shadow-sm form-card">
    <div class="mb-3">
      <label class="form-label">Nama</label>
      <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Gender</label>
      <select name="jekel" class="form-select">
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Kelas</label>
      <input type="text" name="kelas" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Tanggal Lahir</label>
      <input type="date" name="tanggalLahir" class="form-control">
    </div>
    <div class="btn-group-custom">
      <button type="submit" name="submit" class="btn btn-success">Simpan</button>
      <a href="index.php" class="btn btn-secondary">Kembali</a>
    </div>
  </form>
</div>
</body>
</html>

<?php
if(isset($_POST['submit'])){
  $nama = $_POST['nama'];
  $jekel = $_POST['jekel'];
  $kelas = $_POST['kelas'];
  $tanggal = $_POST['tanggalLahir'];

  $sql = "INSERT INTO students (nama, jekel, kelas, tanggalLahir) 
          VALUES ('$nama','$jekel','$kelas','$tanggal')";
  if($conn->query($sql)){
    header("Location: index.php");
  } else {
    echo "Error: ".$conn->error;
  }
}
?>
