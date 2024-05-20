<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: ../login.php');
    exit;
}

require '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $clientID = $_GET['id'];
    $sql = "DELETE FROM Client WHERE clientID=$clientID";

    if ($conn->query($sql) === TRUE) {
        header('Location: read.php');
        exit;
    } else {
        $error = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
