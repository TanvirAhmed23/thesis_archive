<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thesis_archive";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];
    $pdf_name = $_FILES['pdf']['name'];
    $pdf_type = $_FILES['pdf']['type'];
    $pdf_size = $_FILES['pdf']['size'];
    $pdf_temp_loc = $_FILES['pdf']['tmp_name'];
    $pdf_store = "pdf/" . $pdf_name;

    move_uploaded_file($pdf_temp_loc, $pdf_store);

    // Insert data into database
    $sql = "INSERT INTO thesis (title, author, year, pdf) VALUES ('$title', '$author', '$year', '$pdf_name')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload PDF and Fields</title>
    <link rel="stylesheet" href="upload.css">
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" name="title" required><br><br>
        <label for="author">Author:</label>
        <input type="text" name="author" required><br><br>
        <label for="year">Year:</label>
        <input type="text" name="year" required><br><br>
        <label for="pdf">Upload PDF:</label>
        <input type="file" name="pdf" accept=".pdf" required><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
