﻿<?php session_start(); ?>


<?php
$thisPage = 'connexion';

// si le bouton connexion a été appuyé
if(isset($_POST['connexion']))
{
    // Si les 2 champs sont remplis
    if($_POST['user_email'] != '' && $_POST['user_mdp'] != '')
    {
        require('../include/PDO.php');
        $c = new Connexion();
        $rep = $c->verif_user($_POST['user_email'], sha1($_POST['user_mdp']));

        if($rep != NULL)
        {
            $_SESSION['user_id'] = $rep['user_id'];
            $_SESSION['user_nom'] = $rep['user_nom'];
            $_SESSION['user_prenom'] = $rep['user_prenom'];
            $_SESSION['user_email'] = $rep['user_email'];
            $_SESSION['forme_juridique'] = $rep['forme_juridique'];
            $_SESSION['siret'] = $rep['siret'];
            $_SESSION['secteur_act'] = $rep['secteur_act'];
            $_SESSION['user_tel'] = $rep['user_tel'];
            $_SESSION['user_rue'] = $rep['user_rue'];
            $_SESSION['user_cp'] = $rep['user_cp'];
            $_SESSION['user_ville'] = $rep['user_ville'];
            $_SESSION['user_mdp'] = $rep['user_mdp'];
            $_SESSION['user_admin'] = $rep['user_admin'];

           //lien user à mettre

            header('Location: ../BO/administration.php');
            exit();
        }
        else
        {
            $erreur = "<br/><br/><br/><br/><div style='font-size: 30px; text-align: center; color: red;'>L'email ou le mot de passe est incorrect !</div>";
        }
    }
    else
    {
        $erreur = "<br/><br/><br/><br/><div style='font-size: 30px; text-align: center; color: red;'>Tous les champs sont obligatoires !</div>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<head>
	<!-- Basics -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
         <link rel="icon" href="../favicon.ico" type="image/x-icon">
	<title>Connexion</title>
	<!-- CSS Login -->
        <link rel="stylesheet" href="../css/reset.css">
        <link rel="stylesheet" href="../css/animate.css">
        <link rel="stylesheet" href="../css/styles.css">
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css" type="text/css">
	<!-- Plugin CSS -->
	<link rel="stylesheet" href="../css/animate.min.css" type="text/css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="../css/creative.css" type="text/css">
</head>
    </head>
<body>

<a href="../../index.php">Revenir au site</a>

    <?php if(isset($erreur)){echo $erreur;} ?>
    <br/>
    <div id="container">
    <form method="post" action="connexion.php">
        <label>Adresse e-mail : </label>
        <input type="text" name="user_email" value="<?php if(isset($_POST['user_email'])){echo $_POST['user_email'];} ?>" />
	<label>Mot de passe : </label>
	<p><a href="#">Mot de passe oublié ?</a></p>
        <input type="password" name="user_mdp" value="<?php if(isset($_POST['user_mdp'])){echo $_POST['user_mdp'];} ?>" />
        <input type="submit" value="Valider" name="connexion" />
    </form>
</div>
<!-- Pied de page de la page -->

</body>
</html>
<!-- jQuery -->
    <script src="../js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
    <script src="../js/jquery.easing.min.js"></script>
    <script src="../js/jquery.fittext.js"></script>
    <script src="../js/wow.min.js"></script>

<!-- Custom Theme JavaScript -->
    <script src="../js/creative.js"></script>
