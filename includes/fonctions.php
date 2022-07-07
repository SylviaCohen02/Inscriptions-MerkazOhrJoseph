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
   if (estConnecte()){
   return $_SESSION['statut']=='utilisateur';
   }
}


function ajouterErreur($msg)
{
    if (!isset($_REQUEST['erreurs'])) {
        $_REQUEST['erreurs'] = array();
    }
    $_REQUEST['erreurs'][] = $msg;
}