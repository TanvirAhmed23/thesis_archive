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
        <form action="search.php" method="POST">
          <input type="text" name="title" placeholder="Search PDF files...">
          <button type="submit" name="search" class="button"><i class="fa fa-search"></i></button>
        </form>
        <?php
        include("db.php");
        if (isset($_GET['search'])) {
          $searchQuery = $_GET['title'];

          // Perform a search query in your database based on the title
        
          // Example SQL query
          //$sql = "SELECT * FROM storage WHERE title LIKE" .'%'.$searchQuery.'%';
          // $sql = "SELECT * FROM storage WHERE title REGEXP" .'\\b'.$searchQuery.'\\b';
          //$result = mysqli_query($conn, $sql);
          // Execute the query and process the results
          $stmt = $conn->prepare("SELECT * FROM storage WHERE title LIKE :searchTerm");
          $stmt->bindValue(':searchTerm', '%' . $title . '%');
          $stmt->execute();
      
          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        ?>


      </div>
    </section>

    <h1 class="h">Archives</h1>

    <!-- php cinnection -->
    <!-- data show -->
    <section>
      <?php
      include("db.php");
      // Fetch PDF files from database
      $sql = "SELECT * FROM storage";
      $result = mysqli_query($conn, $sql);
      if ($result->num_rows > 0) {
        echo '<div class="pdf-list">';
        while ($row = mysqli_fetch_assoc($result)) {
          $pdf_url = "pdf/" . $row['file'];
          echo '<div class="pdf-card">';
          echo '<div class="pdf-content">';
          $file_path = "pdfs/".$row['file'];
          $fullPath = "http://" . $_SERVER['HTTP_HOST'] . $file_path;
          echo '<p>'.$file_path.'<p>';
          echo '<a href="<?php echo $file_path; ?>" target="_blank" class="pdf-title">' . $row['title'] . '</a>';
          echo '<p class="pdf-author"><b>Author:</b> ' . $row['author'] . '</p>';
          echo '<p class="pdf-description"><b>Abstract:</b> ' . $row['description'] . '</p>';
          // echo '<div class="pdf-download">';
          echo '<a href="pdfs/Books_v4s.pdf" download><i class="fas fa-download"></i></a>';
          echo '</div>';
          echo '</div>';
        }
        echo '</div>';
      } else {
        echo "No PDF files found";
      }

      if (isset($_POST['search'])) {
        $title = $_POST['title'];

        $query = "SELECT * FROM storage where title='$title' ";
        $query_run = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($query_run)) {
          ?>

          <form action="" method="POST">
            <input type="text" name="file" />
          </form>
          <?php
        }
      }


      ?>
    </section>





    <!-- connection end -->

  </main>

  <footer>
    <div class="footer-content">
      <ul class="footer-social-icons">
        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
      </ul>

      <div class="footer-info">
        <span>Contact us: example@example.com</span>
        <br>
        <span>Phone: 01782535335</span>
      </div>
      <div id="map">
        <!-- <i class="fas fa-map-marked-alt"></i> -->
      </div>
    </div>
    <div class="footer-credits">
      &copy; 2023 Thesis Archive. All rights reserved.
    </div>
    <!-- java script -->
    <!-- <script src="script.js"></script> -->
  </footer>


  <script>(g => { var h, a, k, p = "The Google Maps JavaScript API", c = "google", l = "importLibrary", q = "__ib__", m = document, b = window; b = b[c] || (b[c] = {}); var d = b.maps || (b.maps = {}), r = new Set, e = new URLSearchParams, u = () => h || (h = new Promise(async (f, n) => { await (a = m.createElement("script")); e.set("libraries", [...r] + ""); for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]); e.set("callback", c + ".maps." + q); a.src = `https://maps.${c}apis.com/maps/api/js?` + e; d[q] = f; a.onerror = () => h = n(Error(p + " could not load.")); a.nonce = m.querySelector("script[nonce]")?.nonce || ""; m.head.append(a) })); d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n)) })
      ({ key: "AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg", v: "beta" });</script>
</body>

</html>