<?php
include_once("config.php");

if(isset($_POST['update'])) 
{
    $id =$_POST['id'];
    $name = $_POST['name'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    
    $result = mysqli_query($mysqli, "UPDATE  barang SET name='$name',harga='$harga',stok='$stok' WHERE id=$id");
    header("location:data.php");
}
?>
<?php
$id = $_GET['id'];
$result = mysqli_query($mysqli,"SELECT * FROM barang WHERE id=$id");

while ($user_data = mysqli_fetch_array($result)) 
{
    $name = $user_data['name'];
    $harga = $user_data['harga'];
    $stok = $user_data['stok']; // Perbaikan: Menghapus tanda koma yang tidak perlu
}
?>
<html>
<head>
    <title>Edit barang Data</title>
</head>
<body>
    <a href="data.php">Home</a>
    <br/><br/>
    <form name="update_barang" method="post" action="edit.php">
        <table border="0">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name; ?>"></td> <!-- Perbaikan: Menambahkan tanda kutip dan menghapus n pada $nemail -->
            </tr>
            <tr>
                <td>harga</td>
                <td><input type="text" name="harga" value="<?php echo $harga; ?>"></td> <!-- Perbaikan: Mengganti 'nemail' dengan 'email' -->
            </tr>
            <tr>
                <td>stok</td>
                <td><input type="text" name="stok" value="<?php echo $stok; ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
