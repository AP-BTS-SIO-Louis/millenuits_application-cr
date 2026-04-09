<?php
        session_start();
        require_once 'modeles/PdoConnexion.php';
        require_once 'modeles/PdoUtilisateur.php';
        require_once 'modeles/PdoContact.php';
        require_once 'modeles/PdoDistributeur.php';
        require_once 'modeles/PdoConsultation.php';
        
        include 'vues/vues_millenuits/v-nav.php';

        if (!isset($_REQUEST['uc'])) {
            $_REQUEST['uc'] = 'accueil';
        }
        $uc = htmlspecialchars($_REQUEST["uc"]);
        switch ($uc) {
            case 'authentification':
                include 'controleurs/ControleurAuthentification.php';
                break;
            case 'ajouter-contact':
                include 'controleurs/ControleurContacts.php';
                break;
            case 'list-contact':
                $lesDistributeurs= PdoDistributeur::getLesDistributeurs();
                include 'vues/vues_contacts/v-list-contact.php';
                break;
            case 'consultation-compte-rendu':
                $lesCompteRenduCommercial= PdoConsultation::getLesCommercialsConsultation();
                include 'vues/vues_consultation/v-compte-rendu-commercial.php';
                break;
            default:
                include 'vues/vues_millenuits/v-accueil.php';
                break;
        }
        ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Initiation MVC</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" 
              integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>

</html>
