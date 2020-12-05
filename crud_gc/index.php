<?php
include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

?>
<!DOCTYPE html>
<html>

<head>
    <title>CRUD Produk dengan gambar - Gilacoding</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <style type="text/css">
        * {
            font-family: "Trebuchet MS";
        }

        h1 {
            text-transform: uppercase;
            color: salmon;
        }

        table {
            border: solid 1px #DDEEEE;
            border-collapse: collapse;
            border-spacing: 0;
            width: 70%;
            margin: 10px auto 10px auto;
        }

        table thead th {
            background-color: #DDEFEF;
            border: solid 1px #DDEEEE;
            color: #336B6B;
            padding: 10px;
            text-align: left;
            text-shadow: 1px 1px 1px #fff;
            text-decoration: none;
        }

        table tbody td {
            border: solid 1px #DDEEEE;
            color: #333;
            padding: 10px;
            text-shadow: 1px 1px 1px #fff;
        }

        a {
            background-color: salmon;
            color: #fff;
            padding: 10px;
            text-decoration: none;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <center>
        <h1>Data Produk</h1>
        <center>
            <center><a href="tambah_produk.php">+ &nbsp; Tambah Produk</a>
                <center>
                    <br />


                    <div class="container>">
                        <div class="row">
                            <?php
                            // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
                            $query = "SELECT * FROM produk ORDER BY id ASC";
                            $result = mysqli_query($koneksi, $query);
                            //mengecek apakah ada error ketika menjalankan query
                            if (!$result) {
                                die("Query Error: " . mysqli_errno($koneksi) .
                                    " - " . mysqli_error($koneksi));
                            }
                            $no = 1; //variabel untuk membuat nomor urut
                            // hasil query akan disimpan dalam variabel $data dalam bentuk array
                            // kemudian dicetak dengan perulangan while
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>

                                <div class="col-sm-4">
                                    <img src="gambar/<?php echo $row['gambar_produk']; ?>" style="width: 120px; height: 120px;">
                                    <br />
                                    <?php echo $row['nama_produk']; ?>
                                    <br />
                                    Rp <?php echo number_format($row['harga_beli'], 0, ',', '.'); ?>
                                    <br />
                                    <?php echo $row['id_dist']; ?>
                                    <br />
                                    <a href="detail.php?id=<?php echo $row['id']; ?>">Detail</a> |
                                    <a href="edit_produk.php?id=<?php echo $row['id']; ?>">Edit</a> |
                                    <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                                    <br />
                                    <br />

                                </div>


                            <?php
                                $no++;
                            }
                            ?>
                        </div>

                    </div>


</body>

</html>