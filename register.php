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
                <div class="row"></>
                <div class="col-lg-5 d-none d-lg-block" style="background-image: url('https://i.pinimg.com/564x/9b/8d/59/9b8d594bd4b03d20df7dc3281b205894.jpg');"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Registration Details</h1>
                            </div>
                            <!--HERE's MY REGISTRATION INFORMATION-->
                            <style>
                             <style>
                                body {
                                    font-family: Arial, sans-serif;
                                    display: flex;
                                    flex-direction: column;
                                    align-items: center;
                                    justify-content: center;
                                    height: 100vh;
                                    margin: 0;
                                }

                                .registration-info {
                                    font-size: 20px;
                                    text-align: center;
                                }

                                .registration-info b {
                                    color: blue; /* Set the font color for labels to blue */
                                }

                                .output-text {
                                    color: black; /* Set the font color for the output text to black */
                                }
                            </style>
                        </head>
                        <body>
                            <?php
                            if (isset($_POST["submit"])) {
                                $firstname = sanitizeInput($_POST["firstname"]);
                                $lastname = sanitizeInput($_POST["lastname"]);
                                $gender = sanitizeInput($_POST["gender"]);
                                $birthdate = sanitizeInput($_POST["birthdate"]);
                                $address = sanitizeInput($_POST["address"]);
                                $country = sanitizeInput($_POST["country"]);

                                // Validation 

                                echo "<div class='registration-info'>";
                                echo "<b>First Name:</b> <span class='output-text'>$firstname</span> <br>";
                                echo "<b>Last Name:</b> <span class='output-text'>$lastname</span> <br>";
                                echo "<b>Gender:</b> <span class='output-text'>$gender</span> <br>";
                                echo "<b>Date of Birth:</b> <span class='output-text'>$birthdate</span> <br>";
                                echo "<b>Address:</b> <span class='output-text'>$address</span> <br>";
                                echo "<b>Country:</b> <span class='output-text'>$country</span> <br>";
                                echo "</div>";
                            }

                            // Function to sanitize form input
                            function sanitizeInput($data) {
                                $data = trim($data);
                                $data = stripslashes($data);
                                $data = htmlspecialchars($data);
                                return $data;
                            }
                            ?>
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