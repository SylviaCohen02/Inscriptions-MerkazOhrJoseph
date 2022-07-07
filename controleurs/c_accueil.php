<?php
/**
 * @author    Sylvia Cohen
 */


echo'eeeeeeeeeeeeetttttttggcvjjjjjjjjjjjj';
if (estAdminConnecte()) {
    //require_once 'vues/v_navigation.php';
    include 'vues/v_accueilAdmin.php';// on est redirigé vers la vue accueil
} else if(estUtilisateurConnecte()){// si elle est vide
        include 'vues/v_accueil.php';// on va vers vue connexion
        }else{ 
                include 'vues/v_connexion.php'; 
}

