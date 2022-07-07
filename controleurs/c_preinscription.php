<?php

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$idUtilisateur = $_SESSION['idUtilisateur'];
switch ($action) {
case 'afficheEnfants':
    $enfants=getEnfants($idUtilisateur);
    include 'vues/v_afficheEnfants.php';
    break;
case 'voirEtatFrais':
     $lesCles = array_keys($lesMois);
    break;

}
    ?>