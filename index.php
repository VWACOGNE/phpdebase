<?php
$metaTitle = 'Victor WACOGNE';
$metaDescription = 'CV de Monsieur WACOGNE victor';
include 'header.php';



if ($_GET["page"] == 'motocross') {
        include 'hobby.php';
                }
if ($_GET["page"] == 'plongée') {
        include 'hobbyp.php';
                }
if ($_GET["page"] == 'wake') {
        include 'hobbyw.php';
                }
else {
        include 'Accueil.php';
        }


include 'footer.php';
?>
