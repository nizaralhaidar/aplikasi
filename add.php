<!DOCTYPE html>
<html>
<head>
    <title>Add Barang</title>
</head>
<body>
    <a href="data.php">Go to Home</a>
    <br/><br/>
    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga"></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td><input type="text" name="stok"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="ADD"></td>
            </tr>
        </table>
    </form>
    <?php
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        include_once("config.php");
        $result = mysqli_query($mysqli, "INSERT INTO barang (name,harga,stok) VALUES('$name','$harga','$stok')");
        echo "Barang added successfully. <a href='data.php'>View Users</a>";
    }
    ?>
</body>
</html>
