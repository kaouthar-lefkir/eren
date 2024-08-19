<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eren_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  // Prepare and bind
  $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $email, $message);

  // Execute the statement
  if ($stmt->execute()) {
    $successMessage = "Message sent successfully!";
  } else {
    $errorMessage = "Error: " . $stmt->error;
  }

  // Close the statement
  $stmt->close();
}

// Close the connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eren | Contact</title>
  <link rel="shortcut icon" href="img/favicon.png">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="owlcarousel/assets/owl.theme.default.min.css">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
</head>

<body>

  <?php include 'header.php'; ?>


  <section class="  mt-5 pt-5 page-header">
    <div class="container">
      <div class="row">
        <div class="col-12 py-5 px-2">
          <div class=" text-center py-5">
            <h2 class="text-uppercase  text-white fw-bold">Contact us</h2>
            <p class="fw-light">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium, sunt?</p>
          </div>
        </div>
      </div>
    </div>
  </section>



  <section class="my-5 pt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <a href="index.html" class="d-inline-block">Home</a>
          <span> / </span>
          <a href="#" class="navactive d-inline-block">Contact Us</a>
          <hr class="mt-2" />
        </div>
      </div>
    </div>
  </section>



  <section class="my-5">
    <div class="container">
      <div class="row">
        <div class="col-md-8 mb-4">
          <h3 class="text-uppercase fw-bold fs-5 mb-4" style="font-family: 'Oswald', sans-serif;">send us a message <br>___</h3>
          <?php if (isset($successMessage)) : ?>
            <div class="alert alert-success">
              <?php echo htmlspecialchars($successMessage); ?>
            </div>
          <?php elseif (isset($errorMessage)) : ?>
            <div class="alert alert-danger">
              <?php echo htmlspecialchars($errorMessage); ?>
            </div>
          <?php endif; ?>
          <form class="row" method="post" action="">
            <div class="col-md-6 mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="John Smith" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="email" class="form-label">Mail</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="John@example.com" required>
            </div>
            <div class="col-md-12 mb-5">
              <label for="message" class="form-label">Message</label>
              <textarea class="form-control" id="message" name="message" placeholder="Write Your Message Here..." rows="4" required></textarea>
            </div>
            <div class="col-md-6">
              <button type="submit" class="btn px-5 btn-primary">Send Your Message</button>
            </div>
          </form>
        </div>
        <div class="col-md-4">
          <h3 class="text-uppercase fw-bold fs-5 mb-4" style="font-family: 'Oswald', sans-serif;">get office info <br>___</h3>
          <p class="fw-light pb-2">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accum</p>
          <ul class="" style="list-style: none;">
            <li class="pb-4"><i class="bi bi-house text-primary fs-3"></i><span class="fw-bold text-uppercase"> Our Address</span> <br> 234 Heaven Stress, Beverly Hill.</li>
            <li class="pb-4"><i class="bi bi-phone text-primary fs-3"></i><span class="fw-bold text-uppercase"> phone number</span> <br> 234 Heaven Stress, Beverly Hill.</li>
            <li class="pb-4"><i class="bi bi-envelope text-primary fs-3"></i><span class="fw-bold text-uppercase"> email address</span> <br> Contact@erentheme.com</li>
          </ul>
        </div>
      </div>
    </div>
  </section>


  <section class="my-5 py-5">
    <div class="w-100">
      <div class="cartegoogle" style="height:500px">
        <iframe class="position-relative border-30 w-100 h-100" id="gmap_canvas" src="https://maps.google.com/maps?q=37.7749,-122.4194&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
      </div>
    </div>
  </section>


  <?php include 'footer.php'; ?>

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="node_modules/jquery/dist/jquery.min.js"></script>
</body>

</html>