<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilkan Data Buku</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .book-image {
        width: 100px;
        height: auto;
        }


        .edit-button {
        background-color: #4CAF50;
        color: white;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        }

        .delete-button {
            background-color: #f44336;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>Tampilkan Data Buku</h2>

    <table>
        <tr>
            <th>Kode Buku</th>
            <th>Judul Buku</th>
            <th>Pengarang</th>
            <th>Genre</th>
            <th>Tahun Terbit</th>
            <th>Jumlah Halaman</th>
            <th>Penerbit</th>
            <th>Cover</th>
            <th>Action</th>
        </tr>

        <?php
        $file = 'buku.txt';
        if (file_exists($file)) {
            $lines = file($file);
            foreach ($lines as $index => $line) {
                $data = explode(" - ", $line);
                echo "<tr>";
                for ($i = 0; $i < count($data); $i++) {
                    if ($i === count($data) - 1) {
                        echo "<td><img src='uploads/" . $data[$i] . "' alt='Book Image' class='book-image'></td>";
                    }
                     else {
                        echo "<td>" . $data[$i] . "</td>";
                    }  
                } 
                echo "<td><a href='update.php?id=$index' class='edit-button'>Edit</a> | <a href='delete.php?id=$index' class='delete-button'>Hapus</a></td>";

                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No data available</td></tr>";
        }
        ?>
    </table>
</body>
</html>
