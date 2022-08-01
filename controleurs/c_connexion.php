<?php
/*
 * Sylvia COHEN
 * 
 */

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING); //$action change de valeur comme uc, mais on l'utilise dans les controleurs
if (!$action) {//si action est vide
    $action = 'demandeconnexion';
}

switch ($action) {
    case 'demandeConnexion':
        include 'vues/v_connexion.php';
        break;

    case 'valideConnexion':

        $login = $_POST['email'];
        $motDePasse = $_POST['motDePasse'];
       
        $user = $pdo->getInfosUtilisateur($login, $motDePasse); //on va dans la classe pdo gsb, la méthode getInfosVisiteur() ac en param le $login et le $mdp
        
     
        $admin = $pdo->getInfosAdmin($login, $motDePasse);

        $pattern = '/[\'\/~`\!@#$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
        $pattern2 = "~[A-Z]~";

        if (strlen($motDePasse) < 8) {
            ajouterErreur('mot de passe trop court, doit contenir au moins 8 caractères');
            include 'vues/v_erreurs.php';
            include 'vues/v_connexion.php';
        } else if (!preg_match($pattern, $motDePasse)) {
            ajouterErreur("au moins un caractère spécial");
            include 'vues/v_erreurs.php';
            include 'vues/v_connexion.php';
        } else if (!preg_match($pattern2, $motDePasse)) {
            ajouterErreur("au moins une majuscule");
            include 'vues/v_erreurs.php';
            include 'vues/v_connexion.php';
        } else if (!preg_match("~[a-z]~", $motDePasse)) {
            ajouterErreur("Au moins une minuscule");
            include 'vues/v_erreurs.php';
            include 'vues/v_connexion.php';
        } else if (!preg_match("~[0-9]~", $motDePasse)) {
            ajouterErreur("Au moins un chiffre");
            include 'vues/v_erreurs.php';
            include 'vues/v_connexion.php';
        } else if (empty($user) && empty($admin)) {//if(!is_array($user) && !is_array($admin)){
            ajouterErreur('Login ou mot de passe incorrect'); // cette phrase s'affiche
            include 'vues/v_erreurs.php';
            include 'vues/v_connexion.php';
        } else {
            $mdpHache = hash('sha256', $motDePasse);
          

            if (is_array($user)) {
                /* $_SESSION['idUtilisateur']= $user[0]['idUser'];
                  $_SESSION['nom'] = $user[0]['nomUser'];
                  $_SESSION['prenom'] = $user[0]['prenomUser'];
                  $_SESSION['statut'] = 'user'; */
                
                $idUtilisateur = $user[0]['idUser'];
                $nom = $user[0]['nomUser'];
                $prenom = $user[0]['prenomUser'];
                $statut = 'user'; 
               
            } elseif (is_array($admin)) {
                $idUtilisateur = $admin[0]['id'];
                $nom = $admin[0]['nom'];
                $prenom = $admin[0]['prenom'];
                $statut = 'admin';
            }
              //error_reporting(E_ALL); 
             connecter($idUtilisateur, $nom, $prenom, $statut);
             if($statut=='admin'){
            include'vues/v_accueilAdmin.php';
        }else{
            include'vues/v_accueil.php';
        }
             //var_dump($_SESSION['idUtilisateur']);
             
        }
        
       // ob_flush();
        //header('Location: index.php');   
         break;
         
    default:
        include 'vues/v_connexion.php';
        break;
     
       
        /* if($statut=='admin'){
            include'vues/v_accueilAdmin.php';
        }else{
            include'vues/v_accueil.php';
        }*/
        
        
}/*
        break;
    default:
        include 'vues/v_connexion.php';
        break;
}
      /*  if($statut=='admin'){
            include'vues/v_accueilAdmin.php';
        }else{
            include'vues/v_accueil.php';
        }/*
       header('Location: index.php'); //balise pr ns dire qu'on va retourner vers l'index
     
//if (!is_array($user) && !is_array($admin)) {
        //  echo 'Login ou mot de passe incorrect';
    

*/
?>





