<?php
include '../../db/connection.php';

$id = $_GET['id'];

$query = mysqli_query($conn, "DELETE FROM products WHERE id=$id");
header("Location:../index.php");

?>