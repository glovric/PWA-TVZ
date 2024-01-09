<?php

        include 'connect.php';
        
        if(!empty($_POST['naslov']) && !empty($_POST['ksadrzaj'])  && !empty($_POST['sadrzaj']) && !empty($_FILES['slika']['name']) && isset($_POST['kat'])) {
        
            $slika = $_FILES['slika']['name'];
            $naslov=$_POST['naslov'];
            $ksad=$_POST['ksadrzaj'];
            $sad=$_POST['sadrzaj'];
            $kat=$_POST['kat'];
            $date=date('d.m.Y.');
            $archive = false;

            if(isset($_POST['archive'])){
                $archive=true;
            }
            else{
                $archive=false;
            }
            

            if($dbc) {

                $target_dir = '../img/'.$slika;

                move_uploaded_file($_FILES["slika"]["tmp_name"], $target_dir);

                $upit = "INSERT INTO arhiva (naslov, sadrzaj, ksadrzaj, slika, kategorija, archive,
                datum) VALUES (?, ?, ?, ?, ?, ?, ?)";

                $stmt=mysqli_stmt_init($dbc);

                if (mysqli_stmt_prepare($stmt, $upit)){

                    mysqli_stmt_bind_param($stmt,'sssssis', $naslov, $sad, $ksad, $slika, $kat, $archive, $date);

                    mysqli_stmt_execute($stmt);

                    echo "Ubaceno u bazu";

                }

            }

            mysqli_close($dbc);

    }
?>
