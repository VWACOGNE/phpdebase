<?php
session_start();

if (!isset($_SESSION["dateFirstVisit"])){
    $_SESSION["dateFirstVisit"]=date("Y-m-d-H:i:s");
}
if (!isset($_SESSION["countViewPag"])) {
    $_SESSION["countViewPag"] = 1;
}



$_G=filter_input(INPUT_GET, "page",FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_BACKTICK);

if (isset($_G)) {
    if ($_G == 'plongee') {
        $metaTitle = 'PLONGEE';
        $metaDescription = 'Activité détente de Monsieur WACOGNE victor';
        include 'header.php';
        include 'hobbyp.php';
        $_SESSION["countViewPag"] = $_SESSION["countViewPag"]+1;
    } elseif ($_G == 'wake') {
        $metaTitle = 'WAKEBOARD';
        $metaDescription = 'activité été de Monsieur WACOGNE victor';
        include 'header.php';
        include 'hobbyw.php';
        $_SESSION["countViewPag"] = $_SESSION["countViewPag"]+1;
    } elseif ($_G == 'accueil') {
        $metaTitle = 'Victor WACOGNE';
        $metaDescription = 'CV de Monsieur WACOGNE victor';
        include 'header.php';
        include 'Accueil.php';
        $_SESSION["countViewPag"] = $_SESSION["countViewPag"]+1;
    } elseif ($_G == 'motocross') {
        $metaTitle = 'MOTOCROSS';
        $metaDescription = 'Activité annuelle de Monsieur WACOGNE victor';
        include 'header.php';
        include 'hobby.php';
        $_SESSION["countViewPag"] = $_SESSION["countViewPag"]+1;
    } elseif ($_G == 'contact') {
        $metaTitle = 'CONTACT';
        $metaDescription = 'contacter Monsieur WACOGNE victor';
        include 'header.php';
        include 'contact.php';
        $_SESSION["countViewPag"] = $_SESSION["countViewPag"]+1;
    } else {
        include 'header.php';
        include '404.php';
        $_SESSION["countViewPag"] = $_SESSION["countViewPag"]+1;
    }
} else {
    $metaTitle = 'ACCUEIL';
    $metaDescription = 'CV de Monsieur WACOGNE victor';

    include 'Accueil.php';
    $_SESSION["countViewPag"] = $_SESSION["countViewPag"]+1;

}
include 'footer.php';
echo $date;




?>
