<?php
//$linkconx = mysqli_connect('mysql.demos.rinoceronte.mx', 'miguelolivera', 'M1gu3l$0l1v3r4', 'mapausg_db');
$linkconx = mysqli_connect('mysql.demos.rinoceronte.mx', 'chilenpolvo', 'Ch1l3nP0lv02021', 'mapausg_db');
//$linkconx = mysqli_connect('localhost', 'root', 'root$0l1v3r4', 'mapausg_db');
mysqli_query($linkconx, "SET NAMES 'utf8'");
date_default_timezone_set('America/Mexico_City');
?>