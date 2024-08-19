<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eren_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// Requête pour obtenir les produits
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Vérifier si des produits ont été trouvés
$products = [];
if ($result->num_rows > 0) {
  // Récupérer les données des produits
  while ($row = $result->fetch_assoc()) {
    $products[] = $row;
  }
}

// Fetch testimonials from the database
$sql = "SELECT name, job, img, text FROM testinomial";
$result = $conn->query($sql);

$testinomials = [];
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $testinomials[] = $row;
  }
}


// Fetch blog posts from the database
$sql = "SELECT title, DATE_FORMAT(date, '%d') AS day, DATE_FORMAT(date, '%M') AS month, image_url, description, link FROM blog_posts LIMIT 2";
$result = $conn->query($sql);

$blog_posts = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $blog_posts[] = $row;
    }
}


// Handle form submission
$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Validate email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO newsletter_subscriptions (email) VALUES (?)");
        $stmt->bind_param("s", $email);

        // Execute the statement
        if ($stmt->execute()) {
            $message = "Thank you for subscribing!";
        } else {
            $message = "There was an error. Please try again.";
        }

        $stmt->close();
    } else {
        $message = "Please enter a valid email address.";
    }
}


// Fetch logos from the database
$sql = "SELECT image_path FROM logos";
$result = $conn->query($sql);

// Initialize an array to store logo paths
$logos = [];

// Store fetched logo paths in the array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $logos[] = $row['image_path'];
    }
}




$sql = "SELECT * FROM sliders";
$result = $conn->query($sql);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eren</title>
  <link rel="shortcut icon" href="img/favicon.png">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="owlcarousel/assets/owl.theme.default.min.css">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
</head>

<body>
  <?php include 'header.php'; ?>
  <!--New Arrival-->


  <section class="mt-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="owl-carousel-autoplay owl-theme pb-3">
            <?php
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo '<div class="item slider-item" style="background-image: url(\'' . $row["background"] . '\');">';
                echo '<div class="slider-content col-6 pt-5 mt-5 ps-5 ms-3 text-start">';
                echo '<h5 class="">' . $row["name"] . '</h5>';
                echo '<h1 class="fw-bolderr pb-2">' . $row["name"] . '</h1>';
                echo '<p class="pt-3 pb-4 ">' . $row["description"] . '</p>';
                echo '<button class="btn btn-link-black px-4 py-2 ">Shop Now</button>';
                echo '</div>';
                echo '<div class="col-6">';
                echo '<img src="' . $row["img"] . '" alt="img" class="img-fluid">';
                echo '</div>';
                echo '</div>';
              }
            } else {
              echo "0 results";
            }
            $conn->close();
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!--hurry up-->

  <section class="mt-5">
    <div class="container px-3 position-relative">
      <div class="row m-5 position-relative">
        <div class="col-md-12 text-center position-relative border border-black shadow-sm rounded">
          <p class=" fw-bold mb-0 p-2 py-5 ">FREE UK DELIVERY + RETURN OVER £75.00 (EXCLUDING HOMEWARE)| FREE UK COLLECT
            FROM STORE</p>
          <a href="#" class="">
            <div class=" fixed-btn-hurry">
              <div class="tag-btn-hurry">
                <span class="texte-center text-uppercase">Hurry Up!</span>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>



  <section class="mt-5">
    <div class="container-fluid">
      <div class="row d-flex">
        <div class="col-md-6 position-relative mb-2">
          <img src="./img/arrival-main.jpg" alt="" class="img-fluid h-100 d-block">
          <div class="text-img ">
            <h3 class="h3-line-height">NEW ARRIVALS</h3>
            <h1 class="fw-bold h3-line-height">LOOKBOOK</h1>
            <h3 class="h3-line-height pb-4">CUSTOM FURNITURE DESIGN</h3>
            <a href="#" class=""><button class="btn btn-link  w-50 py-3 ">Shop Now</button></a>
          </div>
        </div>

        <div class="col-md-6">
          <div class="row text-center">
            <?php
            // Check if products are available
            if (!empty($products)) {
              // Set the number of elements to display
              $displayCount = 6;

              // Loop through the products and display the required number of elements
              for ($i = 0; $i < $displayCount; $i++) {
                // Get the current product by using modulus to loop back when reaching the end
                $product = $products[$i % count($products)];
            ?>
                <div class="col-md-4 col-sm-6 position-relative pb-3">
                  <a href="#" class="">
                    <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="img-fluid w-100">
                  </a>
                  <div class="d-flex position-relative">
                    <p class="mb-0"><?php echo htmlspecialchars($product['name']); ?></p>
                    <a href="#"><i class="bi bi-handbag-fill position-absolute" style="right:0px"></i></a>
                  </div>
                  <span class="text-primary">$<?php echo number_format($product['price'], 2); ?></span>
                </div>
            <?php
              }
            } else {
              echo "<p>No products found.</p>";
            }
            ?>

          </div>
        </div>


      </div>
    </div>
  </section>


  <!--Parallax-->
  <section id="parallax" class="my-5 mx-3">
    <div class="container">
      <div class="row py-5">
        <div class="col-md-6 text-center py-5">
          <h1 class="text-uppercase fw-light" style="font-size: 60px;">creative design</h1>
          <h2 class="text-uppercase"><strong style="font-size: 43px;">lighting furniture</strong></h2>
          <h3 class="fw-lighterr pb-4">Typi non habent claritatem insitam.</h3>
          <a href="#" class="pt-3"><button class="btn btn-link-black py-2 text-uppercase px-5">View
              Collection</button></a>
        </div>
      </div>
    </div>
  </section>



  <!--FEATURES PRODUCTS-->

  <section class="mt-5">
    <div class="text-center mb-5">
      <h2 class="fw-bold" style="font-family: 'Oswald', sans-serif;    font-size: 24px;">FEATURES PRODUCTS</h2>
      <p class="fst-italic">Claritas est etiam processus dynamicus, qui sequitur.</p>
    </div>
    <div class="container-fluid ">
      <div class="row text-center">
        <?php
        // Check if products are available
        if (!empty($products)) {
          // Set the number of elements to display
          $displayCount = 6;

          // Loop through the products and display the required number of elements
          for ($i = 0; $i < $displayCount; $i++) {
            // Get the current product by using modulus to loop back when reaching the end
            $product = $products[$i % count($products)];
        ?>
            <div class="col-md-2 col-sm-6 position-relative pb-3">
              <a href="#" class="">
                <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="img-fluid w-100">
              </a>
              <div class="d-flex position-relative">
                <p class="mb-0"><?php echo htmlspecialchars($product['name']); ?></p>
                <a href="#"><i class="bi bi-handbag-fill position-absolute" style="right:0px"></i></a>
              </div>
              <span class="text-primary">$<?php echo number_format($product['price'], 2); ?></span>
            </div>
        <?php
          }
        } else {
          echo "<p>No products found.</p>";
        }
        ?>
      </div>
    </div>
  </section>


  <section id="testinomial" class="my-5 mx-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="owl-carousel owl-theme pb-3">
            <?php
            // Loop through each testimonial and display it dynamically
            foreach ($testinomials as $testimonial) {
              echo '
                        <div class="text-center carousel-item">
                            <img src="' . $testimonial["img"] . '" alt="" class="rounded-circle img-fluid mt-5 mb-3">
                            <h6 class="mb-2 text-uppercase">' . $testimonial["name"] . '</h6>
                            <span class="text-primary pb-3 text-uppercase">' . $testimonial["job"] . '</span>
                            <p class="my-4" style="font-family: \'Lato\', sans-serif; font-style: oblique;">' . $testimonial["text"] . '</p>
                        </div>';
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!--Blog-->

  <section class="my-5 pb-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-uppercase" style="font-family: 'Oswald', sans-serif; font-size: 24px;">from our blog</h2>
        <p class="fst-italic">Claritas est etiam processus dynamicus, qui sequitur.</p>
    </div>
    <div class="container">
        <div class="row">
            <?php
            // Loop through the blog posts and display them
            foreach ($blog_posts as $post) {
                echo '
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body row d-flex">
                            <div class="col-6 p-0">
                                <a href="' . $post["link"] . '"><img src="' . $post["image_url"] . '" alt="" class="img-fluid w-100 d-block"></a>
                            </div>
                            <div class="col-6 ps-3 d-flex flex-column justify-content-center">
                                <h2 class="card-title fw-bolderr py-3">' . $post["day"] . '<span class="text-primary fs-5">/ ' . strtoupper($post["month"]) . '</span></h2>
                                <a href="' . $post["link"] . '" class="card-text text-uppercase h5">' . $post["title"] . '<br> <span class="text-primary fw-bolderr">_____</span> </a>
                                <p class="card-text fw-light py-4">' . $post["description"] . '</p>
                                <a href="' . $post["link"] . '" class="card-text fw-bold text-uppercase">read more <i class="bi bi-chevron-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
</section>




  <!--brands-->

  <section class="m-5 p-4 shadow-sm rounded">
    <div class="container-fluid px-5 ">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel-resp owl-theme">
                    <?php if (!empty($logos)): ?>
                        <?php foreach ($logos as $logo): ?>
                            <div class="item">
                                <img src="<?php echo htmlspecialchars($logo); ?>" alt="">
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No logos found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

  <!--Newsletter-->

  <section id="newsletter" class="m-5 mx-3 text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 py-4">
                <h2 class="text-uppercase pt-5">Sign Up to Newsletter</h2>
                <p class="pb-5">Subscribe to the Eren mailing list to receive updates on new arrivals,<br> special offers and other discount information.</p>

                <!-- Display the message if present -->
                <?php if (!empty($message)): ?>
                    <div class="alert alert-info"><?php echo $message; ?></div>
                <?php endif; ?>

                <!-- Newsletter sign-up form -->
                <form action="" method="POST">
                    <div class="input-group mb-5">
                        <input type="text" name="email" class="form-control" placeholder="Subscribe to our newsletter..." required>
                        <button class="btn-custom" type="submit"><span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                            <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z" />
                        </svg></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>



  <!--cards-->



  <section class="my-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4 pb-3">
          <div class=" card-link card-custom text-center py-3">
            <div class="card-body">
              <i class="bi bi-headphones fs-1"></i>
            </div>
            <h5 class="card-title">Free Shipping WorldWild</h5>
            <p class="card-text pb-3">free shipping worldwild</p>
          </div>
        </div>
        <div class="col-md-4 pb-3">
          <div class=" card-link card-custom text-center py-3">
            <div class="card-body">
              <i class="bi bi-headphones fs-1"></i>
            </div>
            <h5 class="card-title">Free Shipping WorldWild</h5>
            <p class="card-text pb-3">free shipping worldwild</p>
          </div>
        </div>
        <div class="col-md-4 pb-3">
          <div class=" card-link card-custom text-center py-3">
            <div class="card-body">
              <i class="bi bi-headphones fs-1"></i>
            </div>
            <h5 class="card-title">Free Shipping WorldWild</h5>
            <p class="card-text pb-3">free shipping worldwild</p>
          </div>
        </div>
      </div>
    </div>
  </section>



  <?php include 'footer.php'; ?>

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="owlcarousel/owl.carousel.min.js"></script>
  <script>
    $(document).ready(function() {
      $(".owl-carousel").owlCarousel();
    });
    $('.owl-carousel').owlCarousel({
      margin: 10,
      loop: true,
      autoWidth: false,
      items: 1,
      nav: false,
    })
  </script>


  <script>
    $(document).ready(function() {
      $(".owl-carousel-autoplay").owlCarousel();
    });
    var owl = $('.owl-carousel-autoplay');
    owl.owlCarousel({
      items: 1,
      loop: true,
      margin: 0,
      autoWidth: false,
      autoplay: true,
      autoplayTimeout: 2000,
      autoplayHoverPause: true,
      nav: true,
      dots: false,
      navText: [
        '<span aria-label="Previous"><i class="bi bi-chevron-left"></i></span>',
        '<span aria-label="Next"><i class="bi bi-chevron-right"></i></span>'
      ],
    });

    function setEqualHeight() {
      var maxHeight = 0;
      $('.owl-carousel-autoplay .item').each(function() {
        var thisHeight = $(this).height();
        if (thisHeight > maxHeight) {
          maxHeight = thisHeight;
        }
      });
      $('.owl-carousel-autoplay .item').height(maxHeight);
    }

    setEqualHeight();

    $(window).resize(function() {
      setEqualHeight();
    });
  </script>

  <script>
    $('.owl-carousel-resp').owlCarousel({
      loop: true,
      margin: 10,
      responsiveClass: true,
      nav: false,
      dots: false,
      autoplay: true,
      autoplayTimeout: 3000,
      autoWidth: false,
      responsive: {
        0: {
          items: 1,
        },
        700: {
          items: 3
        },
        1200: {
          items: 5,
        }
      }
    })
  </script>
</body>

</html>