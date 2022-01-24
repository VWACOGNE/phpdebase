<?php
$_G=filter_input(INPUT_GET, "page",FILTER_SANITIZE_ENCODED);

if (isset($_G)) {
    if ($_G == 'plongee') {
        $metaTitle = 'PLONGEE';
        $metaDescription = 'Activité détente de Monsieur WACOGNE victor';
        include 'header.php';
        include 'hobbyp.php';
    } elseif ($_G == 'wake') {
        $metaTitle = 'WAKEBOARD';
        $metaDescription = 'activité été de Monsieur WACOGNE victor';
        include 'header.php';
        include 'hobbyw.php';
    } elseif ($_G == 'accueil') {
        $metaTitle = 'Victor WACOGNE';
        $metaDescription = 'CV de Monsieur WACOGNE victor';
        include 'header.php';
        include 'Accueil.php';
    } elseif ($_G == 'motocross') {
        $metaTitle = 'MOTOCROSS';
        $metaDescription = 'Activité annuelle de Monsieur WACOGNE victor';
        include 'header.php';
        include 'hobby.php';
    } else {
        include 'header.php';
        include '404.php';
    }
} else {
    $metaTitle = 'ACCUEIL';
    $metaDescription = 'CV de Monsieur WACOGNE victor';
    include 'header.php';
    include 'Accueil.php';

}
include 'footer.php';




?>
