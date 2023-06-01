<!DOCTYPE html>
<html>

<head>
  <title>Thesis Archive</title>
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="browse.php">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>


  <script type="module" src="./map.js"></script>
</head>

<body>
  <header>
    <nav>
      <ul>
        <li class="active"><a href="#">Home</a></li>
        <li><a href="browse.php">Browse</a></li>
        <li><a href="upload.php">Upload</a></li>
        <li><a href="#">About</a></li>

      </ul>
    </nav>
  </header>
  <main>
    <section class="hero">
      <h1>Welcome to the Thesis Archive</h1>
      <p>Explore our collection of high-quality thesis papers from top universities around the world.</p>
      <div>
        <a href="browse.php" class="button">Get Started</a>
      </div>
    </section>
    <section class="features">

      <div class="feature">
        <img src="images/book.jpg" alt="Feature 1">
        <h2>Browse by Topic</h2>
        <p>Find theses on a wide range of topics, from science and engineering to social sciences and humanities.</p>
        <a href="#" class=button>Click Here</a>
      </div>


      <div class="feature">
        <img src="images/up1.jpg" alt="Feature 2">
        <h2>Easy Upload</h2>
        <p>Upload your thesis paper in just a few clicks, and make it accessible to researchers and students worldwide.
        </p>
        <a href="#" class=button>Click Here</a>
      </div>

      <div class="feature">
        <img src="images/grey-world-map_1053-431 (1).avif" alt="Feature 3">
        <h2>Global Access</h2>
        <p>Gain visibility and recognition for your research by making it accessible to a global audience of scholars
          and students.</p>
        <a href="#" class=button>Click Here</a>
      </div>
    </section>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY" defer></script> -->


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