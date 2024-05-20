<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: ../login.php');
    exit;
}

require '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $clientID = $_GET['id'];
    $sql = "SELECT * FROM Client WHERE clientID=$clientID";
    $result = $conn->query($sql);
    $client = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $clientID = $_POST['clientID'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $contactNumber = $_POST['contactNumber'];
    $socialMediaLink = $_POST['socialMediaLink'];

    $sql = "UPDATE Client SET name='$name', age=$age, address='$address', contactNumber='$contactNumber', socialMediaLink='$socialMediaLink' WHERE clientID=$clientID";

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
    <title>Update Client</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h2>Update Client</h2>
    <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <form method="post" action="update.php">
        <input type="hidden" name="clientID" value="<?php echo $client['clientID']; ?>">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $client['name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" class="form-control" value="<?php echo $client['age']; ?>" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" value="<?php echo $client['address']; ?>" required>
        </div>
        <div class="form-group">
            <label for="contactNumber">Contact Number</label>
            <input type="text" name="contactNumber" class="form-control" value="<?php echo $client['contactNumber']; ?>" required>
        </div>
        <div class="form-group">
            <label for="socialMediaLink">Social Media Link</label>
            <input type="text" name="socialMediaLink" class="form-control" value="<?php echo $client['socialMediaLink']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>
