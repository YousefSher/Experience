<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body class="bg-white">
    <?php
        //Select the course by it's category column
        include 'db.php';
        include 'navbar.php'; 
        $cat = $_GET['ccat'];
        $sql = "SELECT * FROM `beta_courses` WHERE `c_cat` = $cat";
        $results = $conn->query($sql);
        if($cat > 5 || $cat < 0) echo "<script> window.location.href='home.php'; </script>";
    ?>
    <div class="container mt-5">
    <h1 class="display-4 text-primary mb-3"><?php $row ?></h1>
        <div class="row row row-cols-1 row-cols-md-3 g-4">
            <!-- Courses -->
            <?php
                while($row = $results->fetch_assoc()){
                    echo "<div class = 'col'>
                            <div class='card shadow-lg' style='width: 18rem;'>
                            <img src='images/".$row["c_image"]."' class='card-img-top rounded-2' alt='...'>
                                <div class='card-body'>
                                <h5 class='card-title'>".$row["c_name"]." </h5>
                                    <p class='card-text'>".$row["c_desc"]." </p>
                                    <a href='courseinfo.php?cid=".$row["c_id"]."' class='btn btn-primary'>Details</a>
                                </div>
                            </div>         
                        </div>";
                }
            ?>
        </div>
    </div>
    <script src="JS/bootstrap.min.js"></>
    <script src="JS/main.js"></script>
</body>
</html>