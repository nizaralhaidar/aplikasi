<?php
include_once("config.php");

$id = $_GET['id'];

$stmt = mysqli_prepare($mysqli, "DELETE FROM barang WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $id);
$result = mysqli_stmt_execute($stmt);

// Check if deletion was successful
if ($result) {
    header("Location:data.php");
} else {
    echo "Error deleting record: " . mysqli_error($mysqli);
}

mysqli_stmt_close($stmt);
?>