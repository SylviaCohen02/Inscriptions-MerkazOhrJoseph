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
$estConnecte = estConnecte();

//require 'vues/v_navigation.php';
$uc = filter_input(INPUT_GET, 'uc', FILTER_SANITIZE_STRING);

if ($uc && !$estConnecte) {//si c'est pas connecté
    $uc = 'connexion';//alors $uc prend la valeur 'connexion'
} elseif (empty($uc)) {//si $uc est vide, on affecte la valeur accueil à $uc
    $uc = 'accueil';//=> on se connecte
}
switch ($uc) {
    case 'connexion':
    include 'controleurs/c_connexion.php';//il faut lancer le fichier "c_connexion.php"
    break;
case 'accueil'://sinon, si elle prend la valeur "accueil"
    include 'controleurs/c_accueil.php';
    break;
case 'preinscrireEnfants':
     include 'controleurs/c_accueil.php';
    break;

case 'deconnexion':
include 'controleurs/c_deconnexion.php';    
 break;
}
//require 'vues/v_piedDePage.php';//on lance le pied de page
