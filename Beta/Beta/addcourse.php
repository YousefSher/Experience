<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beta Academy</title>
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body class="bg-white">
      <?php 
        include 'db.php';
        include 'navbar.php'; 
      ?>

      <?php
        //recieve the data here to put it in the database
        if(isset($_POST["c_submit"])){

          $c_name = $_POST["cname"];
          $c_price = $_POST["cprice"];
          $c_code = $_POST["ccode"];
          $c_inst = $_POST["cinst"];
          $c_cat = $_POST["ccat"];
          $c_desc = $_POST["cdesc"];
          $c_img = $_FILES["cimg"]["name"];
          $c_img_temp = $_FILES["cimg"]["tmp_name"];
          $folder = "images/".$c_img;

          $sql = "INSERT INTO beta_courses (c_name, c_cat, c_price, c_code, c_desc, c_image) VALUES ('$c_name', $c_cat, $c_price, '$c_code', '$c_desc', '$c_img')";

          if($conn->query($sql) === TRUE){

            echo "<div class='alert alert-success' role='alert'>
                    Your course has been successfully insterted!
                  </div>";
                  move_uploaded_file($c_img_temp, $folder);
        }
        else{
          echo "<div class='alert alert-success' role='alert'>
                  Error! ". $sql . $conn->error . "
                </div>";
        }
        }
      ?>

      <!-- Course form -->
    <div class="p-5 bg-white">
      <div class="h3 text-capitalize text-center text-secondary pb-2 border-bottom border-primary">Course Information</div>
      <br>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="row mt-3">
            <div class="col-md-8">
              <!-- Name -->
              <div class="input-group mb-3">
                <span class="input-group-text">Name</span>
                <input type="text" name="cname" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
              </div>
            </div>
            <div class="col-md-4">
              <!-- Price -->
              <div class="input-group mb-3">
                <span class="input-group-text">EGP</span>
                <span class="input-group-text">0.00</span>
                <input type="text" class="form-control" name="cprice" aria-label="Dollar amount (with dot and two decimal places)">
              </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-4">
              <!-- Course Code -->
              <div class="input-group mb-3">
                <span class="input-group-text">Code</span>
                <input type="text" name="ccode" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
              </div>
            </div>
            <div class="col-md-8">
              <!-- Instructor -->
              <div class="input-group mb-3">
                <select class="form-select" name="cinst" id="inputGroupSelect02">
                  <option selected>Choose...</option>
                  <option value="1">Dev. Instructor</option>
                  <option value="2">IT. Instructor</option>
                  <option value="3">Design. Instructor</option>
                  <option value="4">PM. Instructor</option>
                  <option value="5">Elec. Instructor</option>
                  <option value="6">Math. Instructor</option>
                </select>
                <label class="input-group-text" for="inputGroupSelect02">Instructor</label>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-5">
                <!-- image -->
                <div class="input-group mb-3">
                  <input type="file" class="form-control border-teritiary" name="cimg" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                </div>
              </div>
              <!-- Category -->
            <div class="col-md-7">
              <div class="input-group mb-3">
                <select class="form-select" name="ccat" id="inputGroupSelect02">
                  <option selected>Choose...</option>
                  <option value="1">Computer Science</option>
                  <option value="2">Design</option>
                  <option value="3">Business</option>
                  <option value="4">Math and Logic</option>
                  <option value="5">Phisycal Science and Engineering</option>
                </select>
                <label class="input-group-text" for="inputGroupSelect02">Category</label>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col">
                <!-- Description -->
                <div class="input-group">
                  <span class="input-group-text">Description</span>
                  <textarea class="form-control" name="cdesc" aria-label="With textarea"></textarea>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div class="d-grid gap-2 col-6 mx-auto mt-4">
                    <input class="btn btn-primary" value="Add Course" name="c_submit" type="submit">
          </div>
        </form>
    </div>

    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/main.js"></script>
</body>
</html>