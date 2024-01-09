<?php

    header('Content-Type: text/html; charset=utf-8');

    $server = "localhost";
    $user = "root";
    $pass = "";
    $base = "pwa";

    $dbc = mysqli_connect($server, $user, $pass, $base) or
    die('Error connecting to MySQL server.'. mysqli_connect_error());

    mysqli_set_charset($dbc, "utf8");

?>
