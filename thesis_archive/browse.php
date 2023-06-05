<!DOCTYPE html>
<html>

<head>
  <title>Thesis Archive</title>
  <link rel="stylesheet" href="brouse.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

  <script type="module" src="./map.js"></script>
  <script src="drop.js"></script>
</head>

<body>
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
  <main>
    <section class="hero">
      <h1>Browse by Topics</h1>
      <div class="search-container">
        <form method="GET">
          <input type="text" name="title" placeholder="Search PDF files...">
          <button type="submit" class="button"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </section>

    <h1 class="h">Archives</h1>

    <!-- data show -->
    <section>
      <?php
      include("db.php");

      if (isset($_GET['title'])) {
        $title = $_GET['title'];

        // Split the search query into individual words
        $keywords = explode(" ", $title);

        // Construct the SQL query with multiple conditions
        $conditions = [];
        foreach ($keywords as $keyword) {
          $conditions[] = "title LIKE '%$keyword%'";
        }
        $query = "SELECT * FROM storage WHERE " . implode(" OR ", $conditions);
        $result = mysqli_query($conn, $query);

        if ($result->num_rows > 0) {
          echo '<div class="pdf-list">';
          while ($row = mysqli_fetch_assoc($result)) {
            $file_path = "pdfs/" . $row['file'];
            $fullPath = "http://" . $_SERVER['HTTP_HOST'] . $file_path;

            echo '<div class="pdf-card">';
            echo '<div class="pdf-content">';
            echo '<a href="' . $file_path . '" target="_blank" class="pdf-title">' . $row['title'] . '</a>';
            echo '<p class="pdf-author"><b>Author:</b> ' . $row['author'] . '</p>';
            echo '<p class="pdf-dept"><b>Department:</b> ' . $row['dept'] . '</p>';
            echo '<p class="pdf-batch"><b>Batch:</b> ' . $row['batch'] . '</p>';
            echo '<button class="dropdown-btn" onclick="toggleAbstract(this)">Show Abstract</button>';
            echo '<p class="pdf-description abstract" style="display: none;"><b>Abstract:</b> ' . $row['description'] . '</p>';
            echo '<a href="' . $file_path . '" download="' . $row['title'] . '.pdf" style="display: block; margin-top: 10px;"><i class="fas fa-download"></i> click here to download</a>';
            echo '</div>';
            echo '</div>';
          }
          echo '</div>';
        } else {
          echo "No PDF files found";
        }
      } else {
        // Fetch all PDF files from the database
        $sql = "SELECT * FROM storage";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
          echo '<div class="pdf-list">';
          while ($row = mysqli_fetch_assoc($result)) {
            $file_path = "pdfs/" . $row['file'];
            $fullPath = "http://" . $_SERVER['HTTP_HOST'] . $file_path;

            echo '<div class="pdf-card">';
            echo '<div class="pdf-content">';
            echo '<a href="' . $file_path . '" target="_blank" class="pdf-title">' . $row['title'] . '</a>';
            echo '<p class="pdf-author"><b>Author:</b> ' . $row['author'] . '</p>';
            echo '<p class="pdf-dept"><b>Department:</b> ' . $row['dept'] . '</p>';
            echo '<p class="pdf-batch"><b>Batch:</b> ' . $row['batch'] . '</p>';
            echo '<button class="dropdown-btn" onclick="toggleAbstract(this)">Show Abstract</button>';
            echo '<p class="pdf-description abstract" style="display: none;"><b>Abstract:</b> ' . $row['description'] . '</p>';
            echo '<a href="' . $file_path . '" download="' . $row['title'] . '.pdf" style="display: block; margin-top: 10px;"><i class="fas fa-download"></i> click here to download</a>';
            echo '</div>';
            echo '</div>';
          }
          echo '</div>';
        } else {
          echo "No PDF files found";
        }
      }
      ?>
    </section>
  </main>
  <script>
    function toggleAbstract(btn) {
      var abstract = btn.nextElementSibling;
      abstract.style.display = abstract.style.display === "none" ? "block" : "none";
      btn.innerText = abstract.style.display === "none" ? "Show Abstract" : "Hide Abstract";
    }
  </script>
</body>

</html>
