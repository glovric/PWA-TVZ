<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
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
                <li><a href="administracija.php">ADMINISTRACIJA</a></li>
            </ul>

        </nav>
    </header>

    <div class="container"> 

       <form method="post" action="">

            Korisničko ime <br>
            <input type="text" name="user" id="user"> <br>
            <span id="user_error"> </span>

            Lozinka <br>
            <input type="password" name="pass" id="pass"> <br>
            <span id="pass_error"> </span>

            <button type="submit" value="Pošalji" id="slanje"> Pošalji </button>

       </form>

       <?php

            session_start();
            include "../3 PHP_MySQL/connect.php";
            $prolaz = false;

            if(!empty($_POST['user']) && !empty($_POST['pass'])) {

                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $razina = 0;
                $hashed = "";

                $upit = "SELECT lozinka, razina FROM korisnik WHERE korisnicko_ime = ?";
                $stmt=mysqli_stmt_init($dbc);
                
                if (mysqli_stmt_prepare($stmt, $upit)){

                    mysqli_stmt_bind_param($stmt,'s',$user);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);

                }

                mysqli_stmt_bind_result($stmt, $hashed, $razina);
                mysqli_stmt_fetch($stmt);

                if(password_verify($pass, $hashed)) {
                    $prolaz = true;
                }
                
                if($prolaz == true) {
                    $_SESSION['user'] = $user;
                    $_SESSION['razina'] = $razina;
                    $_SESSION['login'] = true;
                    header("Location: ../3 PHP_MySQL/administracija.php");
                }
                else {
                    echo "Niste registrirani. Za registraciju kliknite
                     <a href='../5 SWA/registracija.php' style='color: black;'>ovdje</a>";
                }
                
                mysqli_close($dbc);
                
            }

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


                var pass_polje = document.getElementById("pass");
                var pass = document.getElementById("pass").value;

                if (pass.length == 0) {

                    slanjeForme = false;
                    pass_polje.style.border="1px solid red";
                    document.getElementById("pass_error").style.color = "red";
                    document.getElementById("pass_error").innerHTML="Lozinka ne smije biti prazna!<br>";

                } 

                else {

                    pass_polje.style.border="1px solid green";
                    document.getElementById("pass_error").innerHTML="";

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