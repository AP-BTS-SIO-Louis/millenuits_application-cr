<?php
header('Content-Type: application/json; charset=UTF_8');
require_once '../modeles/PdoConnexion.php';
require_once '../modeles/PdoContact.php';
try{
    $Enregistrements= PdoContact::getLesContactsDistributeurs($_POST['cont']);
    $donneesJSON=json_encode($Enregistrements);
    echo $donneesJSON;
}catch (Exception $e){
    echo $e->getMessage();
}