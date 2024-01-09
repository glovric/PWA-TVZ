<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kategorija</title>
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

    <div class="container">

    <?php
        include 'connect.php';
        define('UPLPATH', '../img/');
        $kategorija = $_GET['id'];
        
    ?>

        

            <section>

                <h3><?php echo strtoupper($kategorija); ?></h3>
                <hr>

                <div class="row">

                <?php

                    $query = "SELECT * FROM arhiva WHERE archive=0 AND kategorija='$kategorija'";
                    $result = mysqli_query($dbc, $query);
                    while($row = mysqli_fetch_array($result)) {
                    echo '<a href="clanak.php?id='.$row['id'].'">';
                    echo'<article class="col-lg-4 col-sm-12 shadow">';
                    echo '<img src="' . UPLPATH . $row['slika'] . '" class="slike">';
                    echo '<p> ' . $row['naslov'] . ' </p>';
                    echo '</article>';
                    echo '</a>';
                    }
                ?>

                </div>

            </section>

  
    </div>

    <footer>
       <p>Copyright 2019 Morgenpost Verlag GmbH</p>
    </footer>

</body>
</html>