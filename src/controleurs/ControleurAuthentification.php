<?php
if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'accueil';
}
$action = htmlspecialchars($_REQUEST["action"]);

switch ($action) {
    case "se_connecter":
        include 'vues/vues_millenuits/v-connexion.php';
        break;
    case "valid_connexion":
        $login = htmlspecialchars($_POST["identifiant"]);
        $mdp = htmlspecialchars(hash('sha512',$_POST["mot_de_passe"]));
        
        $result = PdoUtilisateur::getUtilisateur($login,$mdp);
        if($result) {
            $_SESSION['identifiant'] = $result[0]["identifiant"];
            header('Location: index.php');
        } else {
            session_destroy();
            include 'vues/vues_millenuits/v-connexion.php';
        }
        break;
    case "se_deconnecter":
        session_destroy();
        header('Location: index.php');
        break;
}