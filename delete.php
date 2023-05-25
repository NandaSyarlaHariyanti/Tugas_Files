<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $file = 'buku.txt';
        if (file_exists($file)) {
            $lines = file($file);
            if (isset($lines[$id])) {
                unset($lines[$id]);
                file_put_contents($file, implode("", $lines));
                echo "Data buku berhasil dihapus.";
            } else {
                echo "Invalid ID";
            }
        } else {
            echo "File does not exist";
        }
    } else {
        echo "No ID provided";
    }
} else {
    echo "Invalid request method";
}
?>
