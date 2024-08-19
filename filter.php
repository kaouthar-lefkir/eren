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

// Fetch categories and their subcategories
$categories_query = "SELECT c.id AS category_id, c.name AS category_name, s.name AS subcategory_name 
                     FROM categories c 
                     LEFT JOIN subcategories s ON c.id = s.category_id";
$categories_result = $conn->query($categories_query);

$categories = [];
if ($categories_result->num_rows > 0) {
  while ($row = $categories_result->fetch_assoc()) {
    $categories[$row['category_name']][] = $row['subcategory_name'];
  }
}

// Fetch brands
$brands_query = "SELECT name FROM brands";
$brands_result = $conn->query($brands_query);

$brands = [];
if ($brands_result->num_rows > 0) {
  while ($row = $brands_result->fetch_assoc()) {
    $brands[] = $row['name'];
  }
}

// Fetch colors
$colors_query = "SELECT name FROM colors";
$colors_result = $conn->query($colors_query);

$colors = [];
if ($colors_result->num_rows > 0) {
  while ($row = $colors_result->fetch_assoc()) {
    $colors[] = $row['name'];
  }
}


// Fetch Sizes 


$sizes_query = "SELECT name FROM size";
$sizes_result = $conn->query($sizes_query);

$sizes = [];
if ($sizes_result->num_rows > 0) {
  while ($row = $sizes_result->fetch_assoc()) {
    $sizes[] = $row['name'];
  }
}

// Fermer la connexion
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eren | Products</title>
  <link rel="shortcut icon" href="img/favicon.png">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="owlcarousel/assets/owl.theme.default.min.css">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
</head>

<body>

  <?php include 'header.php'; ?>



  <section class="my-5 pt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <a href="index.html" class="d-inline-block">Home</a>
          <span> / </span>
          <a href="#" class="navactive d-inline-block">Products</a>
          <hr class="mt-2" />
        </div>
      </div>
    </div>
  </section>

  <section class="my-5 ">
    <div class="container">
      <div class="row d-flex">
        <div class="col-md-3 col-sm-3 mb-2 pe-2">
          <div class="pb-4">
            <h3 class="text-uppercase fw-bold fs-5 mb-4" style="font-family: 'Oswald', sans-serif;">Categories <br>___</h3>
            <div class="accordion" id="accordionExample">
              <?php foreach ($categories as $category_name => $subcategories) : ?>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button pb-2 text-uppercase fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $category_name ?>" aria-expanded="true" aria-controls="collapse<?= $category_name ?>">
                      <?= $category_name ?>
                    </button>
                  </h2>
                  <div id="collapse<?= $category_name ?>" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body pb-2">
                      <ul class="mb-0 ps-1" style="list-style: none;">
                        <?php foreach ($subcategories as $subcategory_name) : ?>
                          <li class="pb-2"><a href="#" class="hover "><?= $subcategory_name ?></a></li>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <div class="pb-4">
            <h3 class="text-uppercase fw-bold fs-5 mb-4" style="font-family: 'Oswald', sans-serif;">Shop by <br>___</h3>

            <h6 class="text-uppercase fw-bold pb-2" style="border-bottom: 1px solid #d9d9d9; padding-left:20px">Manufacturer</h6>
            <ul class="pb-3" style="list-style: none;">
              <?php foreach ($brands as $brand) : ?>
                <li class="pb-2"><a href="#."><?= $brand ?> <span>(10)</span></a></li>
              <?php endforeach; ?>
            </ul>

            <h6 class="text-uppercase fw-bold pb-2" style="border-bottom: 1px solid #d9d9d9; padding-left:20px">Price</h6>
            <label for="customRange2" class="form-label">Price Range</label>
            <div class="d-flex justify-content-between align-items-center mb-2">
              <span id="min-value">Min: 0$</span>
              <span id="selected-value" class="fw-bold">Selected Value 500$</span>
              <span id="max-value">Max: 1000$</span>
            </div>
            <input type="range" class="form-range pb-4" min="0" max="1000" value="500" id="customRange2">
            <button type="button" class="btn btn-secondary ">Submit</button>

            <h6 class="text-uppercase fw-bold pb-2 mt-4" style="border-bottom: 1px solid #d9d9d9; padding-left:20px">Color Option</h6>
            <ul class="pb-3" style="list-style: none;">
              <?php foreach ($colors as $color) : ?>
                <li class="pb-2"><a href="#."><?= $color ?> <span>(10)</span></a></li>
              <?php endforeach; ?>
            </ul>
            <h6 class="text-uppercase fw-bold pb-2 mt-4" style="border-bottom: 1px solid #d9d9d9; padding-left:20px">Size Option</h6>
            <ul class="pb-3" style="list-style: none;">
              <?php foreach ($sizes as $size) : ?>
                <li class="pb-2"><a href="#."><?= $size ?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>


        <div class="col-md-9 col-sm-9 ps-4 mb-2">
          <div>
            <a href="#" class="py-2 my-2"><button class="btn btn-link-grey py-2 px-3">Show Sidebar</button></a>
            <a href="#" class=" py-2 my-2"><button id="gridbtn" class="btn btn-link-clicked py-2 px-3"><i class="bi bi-grid-fill "></i></button></a>
            <a href="#" class="py-2 my-2"><button id="listbtn" class="btn btn-link-grey py-2 px-3"><i class="bi bi-list"></i></button></a>
            <button class="btn btn-link-grey dropdown-toggle my-2 py-2 px-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">Default sorting</button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item " href="#.">Default</a></li>
              <li><a class="dropdown-item " href="#.">Default</a></li>
            </ul>
          </div>
          <div id="gridContent" class="contentgrid mt-3 activegrid">
            <div class="row text-center">
              <?php
              // Check if products are available
              if (!empty($products)) {
                // Set the number of elements to display
                $displayCount = 12;

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

          <div id="listContent" class="contentgrid mt-3">
            <div class="row">
              <?php
              if (!empty($products)) {
                foreach ($products as $product) : ?>
                  <div class="col-lg-3 col-md-6 col-sm-12 position-relative d-flex pb-4">
                    <a href="#" class="w-100">
                      <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="img-fluid w-100">
                    </a>
                  </div>
                  <div class="col-lg-9 col-md-6 col-sm-12 d-flex flex-column justify-content-center">
                    <h4 class="mb-0 pb-2"><?php echo htmlspecialchars($product['name']); ?></h4>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque reiciendis dicta corporis esse eius labore accusamus, ut cupiditate id! Vel ab autem aliquid obcaecati reiciendis exercitationem vitae porro impedit dicta ad eaque ducimus sunt nostrum magni ut natus dolorum doloribus tempora, in aspernatur labore aliquam iure reprehenderit incidunt! Autem, ullam.</p>
                    <ul class="d-inline-block" style="list-style: none; padding: 0;">
                      <li class="d-inline"><img src="./img/star.png" alt=""> | </li>
                      <li class="d-inline"><a href="#.">10 review(s)</a> | </li>
                      <li class="d-inline"><a href="#.">Add your review</a></li>
                    </ul>
                    <span class="text-primary pb-2"><?php echo htmlspecialchars($product['price']); ?></span>
                    <div class="pb-4"><a href="#." class="hover d-inline "><button class="btn btn-link-chart py-2 px-3 "><i class="bi bi-cart-plus-fill"></i>Add to your cart</button></a>
                      <a href="#." class="d-inline"><button class="btn btn-link-chart py-2 px-3"><i class="bi bi-heart"></i></button></a>
                      <a href="#." class="d-inline"><button class="btn btn-link-chart py-2 px-3"><i class="bi bi-arrow-left-right"></i></button></a>
                    </div>

                  </div>
              <?php endforeach;
              } else {
                echo "<p>No products found.</p>";
              }
              ?>
            </div>
          </div>

        </div>

        <div class="row my-5 pb-5">
          <div class="col-md-3 col-sm-3"></div>
          <div class="col-md-6 col-sm-6 position-relative">
            <ul class="pager position-absolute start-0" style="list-style: none;">
              <li><a href="#." class="text-center"><i class="bi bi-chevron-left"></i></a>
              </li>
              <li class="active"><a class="" href="#.">01</a>
              </li>
              <li><a href="#.">02</a>
              </li>
              <li><a href="#.">03</a>
              </li>
              <li><a href="#." class="text-center"><i class="bi bi-chevron-right"></i></a>
              </li>
            </ul>
          </div>
          <div class="col-md-3 col-sm-3 text-end">
            <h6 class="fw-lighterr text-uppercase">Showing 1-12 of 20 results</h6>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include 'footer.php'; ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const rangeInput = document.getElementById('customRange2');
      const selectedValue = document.getElementById('selected-value');
      const minValue = document.getElementById('min-value');
      const maxValue = document.getElementById('max-value');


      //minValue.textContent = rangeInput.min;
      //maxValue.textContent = rangeInput.max;
      selectedValue.textContent = rangeInput.value;

      rangeInput.addEventListener('input', function() {
        selectedValue.textContent = rangeInput.value;
      });
    });
  </script>
  <script>
    document.getElementById('gridbtn').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('gridContent').classList.add('activegrid');
      document.getElementById('listContent').classList.remove('activegrid');
      document.getElementById('gridbtn').classList.add('btn-link-clicked');
      document.getElementById('gridbtn').classList.remove('btn-link-grey');
      document.getElementById('listbtn').classList.add('btn-link-grey');
      document.getElementById('listbtn').classList.remove('btn-link-clicked');
    });

    document.getElementById('listbtn').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('listContent').classList.add('activegrid');
      document.getElementById('gridContent').classList.remove('activegrid');
      document.getElementById('listbtn').classList.add('btn-link-clicked');
      document.getElementById('listbtn').classList.remove('btn-link-grey');
      document.getElementById('gridbtn').classList.add('btn-link-grey');
      document.getElementById('gridbtn').classList.remove('btn-link-clicked');
    });
  </script>
</body>

</html>