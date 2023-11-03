<?php
    include('connect.php');

    session_start();
    $fname = $_SESSION['firstname'];
    $lname = $_SESSION['lastname'];
    $session = $_SESSION['loggedin'];

    // Aggregate SQL Query
    $query = mysqli_query($conn, "SELECT id, COUNT(id) as user_count FROM users_tbl1");
    $view = mysqli_fetch_array($query);
    $user_count = $view['user_count'];
    $id = $_SESSION['id'];

    //query for the image
    $image_query = mysqli_query($conn, "select * from users_tbl1 where id = '$id'");
?>