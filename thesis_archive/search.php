<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="brouse.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script type="module" src="./map.js"></script>
    <script src="drop.js"></script>

</head>
<header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li class="active"><a href="#">Browse</a></li>
            <li><a href="upload.php">Upload</a></li>
            <li><a href="#">About</a></li>
        </ul>
    </nav>
</header>

<body>
<main>
<?php
//if (isset($_POST['title'])) {
//$textFieldValue = $_POST['title'];
//echo "The value of the text field is: " . $title;


include("db.php");
if (isset($_POST['title'])) {
    $searchQuery = $_POST['title'];

    // Perform a search query in your database based on the title

    // Example SQL query
    $sql = "SELECT * FROM storage WHERE title LIKE '%$searchQuery'";

    $result = mysqli_query($conn, $sql);
    // Execute the query and process the results

    // Display the search results
    if ($result->num_rows > 0) {
        echo '<div class="pdf-list">';
        while ($row = mysqli_fetch_assoc($result)) {
          $pdf_url = "pdf/" . $row['file'];
          echo '<div class="pdf-card">';
          echo '<div class="pdf-content">';
          $file_path = "pdfs/" . $row['file'];
          $fullPath = "http://" . $_SERVER['HTTP_HOST'] . $file_path;
          echo '<p>' . $file_path . '<p>';
          echo '<a href="<?php echo $file_path; ?>" target="_blank" class="pdf-title">' . $row['title'] . '</a>';
          echo '<p class="pdf-author"><b>Author:</b> ' . $row['author'] . '</p>';
          // echo '<p class="pdf-description"><b>Abstract:</b> ' . $row['description'] . '</p>';
          echo '<p class="pdf-dept"><b>Department:</b> ' . $row['dept'] . '</p>';
          echo '<p class="pdf-batch"><b>Batch:</b> ' . $row['batch'] . '</p>';
          echo '<button class="dropdown-btn" onclick="toggleAbstract(this)">Show Abstract</button>';
          echo '<p class="pdf-description abstract" style="display: none;"><b>Abstract:</b> ' . $row['description'] . '</p>';
          // echo '<div class="pdf-download">';
      
          echo "\n";
          echo '<a href="pdfs/Books_v4s.pdf" download><i class="fas fa-download"> click here to download</i></a>';
          echo '</div>';
          echo '</div>';
        }

        echo '</div>';
      } else {
        echo "No PDF files found";
      }

}
?>
</main>
</body>

</html>