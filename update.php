<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Buku</title>
</head>
<body>
    <h2>Update Data Buku</h2>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $file = 'buku.txt';
            if (file_exists($file)) {
                $lines = file($file);
                if (isset($lines[$id])) {
                    $data = explode(" - ", $lines[$id]);
                } else {
                    echo "Invalid ID";
                    exit;
                }
            } else {
                echo "File tidak tersedia";
                exit;
            }
        } else {
            echo "No ID provided";
            exit;
        }
    } else {
        echo "Invalid request method";
        exit;
    }

    if (isset($_GET['success'])) {
        $success = $_GET['success'];
        if ($success === 'true') {
        }
    }
    ?>

    <form action="update_process.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
        <label for="kode_buku">Kode Buku:</label>
        <input type="text" id="kode_buku" name="kode_buku" value="<?php echo $data[0]; ?>" required><br><br>

        <label for="judul_buku">Judul Buku:</label>
        <input type="text" id="judul_buku" name="judul_buku" value="<?php echo $data[1]; ?>" required><br><br>

        <label for="pengarang">Pengarang:</label>
        <input type="text" id="pengarang" name="pengarang" value="<?php echo $data[2]; ?>" required><br><br>

        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre" value="<?php echo $data[3]; ?>" required><br><br>

        <label for="tahun_terbit">Tahun Terbit:</label>
        <input type="text" id="tahun_terbit" name="tahun_terbit" value="<?php echo $data[4]; ?>" required><br><br>

        <label for="jumlah_halaman">Jumlah Halaman:</label>
        <input type="text" id="jumlah_halaman" name="jumlah_halaman" value="<?php echo $data[5]; ?>" required><br><br>

        <label for="penerbit">Penerbit:</label>
        <input type="text" id="penerbit" name="penerbit" value="<?php echo $data[6]; ?>" required><br><br>

        <label for="cover">Cover:</label>
        <input type="file" id="cover" name="cover"><br><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
