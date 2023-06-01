<!-- database trial 1 -->
<?php
include("db.php");
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['description'];
    $pdf_name = $_FILES['file']['name'];
    $pdf_type = $_FILES['file']['type'];
    $pdf_size = $_FILES['file']['size'];
    $pdf_temp_loc = $_FILES['file']['tmp_name'];
    $pdf_store = "pdf/" . $pdf_name;

    $sql = "INSERT INTO storage (file,title, author, description) VALUES ('$pdf_name','$title', '$author', '$year')";
    $result = mysqli_query($conn, $sql);

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="upload.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>


    <script type="module" src="./map.js"></script>
</head>
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
    <main style="padding= 0 10px">
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <h2>Upload your thesis paper in PDF format</h2>

            <div class="form-row">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title">
            </div>
            <div class="form-row">
                <label for="author">Author:</label>
                <input type="text" name="author" id="author">
            </div>
            <div class="form-row">
                <label for="description">Abstract:</label>
                <textarea name="description" id="description" class="tex"></textarea>
            </div>
            <div>
                <input type="file" name="file" id="file">
            </div>
            <div>
                <button type="submit" name="submit">Upload</button>
            </div>
        </form>
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