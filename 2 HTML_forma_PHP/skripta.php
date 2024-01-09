<!DOCTYPE html>
<html lang="en">
<head>
  <title>Skripta</title>
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
                <li><a href="../3 PHP_MySQL/index.php">HOME</a></li>
                <li><a href="unos.php">UNOS</a></li>
                <li><a href="../3 PHP_MySQL/kategorija.php?id=Reise">REISE</a></li>
                <li><a href="../3 PHP_MySQL/kategorija.php?id=Verbraucher">VERBRAUCHER</a></li>
                <li><a href="../3 PHP_MySQL/administracija.php">ADMINISTRACIJA</a></li>
                
            </ul>

        </nav>
    </header>


    <div class="container">

        <div class="container-fluid shadow">

            <?php

                if(!empty($_POST['naslov']) && !empty($_POST['ksadrzaj'])  && !empty($_POST['sadrzaj']) && !empty($_FILES['slika']['name']) && isset($_POST['kat'])) {

                    $nas = $_POST['naslov'];
                    $ksad = $_POST['ksadrzaj'];
                    $sad = $_POST['sadrzaj'];
                    $slika = $_FILES['slika']['name'];

                    echo "<h1> $nas </h1>

                    <img src='../img/$slika' class='slike'>
     
                    <p> $ksad </p>
     
                    <p> $sad </p>";

                   
                
                }


                include '../3 PHP_MySQL/insert.php';

                

            ?>    



        </div>
  
    </div>

    <footer>
       <p>Copyright 2019 Morgenpost Verlag GmbH</p>
    </footer>

</body>
</html>
