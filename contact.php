<?php

$Form_Cellule_Filter = [
    'user_name' => FILTER_SANITIZE_STRING,
    'user_surname' => FILTER_SANITIZE_STRING,
    'user_mail' => FILTER_VALIDATE_EMAIL,
    'case' => FILTER_DEFAULT,
    'case2' => FILTER_DEFAULT,
    'user_message' => FILTER_DEFAULT,

];
$Cellule = filter_input_array(INPUT_POST, $Form_Cellule_Filter);
$submit = filter_input(INPUT_POST, 'envoyer');
$date = date("Y-m-d-H-i-s");
$message = 'erreur de saisie';
$message1 = 'saisir minimum 5 caractères';
if (($submit == 'Envoyer')) {
    $nombredelettre = strlen($Cellule['user_message']);
    $civilite = ($Cellule['case'] == "Mme") || ($Cellule['case'] == "Mr");
    $optiondecontact = (($Cellule['case2'] == "proposition d'emploi") || ($Cellule['case2'] == "demande d'information") || ($Cellule['case2'] == "prestations"));
}
$formErrors = ['case2' => 'Saisir une option valide',
    'case_erreur' => 'Nous avons détecté un problème dans votre saisie',
    'user_mail' => 'Saisir une adresse Email valide',
    'case' => 'Saisir Mme ou Mr',
    'user_name' => 'erreur de saisie nom',
    'user_surname' => 'erreur de saisie prenom',
    'user_message' => 'saisir minimum 5 caractères'];

if (($submit == 'Envoyer')
    && !empty($Cellule['user_name'])
    && !empty($Cellule['user_surname'])
    && !empty($Cellule['case'])
    && $optiondecontact
    && $civilite
    && !empty($Cellule['user_mail'])
    && !empty($Cellule['user_message'])
    && ($nombredelettre > 5)) {
    file_put_contents('contact/contact' . $date . '.txt',
        "civilité:" . $Cellule['case'] . "\n" .
        "Nom:" . $Cellule['user_name'] . "\n" .
        "Prénom:" . $Cellule['user_name'] . "\n" .
        "Adresse Email:" . $Cellule['user_mail'] . "\n" .
        "Objet du contact:" . $optiondecontact . "\n" .
        "Message:" . $Cellule['user_message']);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <style>
        form {
            /* Uniquement centrer le formulaire sur la page */
            text-align: center;
            width: auto;
            /* Encadré pour voir les limites du formulaire */
        }

        form div + div {
            margin-top: 1em;
        }

        label {
            /* Pour être sûrs que toutes les étiquettes ont même taille et sont correctement alignées */
            display: inline-block;
            width: 90px;
            text-align: right;
        }

        .inputt,
        textarea {
            /* Pour s'assurer que tous les champs texte ont la même police.
     Par défaut, les textarea ont une police monospace */
            font: 1em sans-serif;

            /* Pour que tous les champs texte aient la même dimension */
            width: 550px;
            box-sizing: border-box;

            /* Pour harmoniser le look & feel des bordures des champs texte */
            border: 1px solid #999;
        }

        textarea {
            /* Pour aligner les champs texte multi‑ligne avec leur étiquette */
            vertical-align: top;

            /* Pour donner assez de place pour écrire du texte */
            height: 5em;
        }

        .button {
            text-align: center;
            margin-top: 20px;
        }

        body {
            background: radial-gradient(#000000, #333333);
            background-position: center;
            background-size: cover;
            color: #CCC;
            margin: 0%;
        }

        .buttonformulaire {
            background-color: rgb(166, 190, 206);
        }

        .buttonformulaire:hover {
            background-color: rgb(139, 151, 175);
        }

        .buttonformulaire:active {
            box-shadow: inset -2px -2px 3px rgba(255, 255, 255, .6),
            inset 2px 2px 3px rgba(0, 0, 0, .6);
        }

        h1 {
            text-align: center;
            margin-top: 0;
        }

        label {
            font: 1rem 'Fira Sans', sans-serif;
            text-align: center;
        }

        .manwoman {
            text-align: center;
            margin-top: 6px;
        }

        .statut {
            text-align: center;
        }

        input {
            margin: .4em;
        }

        .selection {
            text-align: center;
        }

        .buttonreturn {
            margin-top: 10px;
            background-color: transparent;
            border-color: wheat;
            border-radius: 50%;
        }

        .contactreturn {
            width: 40px;
            height: 40px;
            margin-top: 6px;
        }
    </style>
</head>
<body>
<button class="buttonreturn">
    <a onclick="history.go(-1)"><img class="contactreturn"
                                     src="http://www.diverresite.fr/Fleche-blanche-gauche.png">
    </a>
</button>
<h1>Formulaire de contact</h1>

<div class="formulaire">

    <form action="index.php?page=contact" method="post">

        <div class="manwoman">
            <div>
                <input id="Mme" type="radio" name="case" value="Mme">
                <label for="Mme">Mme</label>
                <input type="radio" id="Mr" name="case" value="Mr">
                <label for="Mr">Mr</label>
                <?php if (isset($submit) && (empty($Cellule['case']))) : ?>
                    <p> <?php echo $formErrors['case'] ?> </p>
                <?php elseif (isset($submit) && (!$civilite)) : ?>
                    <p> <?php echo $formErrors['case_erreur'] ?> </p>
                <?php endif; ?>
            </div>

        </div>
        <div>
            <label for="name">Nom :</label>
            <input class="inputt" type="text" id="name" name="user_name">
            <?php if (isset($submit) && (empty($Cellule['user_name']))) : ?>
                <p> <?php echo $formErrors['user_name'] ?> </p>
            <?php
            endif;
            ?>
        </div>

        <div>
            <label for="surname">Prenom :</label>
            <input class="inputt" type="text" id="surname" name="user_surname">
            <?php if (isset($submit) && (empty($Cellule['user_surname']))) : ?>
                <p> <?php echo $formErrors['user_surname'] ?> </p>
            <?php
            endif;
            ?>
        </div>

        <div>
            <label for="mail">E-mail :</label>
            <input class="inputt" type="email" id="mail" name="user_mail">
            <?php if (isset($submit) && (empty($Cellule['user_mail']))) : ?>
                <p> <?php echo $formErrors['user_mail'] ?> </p>
            <?php
            endif;
            ?>
        </div>

        <div>
            <input id="proposition d'emploi" type="radio" name="case2" value="proposition d'emploi"
                   style="margin-left: 50px">
            <label for="proposition d'emploi">Proposition d'emploi</label>
            <input id="demande d'information" type="radio" name="case2" value="demande d'information"
                   style="margin-left: 50px">
            <label for="demande d'information">Demande d'information</label>
            <input id="prestations" type="radio" name="case2" value="prestations" style="margin-left: 50px">
            <label for="prestations">Prestations</label>
            <?php if (isset($submit) && ((!isset($optiondecontact)))) : ?>
                <p> <?php echo $formErrors['case2'] ?> </p>
            <?php elseif (isset($submit) && (!$optiondecontact)) : ?>
                <p> <?php echo $formErrors['case_erreur'] ?> </p>
            <?php endif; ?>
        </div>

        <div>
            <label for="msg">Message :</label>
            <textarea id="msg" name="user_message"></textarea>
            <?php

            if (isset($submit) && (empty($Cellule['user_message']) || ($nombredelettre < 5))) :?>
                <p> <?php echo $formErrors['user_message'] ?> </p>
            <?php
            endif;
            ?>
        </div>

        <div class="button">
            <input class="buttonformulaire" type="submit" name="envoyer" value="Envoyer">
        </div>
    </form>
</div>
</body>
</html>
