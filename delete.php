<?php


include('connection.php');

$id = $_GET['id'];

$stmt = $conn->prepare('DELETE  FROM users WHERE id=:id');

$stmt->execute(array(':id' => $id));

header("Location: index.php");