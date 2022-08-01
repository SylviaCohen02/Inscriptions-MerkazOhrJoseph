
<?php
require_once 'includes/pdoMoj.php'; //fichier dont on a besoin une partie, fichier intégré ds ce fichier
//fichier qui contient des fonctions ac des requetes sql qui vont interagir dans la BDD					     
require 'vues/v_navigationInscription.php';

//session_start(); //methode qui va ouvrir la session => variable super globale, elle contient plusieurs variables du projet
$bdd = pdoMoj::getBddMoj(); //elle permet de connecter le code à la BDD PdoGsb. On appelle le résultat de la méthode getGsb() qui vient de la classe PdoGsb.
$nbPreinscriptions=$bdd->getNbPreinscriptionsParClasse('2022',8);
var_dump($nbPreinscriptions);
if (isset($_POST['valider2'])) {
     $nom= $_POST['nom'];
    $prenom =$_POST['prenom'];
    $age = $_POST['age'];
    $etab = $_POST['etab'];
    $classe = $_POST['classe'];
   // var_dump($nom, $prenom,$age, $etab, $classe);
    /*if((!empty($nom[2]))&&(!empty($prenom[2]))){
    var_dump($nom[2],  $prenom[2],  $age[2], $etab[2], $classe[2]);
    }else{
      var_dump($nom[0],  $prenom[0],  $age[0], $etab[0], $classe[0]);
    }*/
 //var_dump($nom);
    for($i=0; $i<=8; $i++){
        if((!empty($nom[$i]))&&(!empty($prenom[$i]))&&(!empty($age[$i]))&&(!empty($etab[$i]))){
            var_dump($nom[$i]);
         var_dump($prenom[$i]);
            var_dump($age[$i]);
            var_dump($etab[$i]);
            var_dump($classe[$i]);
            if($classe[$i]==""){
                $classe[$i]='null';
            }
         $bdd->ajoutEnfant($nom[$i], $prenom[$i], $age[$i], $etab[$i], $classe[$i]);
        }
    }
    
}
 
    
    //var_dump($nom, $prenom);
  //  $email = $_POST['email'];
    //$adresse = $_POST['adresse'];
    //$statut = $_POST['statut'];
    //$motDePasse = $_POST['motDePasse'];
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
    } else {

        //var_dump($aa);
        $mdpHache = hash('sha256', $motDePasse);
        var_dump($mdpHache);*/
   
    /*$nomPere = $_POST['nomP'];
    $prenomPere = $_POST['prenomP'];
    $nomMere = $_POST['nomM'];
    $prenomMere = $_POST['prenomM'];
    $situation = $_POST['situation'];

    $bdd->ajoutInfosFamille($nom, $prenom, $email, $adresse, $statut, $motDePasse,
            $nomPere, $prenomPere, $nomMere, $prenomMere, $situation);
    //header('Location: controleurs/conn.php') ;
}*/
//var_dump($statut, $motDePasse,$prenom, $email, $situation, $nomMere,$nomPere,$prenomPere);
// $nomP=$_POST['nomP'];
//$prenomP=$_POST['prenomP'];

/* $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $age = $_POST['age'];
  $etabActuel = $_POST['etabActuel'];
  var_dump($etabActuel);
  $bdd->ajoutEnfant($idUser, $nom, $prenom, $age, $etabActuel);
 */
?>