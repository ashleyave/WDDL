<?php
require_once('connect.php');

if(isset($_POST['submit'])){ 
    if($conn){
        $filename = $_FILES["picture"]["name"];
        $filename = $_FILES["picture"]["tmp_name"];
        $folder = "./images/".$filename;

        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $bdate = $_POST['birthdate'];
        $gender = $_POST['gender'];
        $email = $_POST['email']; 
        $address = $_POST['address'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $regs_date = $_POST['regs_date'];

    $query = "INSERT INTO users_tbl1 (firstname, lastname, birthdate, gender, email, picture, address, username, password, cpassword, regs_date) VALUES ('$fname', '$lname', '$bdate', '$gender', '$email', '$filename', '$address', '$username', '$password', '$cpassword', NOW())";


    $result = mysqli_query($conn, $query);

    if ($result){
        move_uploaded_file($tempname, $folder); //move the picture to folder
        echo '<script type="text/javascript">';
        echo 'alert("Successfully Registered!");';
        echo '</script>'; ?>
        <script type="text/javascript">
            window.location='login.html';
        </script>
        <?php
    } else {
        $err[] = 'Registration failed...' . mysqli_error($conn);
    }
    mysqli_close($conn);
} else {
    die('Connection Failed: ' . mysqli_connect_error());
}
}
?>
