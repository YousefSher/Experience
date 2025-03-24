<?php
  include 'db.php';
  $id = $_GET['cid'];
  $sql = "SELECT * FROM beta_courses WHERE c_id = $id";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  if(!isset($row['c_id'])) echo "<script> window.location.href='home.php'; </script>";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beta Academy</title>
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body class = "bg-white">
  <?php include 'navbar.php'; ?>
  <!-- Course details -->
  <section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
      <div class="row gx-4 gx-lg-5 align-items-center">
        <div class="col-md-6">
          <img class="card-img-top mb-5 mb-md-0" src="images/<?php echo $row['c_image'] ?>" alt="">
        </div>
        <div class="col-md-6">
          <div class="small mb-1"><?php echo $row['c_code'] ?></div>
          <h1 class="display-5 fw-bolder"><?php echo $row['c_name'] ?></h1>
          <div class="fs-5 mb-5">
            <span class="text-decoration-line-through"></span>
            <span><?php echo $row['c_price'] ?>EGP</span>
          </div>
          <p class="lead"><?php echo $row['c_desc'] ?></p>
          <div class="d-flex">
            <?php
              $uid = $_SESSION['id'];
              $sql = "SELECT * FROM `user_courses` WHERE u_id = $uid AND c_id=$id";
              $result = $conn->query($sql);
              if(($row = $result->fetch_assoc())>0){
                echo "<button class='btn btn-dark flex-shrink-0' type='button'>
                <i class='bi-cart-fill me-1'></i>
                  Owned
                </button>";
              }
              else{
                echo "<a href='buy_course.php?cid=".$id."'>
                <button class='btn btn-outline-dark flex-shrink-0' type='button'>
                <i class='bi-cart-fill me-1'></i>
                  Add to cart
                </button>
              </a>";
              }
            ?>
            
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact us -->
  <div class="container">
  </div>

  <script src="JS/bootstrap.min.js"></script>
  <script src="JS/main.js"></script>
</body>
</html>