<?php

session_start();

if (!isset($_SESSION["pasien"])) {
    $_SESSION["pasien"] = [];
}

// UPDATE

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && $_POST["action"] == "update") {

    $id = $_POST["id"];

    $_SESSION["pasien"][$id] = [
        "nama" => $_POST["nama"],
        "nik" => $_POST["nik"],
        "tanggal_lahir" => $_POST["tanggal_lahir"],
        "jenis_kelamin" => $_POST["jenis_kelamin"],
        "nomor_hp" => $_POST["nomor_hp"],
        "nomor_rekam_medis" => $_POST["nomor_rekam_medis"],
        "alamat" => $_POST["alamat"],
        "nama_kontak" => $_POST["nama_kontak"],
        "nomor_kontak" => $_POST["nomor_kontak"]
    ];

    header("Location: tampilan.php");
    exit;
}

// DELETE

if (isset($_GET["hapus"])) {

    $id = $_GET["hapus"];

    if (isset($_SESSION["pasien"][$id])) {
        unset($_SESSION["pasien"][$id]);
        $_SESSION["pasien"] = array_values($_SESSION["pasien"]);
    }

    header("Location: tampilan.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pasien</title>
    <link rel="stylesheet" href="display.css">

</head>

<body>

    <h1>Data Pasien</h1>

    <?php

    if (isset($_GET["edit"])) {
        $id = $_GET["edit"];
        if (isset($_SESSION["pasien"][$id])) {
            $pasien = $_SESSION["pasien"][$id];
    ?>

            <h2>Edit Data Pasien</h2>

            <form method="POST" action="tampilan.php">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <label>Nama Lengkap Pasien:</label>
                <input type="text" name="nama" value="<?php echo htmlspecialchars($pasien["nama"]); ?>">
                <br><br>

                <label>NIK:</label>
                <input type="text" name="nik" value="<?php echo htmlspecialchars($pasien["nik"]); ?>">
                <br><br>

                <label>Tanggal Lahir:</label>
                <input type="text" name="tanggal_lahir" value="<?php echo htmlspecialchars($pasien["tanggal_lahir"]); ?>">
                <br><br>

                <label>Jenis Kelamin:</label>
                <input type="text" name="jenis_kelamin" value="<?php echo htmlspecialchars($pasien["jenis_kelamin"]); ?>">
                <br><br>

                <label>Nomor HP:</label>
                <input type="tel" name="nomor_hp" value="<?php echo htmlspecialchars($pasien["nomor_hp"]); ?>">
                <br><br>

                <label>Nomor Rekam Medis:</label>
                <input type="text" name="nomor_rekam_medis" value="<?php echo htmlspecialchars($pasien["nomor_rekam_medis"]); ?>">
                <br><br>

                <label>Alamat / Domisili:</label>
                <br>

                <textarea name="alamat" rows="4" cols="40"><?php echo htmlspecialchars($pasien["alamat"]); ?></textarea>
                <br><br>

                <label>Nama Kontak Darurat:</label>
                <input type="text" name="nama_kontak" value="<?php echo htmlspecialchars($pasien["nama_kontak"]); ?>">
                <br><br>

                <label>Nomor Kontak Darurat:</label>
                <input type="tel" name="nomor_kontak" value="<?php echo htmlspecialchars($pasien["nomor_kontak"]); ?>">
                <br><br>

                <button type="submit">Simpan Perubahan</button>

                <a href="tampilan.php">Batal</a>

            </form>

    <?php
    }
    } else {
    ?>

        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Nomor HP</th>
                <th>Nomor Rekam Medis</th>
                <th>Alamat</th>
                <th>Kontak Darurat</th>
                <th>Nomor Kontak</th>
                <th>Aksi</th>

            </tr>


            <?php
            $no = 1;
            foreach ($_SESSION["pasien"] as $id => $pasien) {
            ?>

                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($pasien["nama"]); ?></td>
                    <td><?php echo htmlspecialchars($pasien["nik"]); ?></td>
                    <td><?php echo htmlspecialchars($pasien["tanggal_lahir"]); ?></td>
                    <td><?php echo htmlspecialchars($pasien["jenis_kelamin"]); ?></td>
                    <td><?php echo htmlspecialchars($pasien["nomor_hp"]); ?></td>
                    <td><?php echo htmlspecialchars($pasien["nomor_rekam_medis"]); ?></td>
                    <td><?php echo htmlspecialchars($pasien["alamat"]); ?></td>
                    <td><?php echo htmlspecialchars($pasien["nama_kontak"]); ?></td>
                    <td><?php echo htmlspecialchars($pasien["nomor_kontak"]); ?></td>
                    <td>

                        <a href="tampilan.php?edit=<?php echo $id; ?>">
                            <button type="button">Edit</button>
                        </a>

                        <a href="tampilan.php?hapus=<?php echo $id; ?>" onclick="return confirm('Yakin ingin menghapus data ini?');">
                            <button type="button">Hapus</button>
                        </a>

                    </td>

                </tr>

            <?php
            }
            ?>
        </table>


    <?php
    }
    ?>

</body>
</html>