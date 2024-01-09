<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registracija</title>
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
                <li><a href="../2 HTML_forma_PHP/unos.php">UNOS</a></li>
                <li><a href="../3 PHP_MySQL/kategorija.php?id=Reise">REISE</a></li>
                <li><a href="../3 PHP_MySQL/kategorija.php?id=Verbraucher">VERBRAUCHER</a></li>
                <li><a href="../3 PHP_MySQL/administracija.php">ADMINISTRACIJA</a></li>
            </ul>

        </nav>
    </header>

    <div class="container"> 

       <form method="post" action="">

            Korisničko ime <br>
            <input type="text" name="user" id="user"> <br>
            <span id="user_error"> </span>

            Ime <br>
            <input type="text" name="name" id="name"> <br>
            <span id="name_error"> </span> 

            Prezime <br>
            <input type="text" name="surname" id="surname"> <br>
            <span id="surname_error"> </span>

            Lozinka <br>
            <input type="password" name="pass1" id="pass1"> <br>
            <span id="pass1_error"> </span> 

            Ponovite lozinku <br>
            <input type="password" name="pass2" id="pass2"> <br>
            <span id="pass2_error"> </span> 

            <button type="submit" value="Pošalji" id="slanje"> Pošalji </button>

       </form>

       <?php

            include "../3 PHP_MySQL/connect.php";

            if(!empty($_POST['user']) && !empty($_POST['pass1']) && !empty($_POST['name'])
                && !empty($_POST['surname']) && !empty($_POST['pass2']) && $_POST['pass1'] == $_POST['pass2']) {

                $ime = $_POST['name'];
                $prezime = $_POST['surname'];
                $user = $_POST['user'];
                $pass = $_POST['pass1'];
                $razina = 0;
                $hashed = password_hash($pass, CRYPT_BLOWFISH);

                $upit2 = "SELECT korisnicko_ime from korisnik WHERE korisnicko_ime = ?";
                $stmt=mysqli_stmt_init($dbc);
                if (mysqli_stmt_prepare($stmt, $upit2)){

                    mysqli_stmt_bind_param($stmt,'s',$user);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);

                }

                if(mysqli_stmt_num_rows($stmt) > 0) {echo "Korisničko ime postoji!";}

                else {

                    $upit = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina) VALUES (?, ?, ?, ?, ?)";
                    $prolaz = false;

                    $stmt=mysqli_stmt_init($dbc);

                    if (mysqli_stmt_prepare($stmt, $upit)){

                        mysqli_stmt_bind_param($stmt,'ssssi',$ime, $prezime, $user, $hashed, $razina);
                        mysqli_stmt_execute($stmt);
                        $prolaz = true;

                    }

                    if($prolaz) {echo "Uspjesno ste se registrirali, " . $user;}
                    else {echo "Greška";}

                }

            }

            mysqli_close($dbc);

        ?>

        <script type="text/javascript">

            // Provjera forme prije slanja
            document.getElementById("slanje").onclick = function(event) {

                var slanjeForme = true;

                var user_polje = document.getElementById("user");
                var user = document.getElementById("user").value;

                if (user.length == 0) {

                    slanjeForme = false;
                    user_polje.style.border="1px solid red";
                    document.getElementById("user_error").style.color = "red";
                    document.getElementById("user_error").innerHTML="Korisničko ime mora biti uneseno! <br>";

                }

                else {

                    user_polje.style.border="1px solid green";
                    document.getElementById("user_error").innerHTML="";

                }


                var ime_polje = document.getElementById("name");
                var ime = document.getElementById("name").value;

                if (ime.length == 0) {

                    slanjeForme = false;
                    ime_polje.style.border="1px solid red";
                    document.getElementById("name_error").style.color = "red";
                    document.getElementById("name_error").innerHTML="Ime mora biti uneseno!<br>";

                } 

                else {

                    ime_polje.style.border="1px solid green";
                    document.getElementById("name_error").innerHTML="";

                }

                
                var prezime_polje = document.getElementById("surname");
                var prezime = document.getElementById("surname").value;

                if (prezime.length == 0) {

                    slanjeForme = false;
                    prezime_polje.style.border="1px solid red";
                    document.getElementById("surname_error").style.color = "red";
                    document.getElementById("surname_error").innerHTML="Prezime mora biti uneseno!<br>";

                } 
                
                else {

                    prezime_polje.style.border="1px solid green";
                    document.getElementById("surname_error").innerHTML="";

                }

                var pass1_polje = document.getElementById("pass1");
                var pass1 = document.getElementById("pass1").value;
                var pass2_polje = document.getElementById("pass2");
                var pass2 = document.getElementById("pass2").value;

                if (pass1.length == 0 || pass2.length == 0 || pass1 != pass2) {

                    slanjeForme = false;
                    pass1_polje.style.border="1px solid red";
                    pass2_polje.style.border="1px solid red";
                    document.getElementById("pass1_error").style.color = "red";
                    document.getElementById("pass2_error").style.color = "red";
                    document.getElementById("pass1_error").innerHTML="Lozinke nisu iste!<br>";
                    document.getElementById("pass2_error").innerHTML="Lozinke nisu iste!<br>";

                } 
                else {

                    pass1_polje.style.border="1px solid green";
                    pass2_polje.style.border="1px solid green";
                    document.getElementById("pass1_error").innerHTML="";
                    document.getElementById("pass2_error").innerHTML="";

                }

                if (slanjeForme != true) {
                    event.preventDefault();
                }

            };

        </script>
  
    </div>

    <footer>
       <p>Copyright 2019 Morgenpost Verlag GmbH</p>
    </footer>

</body>
</html>