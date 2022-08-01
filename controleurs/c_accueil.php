<?php
/**
 * @author    Sylvia Cohen
 */

if (estAdminConnecte()) {

    include 'vues/v_accueilAdmin.php';// on est redirigé vers la vue accueil
} else if(estUtilisateurConnecte()){// si elle est vide
        require_once 'vues/v_navigation.php';   
    include 'vues/v_accueil.php';// on va vers vue connexion
        }else{ 
                include 'vues/v_connexion.php'; 
}
 
