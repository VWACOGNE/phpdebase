

<?php
$metaTitle = 'Victor WACOGNE';
$metaDescription = 'CV de Monsieur WACOGNE victor';


if (isset($_GET['page'])) {


        if ($_GET["page"] == 'plongée') {
                $metaTitle = 'PLONGEE';
                $metaDescription = 'Activité détente de Monsieur WACOGNE victor';
                include 'header.php';
                include 'hobbyp.php';
                include 'footer.php';
        } elseif ($_GET["page"] == 'wake') {
                $metaTitle = 'WAKEBOARD';
                $metaDescription = 'activité été de Monsieur WACOGNE victor';
                include 'header.php';
                include 'hobbyw.php';
                include 'footer.php';
        } elseif ($_GET["page"] == 'accueil') {
                $metaTitle = 'Victor WACOGNE';
                $metaDescription = 'CV de Monsieur WACOGNE victor';
                include 'header.php';
                include 'Accueil.php';
                include 'footer.php';
        } elseif ($_GET["page"] == 'motocross') {
                $metaTitle = 'MOTOCROSS';
                $metaDescription = 'Activité annuelle de Monsieur WACOGNE victor';
                include 'header.php';
                include 'hobby.php';
                include 'footer.php';
        } else{
                include 'header.php';
                include '404.php';
                include 'footer.php';
        }
} else{
        $metaTitle = 'ACCUEIL';
        $metaDescription = 'CV de Monsieur WACOGNE victor';
        include 'header.php';
        include 'Accueil.php';
        include 'footer.php';
}



?>
