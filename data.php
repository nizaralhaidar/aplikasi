<?php

include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM barang ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
    
</head>
<body>
    <a href="add.php">ADD New Barang><br><br>
    <table width='80%' border=1>
        <tr>
            <th>Name</th><th>Harga</th><th>Stok</th><th>Update</th>
        </tr>
        <?php
        class User {
            private $nama;
            private $harga;
            private $stok;
        
            // Constructor
            public function __construct($nama, $harga , $stok) {
                $this->setNama($nama);
                $this->setHarga($harga);
                $this->setStok($stok);
            }
        
            // Getter and Setter for Username
            public function getNama() {
                return $this->nama;
            }
        
            public function setNama($nama) {
                $this->nama = $nama;
            }

            // Getter and Setter for Password
            public function getHarga() {
                return $this->harga;
            }
        
            public function setHarga($harga) {
                $this->harga = $harga;
            }

            public function getStok() {
                return $this->stok;
            }
        
            public function setStok($stok) {
                $this->stok = $stok;
            }
        
        
            public function notification() {
                echo "nama: " . $this->getNama() . "</br>\n";
                echo "harga: " . $this->getHarga() . "</br>\n";
                echo "stok: " . $this->getStok() . "</br>\n";
                echo "User created by User </br>\n";
            }
        }
        
        class Barang extends User {
            private $role = "barang";
        
            // Constructor
            public function __construct($nama, $harga , $stok) {
                parent::__construct($nama, $harga, $stok);
            }
        
            public function notification() {
                echo "nama: " . $this->getNama() . "</br>\n";
                echo "harga: " . $this->getHarga() . "</br>\n";
                echo "stok: " . $this->getStok() . "</br>\n";
                echo "User created by " . $this->role . "\n";

        // Simpan data ke database
        global $mysqli;
        $nama = $this->getNama();
        $harga = $this->getHarga();
        $stok = $this->getStok();

        $query = "INSERT INTO barang (name, harga, stok) VALUES ('$nama', '$harga', '$stok')";
        mysqli_query($mysqli, $query);
            }
        }
        
        while ($barang_data = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>".$barang_data['name']."</td>";
            echo "<td>".$barang_data['harga']."</td>";
            echo "<td>".$barang_data['stok']."</td>";
            echo "<td><a href='edit.php?id=".$barang_data['id']."'>Edit</a> | <a href='delete.php?id=".$barang_data['id']."'>Delete</a></td></tr>";
        }
        ?>
    </table>
</body>
</html>
