<?php

/**
 * Index du projet
 *
 * @author    Sylvia Cohen <tsyviaco@gmail.com>
 */
require_once 'includes/pdoMoj.php';
require_once 'includes/fonctions.php';
session_start();

$pdo = pdoMoj::getBddMoj();
/*$estAdminConnecte = estAdminConnecte();
$estUserConnecte = estUtilisateurConnecte();
*/
$estConnecte= estConnecte();

//require 'vues/v_navigation.php';
$uc = filter_input(INPUT_GET, 'uc', FILTER_SANITIZE_STRING);

if ($uc && !$estConnecte){ //if(($uc && empty($estAdminConnecte))||($uc && empty($estUserConnecte))) {
    $uc = 'connexion'; //alors $uc prend la valeur 'connexion'
} elseif (empty($uc)) {//si $uc est vide, on affecte la valeur accueil à $uc
    $uc = 'accueil'; //=> on se connecte
}
switch ($uc) {
    case 'connexion':
        include 'controleurs/c_connexion.php'; //il faut lancer le fichier "c_connexion.php"
        break;
    case 'accueil'://sinon, si elle prend la valeur "accueil"
        include 'controleurs/c_accueil.php'; //il faut lancer le fichier "c_connexion.php"
        break;
    case 'preinscription':
        include'controleurs/c_preinscription.php'; //il faut lancer le fichier "c_connexion.php"
        break;

    case 'deconnexion':
        include 'controleurs/c_deconnexion.php';
        break;
}