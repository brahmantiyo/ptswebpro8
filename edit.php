<?php 
include 'config.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM students WHERE id=$id");
$data = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Siswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2 class="mb-4">Edit Data Siswa</h2>
  <form method="POST" class="card p-4 shadow-sm">
    <div class="mb-3">
      <label class="form-label">Nama</label>
      <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Gender</label>
      <select name="jekel" class="form-select">
        <option value="Laki-laki" <?= $data['jekel']=='Laki-laki'?'selected':'' ?>>Laki-laki</option>
        <option value="Perempuan" <?= $data['jekel']=='Perempuan'?'selected':'' ?>>Perempuan</option>
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Kelas</label>
      <input type="text" name="kelas" class="form-control" value="<?= $data['kelas'] ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Tanggal Lahir</label>
      <input type="date" name="tanggalLahir" class="form-control" value="<?= $data['tanggalLahir'] ?>">
    </div>
    <button type="submit" name="update" class="btn btn-primary">Update</button>
    <a href="index.php" class="btn btn-danger">Kembali</a>
  </form>
</div>
</body>
</html>

<?php
if(isset($_POST['update'])){
  $nama = $_POST['nama'];
  $jekel = $_POST['jekel'];
  $kelas = $_POST['kelas'];
  $tanggal = $_POST['tanggalLahir'];

  $sql = "UPDATE students SET nama='$nama', jekel='$jekel', kelas='$kelas', tanggalLahir='$tanggal' WHERE id=$id";
  if($conn->query($sql)){
    header("Location: index.php");
  } else {
    echo "Error: ".$conn->error;
  }
}
?>
