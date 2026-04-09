<?php

class PdoConsultation {

    public static function getLesCommercialsConsultation() {
        try {
            $objPdo = PdoConnexion::getPdoConnexion();
            $req = "select id, nom, prenom from commercial";
            $res = $objPdo->query($req);
            $lesValeurs = $res->fetchAll(PDO::FETCH_ASSOC);
            $res->closeCursor();
            return $lesValeurs;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public static function getLesInfosCompteRenduConsultation($info, $debut, $fin) {
        try {
            $objPdo = PdoConnexion::getPdoConnexion();
            $req = "SELECT 
                distributeur.raison_sociale AS nom_distrib, 
                contact.nom AS nom_contact, 
                contact.prenom AS prenom_contact, 
                visite.date_visite AS date_vis, 
                visite.coefConfiance AS coef, 
                motif.libelle_motif AS motif_lib
                FROM visite 
                INNER JOIN distributeur ON visite.id_distributeur = distributeur.id 
                INNER JOIN contact ON visite.id_contact = contact.id 
                INNER JOIN motif ON visite.id_motif = motif.id_motif
                WHERE visite.id_commercial =$info and visite.date_visite between '$debut' AND '$fin'";
            $res = $objPdo->query($req);
            $lesLignes = $res->fetchAll(PDO::FETCH_ASSOC);
            $res->closeCursor();
            return $lesLignes;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
