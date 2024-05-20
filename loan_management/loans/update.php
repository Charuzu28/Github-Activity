<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: ../login.php');
    exit;
}

require '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $loanID = $_GET['id'];
    $sql = "SELECT * FROM Loan WHERE loanID=$loanID";
    $result = $conn->query($sql);
    $loan = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $loanID = $_POST['loanID'];
    $clientID = $_POST['clientID'];
    $amount = $_POST['amount'];
    $interestRate = $_POST['interestRate'];
    $total = $_POST['total'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    $sql = "UPDATE Loan SET clientID='$clientID', amount='$amount', interestRate='$interestRate', total='$total', startDate='$startDate', endDate='$endDate' WHERE loanID=$loanID";

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
    <title>Update Loan</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h2>Update Loan</h2>
    <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <form method="post" action="update.php">
        <input type="hidden" name="loanID" value="<?php echo $loan['loanID']; ?>">
        <div class="form-group">
            <label for="clientID">Client ID</label>
            <input type="number" name="clientID" class="form-control" value="<?php echo $loan['clientID']; ?>" required>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" class="form-control" value="<?php echo $loan['amount']; ?>" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="interestRate">Interest Rate</label>
            <input type="number" name="interestRate" class="form-control" value="<?php echo $loan['interestRate']; ?>" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="total">Total</label>
            <input type="number" name="total" class="form-control" value="<?php echo $loan['total']; ?>" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="startDate">Start Date</label>
            <input type="date" name="startDate" class="form-control" value="<?php echo $loan['startDate']; ?>" required>
        </div>
        <div class="form-group">
            <label for="endDate">End Date</label>
            <input type="date" name="endDate" class="form-control" value="<?php echo $loan['endDate']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>
