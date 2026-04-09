<?php

class PdoContact {

    public static function getLesDistributeurs() {
        $db = PdoConnexion::getPdoConnexion();

        $sql = "SELECT id, raison_sociale FROM distributeur";
        $res = $db->query($sql);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }

    public static function ajouterContact($nom, $prenom, $mail, $tel_fixe, $tel_portable, $privilegie, $id_distributeur) {
        try {
            $db = PdoConnexion::getPdoConnexion();
            $sql = "INSERT INTO contact (nom, prenom, mail, tel_fixe, tel_portable, privilegie, id_distributeur) 
                VALUES (:nom, :prenom, :mail, :tel_fixe, :tel_portable, :privilegie, :id_distributeur)";

            $req = $db->prepare($sql);

          
            $req->bindValue(':nom', $nom);
            $req->bindValue(':prenom', $prenom);
            $req->bindValue(':mail', $mail);
            $req->bindValue(':tel_fixe', $tel_fixe);
            $req->bindValue(':tel_portable', $tel_portable);
            $req->bindValue(':privilegie', $privilegie);
            $req->bindValue(':id_distributeur', $id_distributeur);

            return $req->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    public static function getLesContactsDistributeurs($cont) {
        try{
            $objPdo= PdoConnexion::getPdoConnexion();
            $req="select id, nom, prenom, mail, tel_fixe, tel_portable, privilegie from contact where id_distributeur=$cont";
            $res=$objPdo->query($req);
            $lesLignes=$res->fetchAll(PDO::FETCH_ASSOC);
            $res->closeCursor();
            return $lesLignes;
        }catch (Exception $ex){
            echo $ex->getMessage();
        }

    }

   
}   