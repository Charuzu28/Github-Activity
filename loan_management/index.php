<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Loan Management System</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Loan Management System</h1>
    <a href="client/read.php" class="btn btn-primary">Manage Clients</a>
    <a href="loan/read.php" class="btn btn-primary">Manage Loans</a>
    <a href="payment/read.php" class="btn btn-primary">Manage Payments</a>
    <a href="logout.php" class="btn btn-danger">Logout</a>
</div>
</body>
</html>
