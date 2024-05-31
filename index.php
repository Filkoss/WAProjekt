<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Rezervace</title>
    <style>
    </style>
</head>
<body>
<?php include 'navbar.php'?>
<div class="container d-flex justify-content-center align-items-center flex-column" style="height: 100vh">
    <h1 style="font-size: 70px">nazev</h1>
    <p>nejakej text</p>
    <div class="container d-flex justify-content-center align-items-center flex-column">
        <h1 style="margin-bottom: 2rem">Populární místa</h1>
        <div class="d-flex flex-row" style="width: 50rem; gap: 10px">
            <?php
            include 'dbc.php';
            $query = "SELECT * FROM housing LIMIT 3";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="card" style="width: 18rem;">
                        <div class="card-body bg-dark text-white"  style="border-radius: 10px;">
                            <h5 class="card-title">' . $row['name'] . '</h5>
                            <p class="card-text">' . $row['description'] . '</p>
                            <p class="card-text">Location: ' . $row['location'] . '</p>
                            <p class="card-text">Cena: ' . $row['price_per_night'] . ',-kč</p>
                            <a href="#" class="btn btn-light">Rezervovat</a>
                        </div>
                    </div>';
                }
            } else {
                echo "No housing available.";
            }
            mysqli_close($conn);
            ?>
        </div>
    </div>
</div>
<?php include 'footer.php'?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
