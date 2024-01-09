<!DOCTYPE html>
<html lang="en">
<head>
  <title>Administracija</title>
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

            session_start();

            if($_SESSION['login'] && $_SESSION['razina'] == 1) {

                include 'connect.php';
                $upit = "SELECT * FROM arhiva";
                $rez = mysqli_query($dbc, $upit);

                while($row = mysqli_fetch_array($rez)) {

                    echo "<form enctype='multipart/form-data' action='' method='POST'>

                    Naslov: <br> 
                    <input type='text' name='naslov' value='" . $row['naslov'] ."'> <br>
                    Kratki sadržaj vijesti <br> 
                    <textarea name='ksadrzaj' cols='30' rows='10'>" . $row['ksadrzaj'] . "</textarea> <br>
                    Sadržaj vijesti <br>
                    <textarea name='sadrzaj' cols='30' rows='10'>" . $row['sadrzaj'] . "</textarea> <br>
                    Slika <br>
                    <input type='file' id='slika' value='" . $row['slika'] . "' name='slika'/> <br><img src='" . "../img/" . $row['slika'] . "' width=100px>
                    <br>
                    Kategorija <br>
                    <select name='kat' value='" . $row['kategorija'] .  "'>
                    <option value='Reise'>Reise</option>
                    <option value='Verbraucher'>Verbraucher</option>
                    </select> <br>
                    Spremiti u arhivu? <br>";

                    if($row['archive'] == 0) {
                        echo '<input type="checkbox" name="archive"/> <br>';
                        } else {
                        echo '<input type="checkbox" name="archive" id="archive"
                    checked/> <br>';
                        }

                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>
                        <button type='reset' value='Poništi'>Poništi</button>
                        <button type='submit' name='update' value='Prihvati'>
                        Izmjeni</button>
                        <button type='submit' name='delete' value='Izbriši'>
                        Izbriši</button> </form>
                        <hr style='border: 3px solid red;border-radius: 5px;'>";
                        
                }

                if(isset($_POST['delete'])){
                    $id=$_POST['id'];
                    $query = "DELETE FROM arhiva WHERE id='$id'";
                    $result = mysqli_query($dbc, $query);
                    echo "<meta http-equiv='refresh' content='0'>";
                }

                if(isset($_POST['update'])){

                    $slika = $_FILES['slika']['name'];
                    $naslov=$_POST['naslov'];
                    $ksad=$_POST['ksadrzaj'];
                    $sad=$_POST['sadrzaj'];
                    $kat=$_POST['kat'];
                    $archive = false;

                    if(isset($_POST['archive'])){
                        $archive=true;
                    }
                    else{
                        $archive=false;
                    }
                    
                    $target_dir = '../img/'.$slika;

                    move_uploaded_file($_FILES["slika"]["tmp_name"], $target_dir);

                    $id=$_POST['id'];

                    $query = "UPDATE arhiva SET naslov='$naslov', ksadrzaj='$ksad', sadrzaj='$sad',
                    slika='$slika', kategorija='$kat', archive='$archive' WHERE id='$id'";
                    $result = mysqli_query($dbc, $query);

                    echo "<meta http-equiv='refresh' content='0'>";                

                }
        
                mysqli_close($dbc);

            }

            else if($_SESSION['login'] && $_SESSION['razina'] == 0) {
                echo '<p>Bok ' . $_SESSION['user'] . '! Uspješno ste prijavljeni, ali niste administrator.</p>';
            }

            else {header("Location: ../5 SWA/login.php");}


        ?>
  
    </div>

    <footer>
       <p>Copyright 2019 Morgenpost Verlag GmbH</p>
    </footer>

</body>
</html>