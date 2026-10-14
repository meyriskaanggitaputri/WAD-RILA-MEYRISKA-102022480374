<?php

session_start();

    $nama = "";
    $nik = "";
    $tanggal_lahir = "";
    $jenis_kelamin = "";
    $nomor_hp = "";
    $nomor_rekam_medis = "";
    $alamat = "";
    $nama_kontak = "";
    $nomor_kontak = "";

    $namaErr = "";
    $nikErr = "";
    $tanggal_lahirErr = "";
    $jenis_kelaminErr = "";
    $nomor_hpErr = "";
    $nomor_rekam_medisErr = "";
    $alamatErr = "";
    $nama_kontakErr = "";
    $nomor_kontakErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // validasi nama
    $nama = trim($_POST["nama"] ?? "");
    if (empty($nama)) {
        $namaErr = "Nama wajib diisi";
    }

    // validasi NIK
    $nik = trim($_POST["nik"] ?? "");
    if (empty($nik)) {
        $nikErr = "NIK wajib diisi";
    }

    // validasi tanggal lahir
    $tanggal_lahir = trim($_POST["tanggal_lahir"] ?? "");
    if (empty($tanggal_lahir)) {
        $tanggal_lahirErr = "Tanggal Lahir wajib diisi";
    }

    // validasi jenis kelamin
    $jenis_kelamin = trim($_POST["jenis_kelamin"] ?? "");
    if (empty($jenis_kelamin)) {
        $jenis_kelaminErr = "Jenis Kelamin wajib diisi";
    }

    // validasi nomor HP
    $nomor_hp = trim($_POST["nomor_hp"] ?? "");
    if (empty($nomor_hp)) {
        $nomor_hpErr = "Nomor HP wajib diisi";
    }

    // validasi nomor rekam medis
    $nomor_rekam_medis = trim($_POST["nomor_rekam_medis"] ?? "");
    if (empty($nomor_rekam_medis)) {
        $nomor_rekam_medisErr = "Nomor Rekam Medis wajib diisi";
    }

    // validasi alamat
    $alamat = trim($_POST["alamat"] ?? "");
    if (empty($alamat)) {
        $alamatErr = "Alamat wajib diisi";
    }

    // validasi nama kontak
    $nama_kontak = trim($_POST["nama_kontak"] ?? "");
    if (empty($nama_kontak)) {
        $nama_kontakErr = "Nama Kontak wajib diisi";
    }

    // validasi nomor kontak
    $nomor_kontak = trim($_POST["nomor_kontak"] ?? "");
    if (empty($nomor_kontak)) {
        $nomor_kontakErr = "Nomor Kontak wajib diisi";
    }

    // simpan kalau semua kolom terisi (tidak ada error)
    if (
        empty($namaErr) &&
        empty($nikErr) &&
        empty($tanggal_lahirErr) &&
        empty($jenis_kelaminErr) &&
        empty($nomor_hpErr) &&
        empty($nomor_rekam_medisErr) &&
        empty($alamatErr) &&
        empty($nama_kontakErr) &&
        empty($nomor_kontakErr)
    ) {
        if (!isset($_SESSION["pasien"])) {
            $_SESSION["pasien"] = [];
        }

        $_SESSION["pasien"][] = [
            "nama" => $nama,
            "nik" => $nik,
            "tanggal_lahir" => $tanggal_lahir,
            "jenis_kelamin" => $jenis_kelamin,
            "nomor_hp" => $nomor_hp,
            "nomor_rekam_medis" => $nomor_rekam_medis,
            "alamat" => $alamat,
            "nama_kontak" => $nama_kontak,
            "nomor_kontak" => $nomor_kontak
        ];

        header("Location: tampilan.php");
        exit;
    }


$query = "INSERT INTO pasien (nama, nik, tanggal_lahir, jenis_kelamin, nomor_hp, nomor_rekam_medis, alamat, nama_kontak, nomor_kontak)
         VALUES ('$nama', '$nik', '$tanggal_lahir', '$jenis_kelamin', '$nomor_hp', '$nomor_rekam_medis', '$alamat', '$nama_kontak', '$nomor_kontak')";

mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) > 0) {
    header("Location: tampilan.php");
} else {
    echo "
    <script>
        alert('Failed to add patient');
        window.location='tampilan.php';
    </script>
    ";
    exit;
}
         
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manajemen Pasien</title>

    <link rel="stylesheet" href="display.css">

</head>

<body>

    <h1>Sistem Informasi Klinik Rawat Jalan</h1>

    <h2>Form Input Data Pasien</h2>

    <form method="POST" action="index.php">

        <h3>1. Profil Pasien</h3>

        <label>Nama Lengkap Pasien:</label>
        <input type="text" name="nama" value="<?php echo htmlspecialchars($nama); ?>">

        <span class="error">
            <?php echo $namaErr ? "* $namaErr" : ""; ?>
        </span>

        <br><br>


        <label>NIK:</label>
        <input type="text" name="nik" value="<?php echo htmlspecialchars($nik); ?>">

        <span class="error">
            <?php echo $nikErr ? "* $nikErr" : ""; ?>
        </span>

        <br><br>


        <label>Tanggal Lahir:</label>
        <input type="text" name="tanggal_lahir" value="<?php echo htmlspecialchars($tanggal_lahir); ?>">

        <span class="error">
            <?php echo $tanggal_lahirErr ? "* $tanggal_lahirErr" : ""; ?>
        </span>

        <br><br>


        <label>Jenis Kelamin:</label>
        <input type="text" name="jenis_kelamin" value="<?php echo htmlspecialchars($jenis_kelamin); ?>">

        <span class="error">
            <?php echo $jenis_kelaminErr ? "* $jenis_kelaminErr" : ""; ?>
        </span>

        <br><br>


        <label>Nomor HP:</label>
        <input type="tel" name="nomor_hp" value="<?php echo htmlspecialchars($nomor_hp); ?>">

        <span class="error">
            <?php echo $nomor_hpErr ? "* $nomor_hpErr" : ""; ?>
        </span>

        <br><br>


        <h3>2. Nomor Rekam Medis Dasar</h3>

        <label>Nomor Rekam Medis:</label>
        <input type="text" name="nomor_rekam_medis" value="<?php echo htmlspecialchars($nomor_rekam_medis); ?>">

        <span class="error">
            <?php echo $nomor_rekam_medisErr ? "* $nomor_rekam_medisErr" : ""; ?>
        </span>

        <br><br>


        <h3>3. Domisili Pasien</h3>

        <label>Alamat / Domisili:</label>

        <br>

        <textarea name="alamat" rows="4" cols="40"><?php echo htmlspecialchars($alamat); ?></textarea>

        <span class="error">
            <?php echo $alamatErr ? "* $alamatErr" : ""; ?>
        </span>

        <br><br>


        <h3>4. Kontak Darurat</h3>

        <label>Nama Kontak Darurat:</label>
        <input type="text" name="nama_kontak" value="<?php echo htmlspecialchars($nama_kontak); ?>">

        <span class="error">
            <?php echo $nama_kontakErr ? "* $nama_kontakErr" : ""; ?>
        </span>

        <br><br>


        <label>Nomor Kontak Darurat:</label>
        <input type="tel" name="nomor_kontak" value="<?php echo htmlspecialchars($nomor_kontak); ?>">

        <span class="error">
            <?php echo $nomor_kontakErr ? "* $nomor_kontakErr" : ""; ?>
        </span>

        <br><br>


        <button type="submit">Simpan</button>

    </form>


</body>

</html>