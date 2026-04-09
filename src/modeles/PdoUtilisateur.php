<?php
class PdoUtilisateur{   
    
    public static function getUtilisateur($login, $mdp) {
        $objPdo = PdoConnexion::getPdoConnexion();
        $req = "SELECT identifiant FROM utilisateur where identifiant = '$login' and mot_de_passe='$mdp'";
        $res = $objPdo->query($req);
        $utilisateur = $res->fetchAll();
        $res->closeCursor();
        return $utilisateur; 
    }
    public static function getAllUtilisateur() {
        $objPdo = PdoConnexion::getPdoConnexion();
        $req = "SELECT identifiant FROM utilisateur";
        $res = $objPdo->query($req);
        $utilisateurs = $res->fetchAll(PDO::FETCH_COLUMN);
        $res->closeCursor();
        return $utilisateurs; 
    }
}