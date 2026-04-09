<?php
class PdoDistributeur {
    public static function getLesDistributeurs() {
        try{
            $objPdo= PdoConnexion::getPdoConnexion();
            $req="select id, raison_sociale from distributeur";
            $res=$objPdo->query($req);
            $lesValeurs=$res->fetchAll(PDO::FETCH_ASSOC);
            $res->closeCursor();
            return $lesValeurs;
        }catch (Exception $ex){
            echo $ex->getMessage();
        }

    }
}