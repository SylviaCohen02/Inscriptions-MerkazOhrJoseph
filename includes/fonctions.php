<?php

function estConnecte()
{
  return isset($_SESSION['idUtilisateur']) ;
}
   
function estAdminConnecte(){
   if (estConnecte()){//on fait un if sur estConnecte() et pas sur la variable idUtilisateur car
   return $_SESSION['statut']=='admin';//selon le statut on peut savoir si c un visiteur ou un comptable
 
   }
}

function estUtilisateurConnecte(){
  if (estConnecte()){// if (estConnecte()){
   return $_SESSION['statut']=='user';
   }
}

function deconnecter()
{
    session_destroy();
}


function ajouterErreur($msg)
{
    if (!isset($_REQUEST['erreurs'])) {
        $_REQUEST['erreurs'] = array();
    }
    $_REQUEST['erreurs'][] = $msg;
}

function connecter($idUtilisateur, $nom, $prenom, $statut)
{
        $_SESSION['idUtilisateur'] = $idUtilisateur;// la SESSION est une grde variable 'super globale' qui où on peut mettre plein de variables
        $_SESSION['nom'] = $nom;//on rentre le nom dans le tableau (de la bdd)
        $_SESSION['prenom'] = $prenom;
        $_SESSION['statut'] = $statut;
}