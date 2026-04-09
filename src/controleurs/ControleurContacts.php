<?php

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'saisirContact';

switch ($action) {
    case 'saisirContact':
        $lesDistributeurs = PdoContact::getLesDistributeurs();
        include 'vues/vues_contacts/v-ajouter-contact.php';
        break;

    
    case 'validerSaisieContact':
       
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['mail'];
        $id_distributeur = $_POST['id_distributeur'];

        
        $tel_fixe = !empty($_POST['tel_fixe']) ? $_POST['tel_fixe'] : null;
        $tel_portable = !empty($_POST['tel_portable']) ? $_POST['tel_portable'] : null;

        
        $privilegie = isset($_POST['privilegie']) ? 1 : 0;

        
        $reussite = PdoContact::ajouterContact($nom, $prenom, $mail, $tel_fixe, $tel_portable, $privilegie, $id_distributeur);

        
        if ($reussite) {
            echo "<div class='alert alert-success'>Le contact a été ajouté avec succès !</div>";
        } else {
            echo "<div class='alert alert-danger'>Erreur lors de l'ajout du contact.</div>";
        }

        
        $lesDistributeurs = PdoContact::getLesDistributeurs();
        include 'vues/vues_contacts/v-ajouter-contact.php';
        break;
}