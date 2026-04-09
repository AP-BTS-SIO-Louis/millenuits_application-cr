<?php
header('Content-Type: application/json; charset=UTF_8');
require_once '../modeles/PdoConnexion.php';
require_once '../modeles/PdoConsultation.php';
try{
    $Enregistrements= PdoConsultation::getLesInfosCompteRenduConsultation($_POST['info'], $_POST['debut'], $_POST['fin']);
    $donneesJSON=json_encode($Enregistrements);
    echo $donneesJSON;
}catch (Exception $e){
    echo $e->getMessage();
}