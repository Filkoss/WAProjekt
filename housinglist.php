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
        <div class="container d-flex justify-content-center align-items-center flex-column" style="">

            <h1>Všechna ubytovaní</h1>


                    <?php
                    include 'dbc.php';

                    $query = "SELECT * FROM housing";

                    if (isset($conn)) {
                        $result = mysqli_query($conn, $query);
                    }

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="card w-75 mb-3 bg-dark text-white">
                                    <div class="card-body">
                                    <h5 class="card-title">'.$row['name'].'</h5>
                                    <p class="card-text">'. $row['description'] .'</p>
                                    <p>'.$row['price_per_night'].',-kč</p>
                                    <a href="#" class="btn btn-light">Rezervovat</a>
                                  </div>
                                </div>';
                        }
                    } else {
                        echo '<li class="list-group-item">Žádné .</li>';
                    }


                    mysqli_close($conn);
                    ?>

        </div>
    <?php include 'footer.php'?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
