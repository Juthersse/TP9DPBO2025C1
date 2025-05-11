<?php
include("view/TampilMahasiswa.php");

if (isset($_GET['nim'])) {
    $prosesmhs = new ProsesMahasiswa();
    $prosesmhs->prosesDeleteMahasiswa($_GET['nim']);
}

header("location: index.php");