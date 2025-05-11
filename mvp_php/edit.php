<?php
include("view/TampilMahasiswa.php");

$prosesmhs = new ProsesMahasiswa();
$mahasiswa = null;

if (isset($_GET['nim'])) {
    $mahasiswa = $prosesmhs->prosesDataMahasiswaByNIM($_GET['nim']);
}

if ($_POST) {
    $prosesmhs->prosesUpdateMahasiswa(
        $_POST['nim'],
        $_POST['nama'],
        $_POST['tempat'],
        $_POST['tl'],
        $_POST['gender'],
        $_POST['email'],
        $_POST['telp']
    );
    header("location: index.php");
}

if (!$mahasiswa) {
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Edit Data Mahasiswa</h2>
        <form method="post">
            <input type="hidden" name="nim" value="<?php echo $mahasiswa['nim']; ?>">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $mahasiswa['nama']; ?>" required>
            </div>
            <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" name="tempat" class="form-control" value="<?php echo $mahasiswa['tempat']; ?>" required>
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tl" class="form-control" value="<?php echo $mahasiswa['tl']; ?>" required>
            </div>
            <div class="form-group">
                <label>Gender</label>
                <select name="gender" class="form-control" required>
                    <option value="Laki-laki" <?php echo $mahasiswa['gender'] == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php echo $mahasiswa['gender'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $mahasiswa['email']; ?>" required>
            </div>
            <div class="form-group">
                <label>Telepon</label>
                <input type="text" name="telp" class="form-control" value="<?php echo $mahasiswa['telp']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>