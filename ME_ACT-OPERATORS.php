<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Concatenation Checker</title>
</head>
<body>

<?php
   
    $output = '';
    
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       
        $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
        $lname = isset($_POST['lname']) ? $_POST['lname'] : '';

       
        $conStr = $fname . $lname;

        
        if (strlen($conStr) > 10) {
            $output = 'It is greater than 10 characters.';
        } else {
            $output = 'It is not greater than 10 characters.';
        }
    }
?>

<form method="post" action="">
    <label for="fname">Enter String 1:</label>
    <input type="text" name="fname" required><br>

    <label for="lname">Enter String 2:</label>
    <input type="text" name="lname" required><br>

    <button type="submit">Concatenate Strings</button>
</form>

<?php
    if ($output) {
        echo '<p>' . $output . '</p>';
    }
?>

</body>
</html>