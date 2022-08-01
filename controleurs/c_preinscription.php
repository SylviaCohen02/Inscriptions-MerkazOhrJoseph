<?php
 $idUtilisateur = $_SESSION['idUtilisateur'];
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
session_start();
//var_dump($idUtilisateur);


switch ($action) {
case 'afficheEnfants':
      //error_reporting(E_ALL); 
    echo'rr';
    echo 'bien0';
    $enfants= $pdo->getEnfants($idUtilisateur);
    var_dump($enfants);
    //include 'vues/v_preinscrireEnfants.php';
    break;
case 'inserePreinscrits':
    $enfants=$_POST['enfant'];
    break;
default:
        include 'vues/v_accueil.php';
        break;

}
    ?>