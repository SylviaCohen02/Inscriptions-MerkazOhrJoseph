<?php

/* 
 * Sylvia COHEN
 * 
 */
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);//$action change de valeur comme uc, mais on l'utilise dans les controleurs
if (!$action) {//si action est vide
    $action = 'demandeconnexion';
}

switch ($action) {
case 'demandeConnexion':
    include 'vues/v_connexion.php';
    break;

case 'valideConnexion':
    $login =  $_POST['email'];
    $motDePasse = $_POST['motDePasse'];
   
    
   /*if (strlen($motDePasse) < 8) {
        echo'Mot de passe trop court, doit contenir au moins 8 '
        . 'caractères';
    } else if (!preg_match("~^[\w]+$~", $motDePasse)) {
        echo "Uniquement des lettres"
        . " ou des chiffres";
    } else if (!preg_match("~[A-Z]~", $motDePasse)) {
        echo "Au moins une "
        . "Majuscule!";
    } else if (!preg_match("~[0-9]~", $motDePasse)) {
        echo "Au moins un "
        . "chiffre!";
    } else {*/
        
     $mdpHache = hash('sha256', $motDePasse);
     $user = $pdo->getInfosUtilisateur($login, $motDePasse);//on va dans la classe pdo gsb, la méthode getInfosVisiteur() ac en param le $login et le $mdp
    $admin= $pdo-> getInfosAdmin ($login, $motDePasse);
    //var_dump($user);
    
    if (!is_array($user) && !is_array($admin)) {
        echo 'Login ou mot de passe incorrect';
    include 'vues/v_connexion.php';
    
    }else{ 
        if(!empty($user)){
             var_dump($user);
          
               $_SESSION['idUtilisateur']= $user[0]['idUser'];
               $_SESSION['nom'] = $user[0]['nomUser'];
               $_SESSION['prenom'] = $user[0]['prenomUser'];
               $_SESSION['statut'] = 'user';
            }
        elseif(is_array($admin))  {
                $_SESSION['idUtilisateur']= $admin[0]['id'];
                $_SESSION['nom'] = $admin[0]['nom'];
                $_SESSION['prenom'] = $admin[0]['prenom'];
                $_SESSION['statut'] = 'admin';
            }
       
        header('Location: index.php');
    }
    
    break;
default:
    include 'vues/v_connexion.php';
    break;
}


?>





