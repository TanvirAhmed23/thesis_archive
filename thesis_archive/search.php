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
            echo '<a href="' . $pdf_url . '" target="_blank" class="pdf-title">' . $row['title'] . '</a>';
            echo '<p class="pdf-author">Author: ' . $row['author'] . '</p>';
            echo '<p class="pdf-description">Abstract: ' . $row['description'] . '</p>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo "No PDF files found";
    }
}
//}
?>