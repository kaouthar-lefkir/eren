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


// Fermer la connexion
$conn->close();
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
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <link rel="stylesheet" href="./slider.css">
      </head>
<body>


<?php include 'header.php'; ?>

      <section class="my-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                        <a href="index.html" class="d-inline-block">Home</a>
                        <span> / </span>
                        <a href="index.html" class="d-inline-block">Pages</a>
                        <span> / </span>
                        <a href="#" class="navactive d-inline-block">Products Details</a>
                        <hr class="mt-2"/>
                </div>
            </div>
        </div>
      </section>


      <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                  <div class="row">
                    <div class="col-md-12 px-0 py-2">
                      <div class="swiper swiper_large_preview">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <div class="zoom_img">
                              <img class="img-fluid" src="./img/detail1.jpg" />
                            </div>
                          </div>
                          <div class="swiper-slide">
                            <div class="zoom_img">
                              <img class="img-fluid" src="./img/detail2.jpg" />
                            </div>
                          </div>
                          <div class="swiper-slide">
                            <div class="zoom_img">
                              <img class="img-fluid" src="./img/detail3.jpg" />
                            </div>
                          </div>
                          <div class="swiper-slide">
                            <div class="zoom_img">
                              <img class="img-fluid" src="./img/detail4.jpg" />
                            </div>
                          </div>
                          
        
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12 px-0 py-2">
                      <div thumbsSlider="" class="swiper swiper_thumb">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <div class="zoom_img">
                              <img class="img-fluid" src="./img/detail1.jpg" />
                            </div>
                          </div>
                          <div class="swiper-slide">
                            <div class="zoom_img">
                              <img class="img-fluid" src="./img/detail2.jpg" />
                            </div>
                          </div>
                          <div class="swiper-slide">
                            <div class="zoom_img">
                              <img class="img-fluid" src="./img/detail3.jpg" />
                            </div>
                          </div>
                          <div class="swiper-slide">
                            <div class="zoom_img">
                              <img class="img-fluid" src="./img/detail4.jpg" />
                            </div>
                          </div>
        
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 d-flex flex-column justify-content-center">
                    
                        <h4 class="mb-0 pb-2">Sacrificial Chair Design</h4>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque reiciendis dicta corporis esse eius labore accusamus, ut cupiditate id! Vel ab autem aliquid obcaecati reiciendis exercitationem vitae porro impedit dicta ad eaque ducimus sunt nostrum magni ut natus dolorum doloribus tempora, in aspernatur labore aliquam iure reprehenderit incidunt! Autem, ullam.</p>
                        <ul class="d-inline-block" style="list-style: none; padding: 0;">
                          <li class="d-inline"><img src="./img/star.png" alt=""> | </li>
                          <li class="d-inline"><a href="#.">10 review(s)</a> | </li>
                          <li class="d-inline"><a href="#.">Add your review</a></li>
                        </ul>
                        <span class="text-primary pb-2">$175.00</span>
                        <h5>Size *</h5>
                        <ul class="pager " style="list-style: none;">
                            <li class="active"><a href="#." class="text-center">S</a>
                            </li>
                            <li class=""><a class="" href="#.">M</a>
                            </li>
                            <li><a href="#.">L</a>
                            </li>
                            <li><a href="#.">XL</a>
                            </li>
                            <li><a href="#." class="text-center">XXL</a>
                            </li>
                          </ul>

                        <h5>Color *</h5>

                        <ul class="pager-col" style="list-style: none;">
                            <li style="background: whitesmoke;" class="active"><a href="#." ></a>
                            </li>
                            <li style="background: black;"><a class="" href="#."></a>
                            </li>
                            <li style="background: darkcyan;"><a href="#."></a>
                            </li>
                            <li style="background: red;"><a href="#."></a>
                            </li>
                            <li style="background: darkblue;"><a href="#." ></a>
                            </li>
                        </ul>

                        <h5>Quantity *</h5>
                        <input type="number" value="1" min="1" max="100" step="1" />

                        <span class="text-danger pb-3 pt-2">* Required fields</span>


                        <div class="pb-4"><a href="#." class="hover d-inline "><button class="btn btn-link-chart py-2 px-3 "><i class="bi bi-cart-plus-fill"></i>  Add to your cart</button></a>
                        <a href="#." class="d-inline"><button  class="btn btn-link-chart py-2 px-3"><i class="bi bi-heart"></i></button></a>
                        <a href="#." class="d-inline"><button  class="btn btn-link-chart py-2 px-3"><i class="bi bi-arrow-left-right"></i></button></a></div>
                        
                            <div class="cart-share" >
                                <ul style="list-style: none;" >
                            <li class="d-inline"><a href="#." class="facebook"><i class="bi bi-facebook"></i><span>  Like</span></a>
                            </li class="d-inline">
                            <li class="d-inline"><a href="#." class="twitter"><i class="bi bi-twitter"></i><span>  Tweet</span></a>
                            </li>
                            <li class="d-inline"><a href="#." class="share"><i class="bi bi-share-fill"></i><span>  Share</span></a>
                            </li>
                          </ul>
                            </div>
                        
                    
                </div>
            </div>
        </div>
      </section>


      <section class="my-5">
    <div class="container">
        <div class="nav-links mb-5">
            <a href="#description" class="custom-nav-link text-uppercase fw-bold fs-6 d-inline mb-4 pe-4" style="font-family: 'Oswald', sans-serif;">Description</a>
            <a href="#customer-review" class="custom-nav-link text-uppercase fw-bold fs-6 d-inline mb-4 pe-4" style="font-family: 'Oswald', sans-serif;">Customer Review</a>
            <a href="#product-tag" class="custom-nav-link text-uppercase fw-bold fs-6 d-inline mb-4 pe-4" style="font-family: 'Oswald', sans-serif;">Product Tag</a>
            <hr>
        </div>
      
        <div id="description" class="content-section active-section mb-4">
            <p class="fw-light">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illo dolores nulla eaque sunt libero voluptatem doloribus dolor officiis earum sit excepturi, quisquam ducimus mollitia qui, magnam officia accusantium fugit eligendi? Assumenda dolorum illo, enim amet tempora velit beatae neque dicta exercitationem voluptates impedit, esse cupiditate nisi accusantium rem mollitia consequuntur.</p>
        </div>
    
        <div id="customer-review" class="content-section mb-4">
            <div class="my-3 d-flex">
                <img src="https://randomuser.me/api/portraits/men/30.jpg" alt="" class="rounded-circle h-25">
                <div class="d-inline ms-1">
                    <h5><a href="#.">ErenTheme </a><span> - April 7, 2016</span></h5>
                    <p class="fw-light py-4">It is a long established fact that a reader will be disers.</p>
                </div>
            </div>
            <hr>
            <div class="my-3 d-flex">
                <img src="https://randomuser.me/api/portraits/men/20.jpg" alt="" class="rounded-circle h-25">
                <div class="d-inline ms-1">
                    <h5><a href="#.">ErenTheme </a><span> - April 9, 2019</span></h5>
                    <p class="fw-light py-4">It is a long established fact that a reader will be disers.</p>
                </div>
            </div>
            <hr>
            <div class="my-3">
                <form class="row">
                    <div class="col-12 mb-4">
                        <label for="msg" class="form-label">Your Review</label>
                        <textarea type="text" class="form-control" id="msg" placeholder="Your Review" rows="3"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="John Smith">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mail</label>
                        <input type="email" class="form-control" id="exampleInputPassword1" placeholder="John@example.com">
                    </div>
                    <div class="col-12 mt-2"><button type="submit" class="btn px-4 btn-primary">Submit</button></div>
                </form>
            </div>
        </div>
    
        <div id="product-tag" class="content-section">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-responsive table-striped">
                        <tbody>
                          <tr>
                            <td>Part Number</td>
                            <td>60-MCTE</td>
                          </tr>
                          <tr>
                            <td>Item Weight</td>
                            <td>54 pounds</td>
                          </tr>
                          <tr>
                            <td>Product Dimensions</td>
                            <td>92.8 inches</td>
                          </tr>
                          <tr>
                            <td>Item model number</td>
                            <td>60-MCTE</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-responsive table-striped">
                      <tbody>
                        <tr>
                          <td>Item Package Quantity</td>
                          <td>1</td>
                        </tr>
                        <tr>
                          <td>Number of Handles</td>
                          <td>1</td>
                        </tr>
                        <tr>
                          <td>Batteries Required?</td>
                          <td>NO</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
            </div>
        </div>
    </div>
</section>


      <section class="my-5 py-5">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <h3 class="text-uppercase fw-bold fs-5 mb-4" style="font-family: 'Oswald', sans-serif;">upsell products <br>___</h3>
                </div>

                <?php
              // Check if products are available
              if (!empty($products)) {
                // Set the number of elements to display
                $displayCount = 4;

                // Loop through the products and display the required number of elements
                for ($i = 0; $i < $displayCount; $i++) {
                  // Get the current product by using modulus to loop back when reaching the end
                  $product = $products[$i % count($products)];
              ?>
                  <div class="col-md-3 col-sm-6  text-center position-relative pb-3">
                    <a href="#" class="">
                      <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="img-fluid w-100">
                    </a>
                    <div class="d-flex">
                      <p class="mb-0"><?php echo htmlspecialchars($product['name']); ?></p>
                      <a href="#"><i class="bi bi-handbag-fill position-absolute" style="right:12px"></i></a>
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

      <?php include 'footer.php'; ?>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="node_modules/jquery/dist/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".swiper_thumb", {
      spaceBetween: 10,
      slidesPerView: 4,
      speed: 300,
      loop: false,
      freeMode: true,
      watchSlidesProgress: true,
      ClickAble: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
    var swiper2 = new Swiper(".swiper_large_preview", {
      spaceBetween: 10,
      slidesPerView: 1,
      // speed: 300,
      speed: 0,
      loop: true,
      // freeMode: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      thumbs: {
        swiper: swiper,
      },
    });
  </script>
      <script src="./InputSpinner.js"></script>
    
        <script type="module">
            import {InputSpinner} from "./InputSpinner.js"
        
            const inputSpinnerElements = document.querySelectorAll("input[type='number']")
            for (const inputSpinnerElement of inputSpinnerElements) {
                new InputSpinner(inputSpinnerElement)
            }
        </script>

        <script>
    document.addEventListener("DOMContentLoaded", function() {
        const links = document.querySelectorAll(".custom-nav-link");
        const sections = document.querySelectorAll(".content-section");
  
        links.forEach(link => {
            link.addEventListener("click", function(event) {
                event.preventDefault();
                const target = document.querySelector(this.getAttribute("href"));
  
                // Hide all sections
                sections.forEach(section => section.classList.remove("active-section"));
  
                // Show the target section
                target.classList.add("active-section");
            });
        });
    });
</script>
</body>
</html>