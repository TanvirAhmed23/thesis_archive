<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="upload.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="browse.php">Browse</a></li>
                <li class="active"><a href="upload.php">Upload</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </nav>
    </header>
    <?php
    include("db.php");
    // Fetch PDF files from database
    $sql = "SELECT * FROM storage";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $pdf_url = "pdf/" . $row['file'];
            echo "<a href='$pdf_url' target='_blank'>" . $row['title'] . "</a><br>";
            echo "Author: " . $row['author'] . "<br>";
            echo "Year: " . $row['description'] . "<br><br>";
        }
    } else {
        echo "No PDF files found";
    }

    $conn->close();
    ?>

    <footer class="sticky-footer">
        <p>&copy; 2023 Thesis Archive. All rights reserved.</p>
    </footer>
</body>

</html>