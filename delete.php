<?php
include 'db.php';
$id = $_GET['id'];
$conn->query("DELETE FROM pirates WHERE pirate_id=$id");
header("Location: index.php");
?>
