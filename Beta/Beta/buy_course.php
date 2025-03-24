<?php
    //Server side for the page courseinfo.php
    include 'db.php';
    if(session_id() == ''){ session_start();}
    if(isset($_SESSION["loggedin"])){
        if($_SESSION["loggedin"]){
            $c_id = $_GET['cid'];
            $u_id = $_SESSION['id'];
            $sql = "INSERT INTO `user_courses` (u_id, c_id) VALUES ('$u_id','$c_id')";
            if(($conn->query($sql)) == TRUE){
                echo "<script> window.location.href='courseinfo.php?cid=". $c_id ."'; </script>";
            }
            else{
                echo "<div class='alert alert-success' role='alert'>
                    Error : '<br>'" . $conn->error. "
                    </div>";
            }
        }
    }
    ?>