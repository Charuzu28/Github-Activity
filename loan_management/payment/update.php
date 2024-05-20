<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: ../login.php');
    exit;
}

require '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $paymentID = $_GET['id'];
    $sql = "SELECT * FROM Payment WHERE paymentID=$paymentID";
    $result = $conn->query($sql);
    $payment = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $paymentID = $_POST['paymentID'];
    $loanID = $_POST['loanID'];
    $clientID = $_POST['clientID'];
    $paymentDate = $_POST['paymentDate'];

    $sql = "UPDATE Payment SET loanID='$loanID', clientID='$clientID', paymentDate='$paymentDate' WHERE paymentID=$paymentID";

    if ($conn->query($sql) === TRUE) {
        header('Location: read.php');
        exit;
    } else {
        $error = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Payment</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h2>Update Payment</h2>
    <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <form method="post" action="update.php">
        <input type="hidden" name="paymentID" value="<?php echo $payment['paymentID']; ?>">
        <div class="form-group">
            <label for="loanID">Loan ID</label>
            <input type="number" name="loanID" class="form-control" value="<?php echo $payment['loanID']; ?>" required>
        </div>
        <div class="form-group">
            <label for="clientID">Client ID</label>
            <input type="number" name="clientID" class="form-control" value="<?php echo $payment['clientID']; ?>" required>
        </div>
        <div class="form-group">
            <label for="paymentDate">Payment Date</label>
            <input type="date" name="paymentDate" class="form-control" value="<?php echo $payment['paymentDate']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>
