<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $kodeBuku = $_POST['kode_buku'];
        $judulBuku = $_POST['judul_buku'];
        $pengarang = $_POST['pengarang'];
        $genre = $_POST['genre'];
        $tahunTerbit = $_POST['tahun_terbit'];
        $jumlahHalaman = $_POST['jumlah_halaman'];
        $penerbit = $_POST['penerbit'];

        $dataBuku = $kodeBuku . " - " . $judulBuku . " - " . $pengarang . " - " . $genre . " - " . $tahunTerbit . " - " . $jumlahHalaman . " - " . $penerbit;

        $file = 'buku.txt';
        if (file_exists($file)) {
            $lines = file($file);
            if (isset($lines[$id])) {
                $lines[$id] = rtrim($dataBuku, "\r\n") . PHP_EOL;
                file_put_contents($file, implode("", $lines));
                echo "Update berhasil!";
            } else {
                echo "Invalid ID";
            }
        } else {
            echo "File does not exist";
        }

        if ($_FILES['cover']['error'] === UPLOAD_ERR_OK) {
            $coverName = $_FILES['cover']['name'];
            $coverTmpName = $_FILES['cover']['tmp_name'];
            $coverSize = $_FILES['cover']['size'];
            $coverType = $_FILES['cover']['type'];

            $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            if (in_array($coverType, $allowedTypes)) {
                $uploadDirectory = 'uploads/';
                $coverPath = $uploadDirectory . $coverName;

                if (move_uploaded_file($coverTmpName, $coverPath)) {
                    $lines[$id] = rtrim($dataBuku, "\r\n") . " - " . $coverName . PHP_EOL;
                    file_put_contents($file, implode("", $lines));
                    echo "Foto sudah terupload!";
                } else {
                    echo "Gagal!";
                }
            } else {
                echo "Tipe file yang kamu masukkan salah! Hanya bisa jpg, jpeg, dan png!";
            }
        }
    } else {
        echo "No ID provided";
    }
} else {
    echo "Invalid request method";
}
?>
