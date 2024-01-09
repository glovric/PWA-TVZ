<!DOCTYPE html>
<html lang="en">
<head>
  <title>Članak</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../1 HTML_CSS/style.css">
  
</head>
<body>

    <header>
        <nav class="navbar shadow">

            <ul class="nav navbar-nav">
                <li><img src="../img/logo.png" class="logo" alt="Hamburger Morgnepost"></li>
                <li><a href="index.php">HOME</a></li>
                <li><a href="../2 HTML_forma_PHP/unos.php">UNOS</a></li>
                <li><a href="kategorija.php?id=Reise">REISE</a></li>
                <li><a href="kategorija.php?id=Verbraucher">VERBRAUCHER</a></li>
                <li><a href="administracija.php">ADMINISTRACIJA</a></li>
                
            </ul>

        </nav>
    </header>

    <?php

        include 'connect.php';

        $id = $_GET['id'];

        $upit = "SELECT * FROM arhiva WHERE id = '$id'";

        $rez = mysqli_query($dbc, $upit);

        $row = mysqli_fetch_array($rez);

        $naslov = $row['naslov'];
        $ksad = $row['ksadrzaj'];
        $sad = $row['sadrzaj'];
        $slika = "../img/" . $row['slika'];


    ?>

    <div class="container">

        <div class="container-fluid shadow">

            <h1><?php echo $naslov; ?></h1>

            <img src="<?php echo $slika; ?>" class="slike" alt="Planine">

            <p> <?php echo $ksad; ?>
            </p>

            <p><?php echo $sad; ?>
                </p>     



        </div>
  
    </div>

    <footer>
       <p>Copyright 2019 Morgenpost Verlag GmbH</p>
    </footer>

</body>
</html>
