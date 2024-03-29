<?php
/**
 * @file modifierClient.php
 * @author Kolomiets Elena et Paireli Elena
 * @version 1.0
 * @date xx Janvier 2019
 * @brief La page qui permet à l'administrateur de modifier un client.
*/

require_once("../inc/connectDB.php");
require_once("../inc/sql.php");        
session_start();
$succes = 0;
$id = $_GET['id'];
$row = lireUtilisateur($conn, $id);
if (isset($_POST['envoi'])) {
    // contrôles des champs saisis
    $erreurs = array();
    
    $utilisateur_nom = trim($_POST['utilisateur_nom']);
    $utilisateur_prenom = trim($_POST['utilisateur_prenom']);
    $utilisateur_adress= trim($_POST['utilisateur_adress']);
    $utilisateur_courriel = trim($_POST['utilisateur_courriel']);
    $utilisateur_motdepass = trim($_POST['utilisateur_motdepass']);
     
    if (count($erreurs) === 0) {
        if (modifierUtilisateur($conn, $id, $utilisateur_nom, $utilisateur_prenom, $utilisateur_adress,          $utilisateur_courriel, $utilisateur_motdepass) === 1) {
            $retSQL="Modification effectué.<br><h2>Pour effectuer une nouvelle modification veuiller retourner aux <a href='gererClients'>Clients</a></h2>";
            $succes = 1;
             } else {
                      $retSQL ="Modification non effectué.";
                      $succes = 1;
            
                    }
        
        }
   
        } else {
                $id = isset($_GET['id']) ? $_GET['id'] : "";                
                $row = array();
                if ( $id !== "" ) $row = lireUtilisateur($conn, $id);
               }

?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <title>Club sportif</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <!-- Mobile viewport -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="../css/all.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Varela" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Michroma" rel="stylesheet">
        <link rel="stylesheet" href="../css/normalize.css">
        <link rel="stylesheet" href="../css/styles.css">
    </head>

    <body>
        <header>

            <div class="container">
                <div class="top-container">
                    <div class="logo"><a href="../index.html"><img src="../images/logo-min.png" alt="logo" /></a></div>
                    <div class="slogan">
                        <a href="deconnexion.php"><input class="registration" id="registration" type="button" name="registration" formaction="registration.php" value="déconnexion" /> </a>
                        <h1>BIENVENUE!</h1>
                    </div>
                </div>

                <div class="nav-container">
                    <div class="navigation">
                        <div>
                            <div class="nav">
                                <div><a href="../index.php">ACCUEUIL</a></div>
                                <div><a href="admin.php">ACTIVITÉS</a></div>
                                <div><a href="gererAnimateurs.php">ANIMATEURS</a></div>
                                <div><a class="actif" href="gererClients.php">CLIENTS</a></div>
                                <div><a href="gererInscriptions.php">INSCRIPTIONS</a></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </header>
        <main>
            <div class="admin">
                <h1>Modifiez les données du client : </h1>

                <p>
                    <?php echo isset($retSQL) ? $retSQL : "&nbsp;" ?>
                </p>
                <?php if(!$succes) : ?>
                <form action="" method="post">
                    <label>Nom : </label>
                    <input type="text" name="utilisateur_nom" value="<?php echo $row['utilisateur_nom'] ?>" required><br>
                    <label>Prénom : </label>
                    <input type="text" name="utilisateur_prenom" value="<?php echo $row['utilisateur_prenom'] ?>" required><br>
                    <label>Adresse : </label>
                    <input type="text" name="utilisateur_adress" value="<?php echo $row['utilisateur_adress'] ?>" required><br>
                    <label>Courriel : </label>
                    <input type="text" name="utilisateur_courriel" value="<?php echo $row['utilisateur_courriel'] ?>" required><br>
                    <label>Mot de passe : </label>
                    <input type="text" name="utilisateur_motdepass" value="<?php echo $row['utilisateur_motdepass'] ?>" required><br>
                    <br>
                    <input class="envoi" type="submit" name="envoi" value="modifier" />
                </form>
                <?php endif; ?>
            </div>

        </main>
        <footer>
            <div class="footer">
                <div>
                    <h3>Contactez-nous :</h3>
                    <p>3200, rue Decelle</p>
                    <p>H4T E5E</p>
                    <p>tel : 514 234 5678</p>
                </div>

                <div>
                    <h3>Crédits :</h3>
                    <p><a href="https://www.pexels.com/photo/grass-sport-game-match-47730/" target="_blank">Image entête</a></p>
                    <p><a href="https://pixabay.com/en/social-icons-enjoy-2412656/" target="_blank">Images réseau sociaux</a></p>
                </div>
                <div>
                    <p>
                        <a href="#"><img src="../images/fb.png" alt="fb" /></a>
                        <a href="#"><img src="../images/inst.png" alt="fb" /></a>
                        <a href="#"><img src="../images/twiter.png" alt="fb" /></a></p>
                    <p id="copyright">&copy; E&amp;E</p>
                </div>
            </div>
        </footer>
    </body>

    </html>
