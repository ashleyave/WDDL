<?php
session_start();
require_once('connect.php');

if(isset($_POST['submit'])) {
    if($conn) {
        // Initialize Variables
        $username = $_POST['username'];
        $password = $_POST['password'];

        // SQL insertion query with prepared statement (to prevent SQL injection)
        $query = "SELECT * FROM users_tbl1 WHERE username=? AND password=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $count = $result->num_rows;

        if($count != 0) {
            // Valid login
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;

            // Retrieve user details
            if($row = $result->fetch_assoc()) {
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
            }

            // Redirect to admin dashboard
            header("Location: admin_dashboard.php");
        }
        else {
            // Invalid credentials
            echo '<script type="text/javascript">';
            echo 'alert("Invalid credentials, try again!");';
            echo '</script>';
            ?>
            <script type="text/javascript">
                window.location='login.html'; // Redirect to login.html
            </script>
            <?php
        }
        $stmt->close();
    }
    else {
        die('Connection Failed: '.mysqli_connect_error());
    }
}
?>
