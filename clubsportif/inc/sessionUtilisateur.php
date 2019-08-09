<?php
  /**
 * @file sessionUtilisateur.php
 * @author Kolomiets Elena et Paireli Elena
 * @version 1.0
 * @date 23 Janvier 2019
 * @brief La page qui permet l'ouverture de la session.
*/
  
session_start();

// echo "<pre>".print_r($_COOKIE, true)."</pre>";
// echo session_id();

if (!isset($_SESSION['identifiant_utilisateur'])) {
    // redirection vers la page authentification.php
    // pour la saisie de l'identifiant et du mot de passe 
    header('Location: dossier.php'); }

?>