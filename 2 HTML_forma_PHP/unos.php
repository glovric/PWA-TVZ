<!DOCTYPE html>
<html lang="en">
<head>
  <title>Unos</title>
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

        <form action="skripta.php" method="post" enctype="multipart/form-data">

            Naslov vijesti <br>
            <input type="text" name="naslov" id="naslov"> <br>
            <span id="naslov_error"> </span> 

            Kratki sadržaj vijesti <br>
            <textarea name="ksadrzaj" id="ksadrzaj" cols="30" rows="10" ></textarea> <br>
            <span id="ksad_error"> </span> 

            Sadržaj vijesti <br>
            <textarea name="sadrzaj" id="sadrzaj" cols="30" rows="10" ></textarea> <br>
            <span id="sad_error"> </span> 

            Slika: <br>
            <input type="file" name="slika" id="slika"> <br>
            <span id="slika_error"> </span> 

            Kategorija vijesti: <br>
            <select name="kat" size="2" id="kat" style="width: 150px; height: 55px;">
                <option value="" disabled selected>Odabir kategorije</option>
                <option value="Reise">Reise</option>
                <option value="Verbraucher">Verbraucher</option>
            </select> <br> <br>
            <span id="kat_error"> </span> 

            Spremiti u arhivu? <br>
            <input type="checkbox" name="archive"> <br> <br>

            <button type="reset" value="Poništi"> Poništi </button>
            <button type="submit" value="Prihvati" id="slanje"> Prihvati </button>

        </form>

    </div>

    <script type="text/javascript">

        // Provjera forme prije slanja
        document.getElementById("slanje").onclick = function(event) {

            var slanjeForme = true;

            var naslov_polje = document.getElementById("naslov");
            var naslov = document.getElementById("naslov").value;

            if (naslov.length < 5 || naslov.length > 30) {

                slanjeForme = false;
                naslov_polje.style.border="1px solid red";
                document.getElementById("naslov_error").style.color = "red";
                document.getElementById("naslov_error").innerHTML="Naslov vijesti mora imati između 5 i 30 znakova!<br>";

            }

            else {

                naslov_polje.style.border="1px solid green";
                document.getElementById("naslov_error").innerHTML="";

            }


            var ksad_polje = document.getElementById("ksadrzaj");
            var ksad = document.getElementById("ksadrzaj").value;

            if (ksad.length < 10 || ksad.length > 100) {

                slanjeForme = false;
                ksad_polje.style.border="1px solid red";
                document.getElementById("ksad_error").style.color = "red";
                document.getElementById("ksad_error").innerHTML="Kratki sadržaj mora imati između 10 i 100 znakova!<br>";

            } 

            else {

                ksad_polje.style.border="1px solid green";
                document.getElementById("ksad_error").innerHTML="";

            }

            // Sadržaj mora biti unesen
            var sad_polje = document.getElementById("sadrzaj");
            var sad = document.getElementById("sadrzaj").value;

            if (sad.length == 0) {

                slanjeForme = false;
                sad_polje.style.border="1px solid red";
                document.getElementById("sad_error").style.color = "red";
                document.getElementById("sad_error").innerHTML="Sadržaj mora biti unesen!<br>";

            } 
            
            else {

                sad_polje.style.border="1px solid green";
                document.getElementById("sad_error").innerHTML="";

            }

            // Slika mora biti unesena

            var slika_polje = document.getElementById("slika");
            var slika = document.getElementById("slika").value;

            if (slika.length == 0) {

                slanjeForme = false;
                slika_polje.style.border="1px solid red";
                document.getElementById("slika_error").style.color = "red";
                document.getElementById("slika_error").innerHTML="Slika mora biti unesena!<br>";

            } 
            else {

                slika_polje.style.border="1px solid green";
                document.getElementById("slika_error").innerHTML="";

            }

            // Kategorija mora biti odabrana

            var kat_polje = document.getElementById("kat");

            if(document.getElementById("kat").selectedIndex == 0) {

                slanjeForme = false;
                kat_polje.style.border="1px solid red";
                document.getElementById("kat_error").style.color = "red";
                document.getElementById("kat_error").innerHTML="Kategorija mora biti odabrana!<br>";

            } 

            else {

                kat_polje.style.border="1px solid green";
                document.getElementById("kat_error").innerHTML="";

            }

            if (slanjeForme != true) {
                event.preventDefault();
            }

        };

    </script>

    <footer>
       <p>Copyright 2019 Morgenpost Verlag GmbH</p>
    </footer>

</body>
</html>
