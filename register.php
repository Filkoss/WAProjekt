<?php
include 'dbc.php';
$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];


    $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
    if (mysqli_query($conn, $sql)) {
        $message = 'Registrace probehla uspesne';
    } else {
        $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

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
    <title>Registrace</title>
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
            <label for="emailInput" class="form-label">Email address</label>
            <input type="email" class="form-control" id="emailInput" name="email">
        </div>
        <div class="mb-3">
            <label for="passwordInput" class="form-label">Password</label>
            <input type="password" class="form-control" id="passwordInput" name="password">
        </div>
        <button type="submit" class="btn btn-light">Register</button>
        <div class="mb-3 mt-2 ">
            <a href="login.php" style="color: white">login</a>
        </div>
    </form>
    <p id="info-text" style="display: <?php echo $message ? 'block' : 'none'; ?>"><?php echo $message; ?></p>
</div>

<?php include 'footer.php'?>

</body>
</html>
