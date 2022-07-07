<?php

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$idUtilisateur = $_SESSION['idUtilisateur'];
switch ($action) {
case 'selectionnerMois':

    $moisASelectionner = $lesCles[0];
    include 'vues/v_listeMois.php';
    break;
case 'voirEtatFrais':
     $lesCles = array_keys($lesMois);
    break;

}
    ?>