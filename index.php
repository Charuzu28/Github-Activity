<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information Form</title>
</head>
<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $firstName = $_POST["first_name"];
    $middleName = $_POST["middle_name"];
    $lastName = $_POST["last_name"];
    $age = $_POST["age"];
    $courseAndYear = $_POST["course_and_year"];
    $enrolled = isset($_POST["enrolled"]) ? $_POST["enrolled"] : "No";
    $subject = $_POST["subject"];
    $grade = $_POST["grade"];

    
    echo "<h2>Student Information:</h2>";
    echo "<p><strong>First Name:</strong> $firstName</p>";
    echo "<p><strong>Middle Name:</strong> $middleName</p>";
    echo "<p><strong>Last Name:</strong> $lastName</p>";
    echo "<p><strong>Age:</strong> $age</p>";
    echo "<p><strong>Course and Year:</strong> $courseAndYear</p>";
    echo "<p><strong>Enrolled:</strong> $enrolled</p>";
    echo "<p><strong>Subject:</strong> $subject</p>";
    echo "<p><strong>Grade:</strong> $grade</p>";
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" required><br>

    <label for="middle_name">Middle Name:</label>
    <input type="text" name="middle_name"><br>

    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" required><br>

    <label for="age">Age (Date of Birth or Age):</label>
    <input type="text" name="age" placeholder="e.g., 20 or 2000-01-01" required><br>

    <label for="course_and_year">Course and Year:</label>
    <input type="text" name="course_and_year" required><br>

    <label for="enrolled">Enrolled:</label>
    <input type="radio" name="enrolled" value="Yes"> Yes
    <input type="radio" name="enrolled" value="No" checked> No<br>

    <label for="subject">Subject:</label>
    <input type="text" name="subject" required><br>

    <label for="grade">Grade:</label>
    <input type="text" name="grade" placeholder="e.g., 92.1" required><br>

    <input type="submit" value="Submit">
</form>

</body>
</html>
