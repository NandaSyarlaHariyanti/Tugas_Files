<?php

function insertDataToFile($filename, $data) {
    $file = fopen($filename, 'a');
    if ($file) {
        fwrite($file, $data."\n");
        fclose($file);
        header('Location: berhasil.php');
        exit;
    } else {
        echo "Oops! Data gagal ditambahkan";
    }
}

function uploadFile($filename) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES[$filename]['name']);
    move_uploaded_file($_FILES[$filename]['tmp_name'], $targetFile);
    return $targetFile;
}

if (isset($_POST['submit'])) {
    $kodebuku = $_POST['kodebuku'];
    $judulbuku = $_POST['judulbuku'];
    $pengarang = $_POST['pengarang'];
    $genre = $_POST['genre'];
    $tahunterbit = $_POST['tahunterbit'];
    $jumlahhalaman = $_POST['jumlahhalaman'];
    $penerbit = $_POST['penerbit'];
    $file = uploadFile('file');

    $data = $kodebuku . " - " . $judulbuku. " - " . $pengarang. " - " . $genre. " - " . $tahunterbit. " - " . $jumlahhalaman. " - " . $penerbit . " - " . $file;

    insertDataToFile('buku.txt', $data);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Insert Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h2 {
            text-align: center;
        }

        form {
            width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"]{
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="file"]{
            margin-bottom: 10px;
        }

        input[type="submit"] {
            display: block;
            margin: 0 auto;
            width: 20%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        <h2>Form Insert Data</h2>

        <label for="kodebuku">Kode Buku</label>
        <input type="text" id="kodebuku" name="kodebuku" required><br>
        
        <label for="judulbuku">Judul Buku</label>
        <input type="text" id="judulbuku" name="judulbuku" required><br>

        <label for="pengarang">Pengarang</label>
        <input type="text" id="pengarang" name="pengarang" required><br>
        
        <label for="genre">Genre</label>
        <input type="text" id="genre" name="genre" required><br>
        
        <label for="tahunterbit">Tahun Terbit</label>
        <input type="text" id="tahunterbit" name="tahunterbit" required><br>

        <label for="jumlahhalaman">Jumlah Halaman</label>
        <input type="text" id="jumlahhalaman" name="jumlahhalaman" required><br>

        <label for="penerbit">Penerbit</label>
        <input type="text" id="penerbit" name="penerbit" required><br> <br>

        <label for="file">File</label>
        <input type="file" id="file" name="file" required><br><br>

        <input type="submit" name="submit" value="Insert">
    </form>
</body>
</html>
