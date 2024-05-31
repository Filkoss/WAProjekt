<?php
include 'dbc.php'; // Include the database connection file

$message = ""; // Initialize an empty message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query to check if the username and password match
    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Check if a row was returned
        if (mysqli_num_rows($result) == 1) {
            // Login successful, redirect to a logged-in page
            $message = 'login probehl uspesne';
        } else {
            // Invalid username or password
            $message = "Invalid username or password.";
        }
    } else {
        // Error in the query
        $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style>
        form{
            padding: 30px;
            border-radius: 10px;
            color: white;
            width: 30rem;

        }
    </style>
</head>
<body>
<?php include 'navbar.php'?>

<div class="d-flex flex-column justify-content-center align-items-center" style="height: 100vh">
    <form class="bg-dark" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="mb-3">
            <label for="usernameInput" class="form-label">Username</label>
            <input type="text" class="form-control" id="usernameInput" name="username">
        </div>
        <div class="mb-3">
            <label for="passwordInput" class="form-label">Password</label>
            <input type="password" class="form-control" id="passwordInput" name="password">
        </div>
        <button type="submit" class="btn btn-light">Login</button>
        <div class="mb-3 mt-2">
            <a href="register.php" style="color: white">Register</a>
        </div>
    </form>
    <p id="info-text" style="display: <?php echo $message ? 'block' : 'none'; ?>;margin-top: 2rem"><?php echo $message; ?></p>
</div>

<?php include 'footer.php'?>

</body>
</html>
