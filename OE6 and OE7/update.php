<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block" style="background-image: url('https://i.pinimg.com/564x/a3/cd/f3/a3cdf3560eaa1dbe366834f7ed0efed5.jpg');"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Update Student Details</h1>
                            </div>

                            <?php 
                            require_once('connect.php');
                                if (isset($_POST['update'])) {
                                $fname = $_POST['firstname'];
                                $lname = $_POST['lastname'];
                                $bdate = $_POST['birthdate'];
                                $gender = $_POST['gender'];
                                $email = $_POST['email'];
                                //$picture = $_POST['picture'];
                                $address = $_POST['address'];
                                $regs_date = $_POST['regs_date'];
                                $user_id = $_POST['id'];

                                $query = "UPDATE users_tbl1 SET firstname = '$fname', lastname = '$lname', birthdate = '$bdate', gender = '$gender', email = '$email', address = '$address', regs_date = '$regs_date' where id='$user_id'";
                                //$result = $conn->query($query);
                                $result = @mysqli_query($conn,$query);
            
                            
                                if ($result == TRUE) {
                                echo '<script type="text/JavaScript">';
                                echo 'alert("Record successfully updated!")';
                                echo '</script>';
                                ?>
                                <script type="text/javascript">
                                    window.location.href='admin_dashboard.php'
                                    </script>
                                <?php
                                } else {
                                echo '<script type="text/Javascript">';
                                echo 'alert("Error updating..")';
                                echo '</script>'; 
                                }
                            }
                        
                    //Retrieve individual data to be updated
                    if (isset($_GET['id'])) {
                        $user_id = $_GET['id'];
                        $sql = "SELECT * FROM users_tbl1 WHERE id = '$user_id'";
                        $result = mysqli_query($conn, $sql);

                        if ($result -> num_rows){
                            while ($row = $result->fetch_assoc()){
                                $fname = $row ['firstname'];
                                $lname = $row ['lastname'];
                                $bdate = $row ['birthdate'];
                                $gender = $row ['gender'];
                                $email = $row ['email'];
                                $address = $row ['address'];
                                $regs_date = $row ['regs_date'];
                            }
                        }
                    }
                    ?>
                    <!--reg form-->
                    <style>
                    .form-group {
                        margin-bottom: 15px;
                    }

                    .btn-blue,
                    .btn-red {
                        width: 100%; /* Make buttons take up full width */
                        margin-top: 10px; /* Add some spacing between buttons and form fields */
                    }

                    /* Add more styling as needed */

                    @media (min-width: 768px) {
                        /* Adjust styling for larger screens if needed */
                        .form-group {
                            margin-bottom: 20px;
                        }
                    }
                    </style>

                        <form method="post" action="" class="user" enctype="multipart/form-data">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="hidden" name="id" value="<?php echo $user_id; ?>">
                                <input type="text" name="firstname" value="<?php echo $fname;?>" class="form-control" placeholder="First Name">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="lastname" value="<?php echo $lname;?>" class="form-control" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="birthdate" value="<?php echo $bdate;?>" class="form-control" placeholder="Birthdate (yyyy-mm-dd)">
                        </div>
                        <div class="form-group">
                            <select name="gender" class="form-control">
                                <option value="" disabled selected>Select Gender</option>
                                <option value="Male" <?php if ($gender == 'Male') echo 'selected'; ?>>Male</option>
                                <option value="Female" <?php if ($gender == 'Female') echo 'selected'; ?>>Female</option>
                                <option value="Other" <?php if ($gender == 'Other') echo 'selected'; ?>>Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" value="<?php echo $email;?>" class="form-control" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <input type="text" name="address" value="<?php echo $address;?>" class="form-control" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <input type="text" name="regsdate" value="<?php echo $regs_date;?>" class="form-control" placeholder="Registration date (yyyy-mm-dd)">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="update" class="btn btn-primary btn-user btn-blue">Update</button>
                            <button type="button" class="btn btn-primary btn-user btn-red" onclick="if(confirm('Are you sure to cancel?')) history.back();">Cancel</button>
                        </div>
                    </form>

                    </div>
                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            

                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>