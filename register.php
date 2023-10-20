<?php
require_once('connect.php');

if(isset($_POST['submit'])){ 
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $bdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $regs_date = $_POST['regsdate'];

    $query = "INSERT INTO users_tbl (firstname, lastname, birthdate, gender, email, address, username, password, cpassword, regs_date) VALUES ('$fname', '$lname', '$bdate', '$gender', '$email', '$address', '$username', '$password', '$cpassword', NOW())";


    $result = mysqli_query($conn, $query);

    if ($result){
        echo '<script type="text/javascript">';
        echo 'alert("Successfully Registered!");';
        echo '</script>'; ?>
        <script type="text/javascript">
            window.location='admin_dashboard.php';
        </script>
        <?php
    } else {
        $err[] = 'Registration failed...' . mysqli_error($conn);
    }
    mysqli_close($conn);
} else {
    die('Connection Failed: ' . mysqli_connect_error());
}
?>
