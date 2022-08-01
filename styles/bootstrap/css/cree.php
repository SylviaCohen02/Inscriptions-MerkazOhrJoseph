
<?php
require_once '../includes/pdoMoj.php'; //fichier dont on a besoin une partie, fichier intégré ds ce fichier
//fichier qui contient des fonctions ac des requetes sql qui vont interagir dans la BDD					     
require '../vues/v_navigationInscription.php';

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


function envoyerMail($objet, $contenu, $destinataire) {  
// on crée une nouvelle instance de la classe
$mail = new PHPMailer(true);
  // puis on l’exécute avec un 'try/catch' qui teste les erreurs d'envoi
  try {
    /* DONNEES SERVEUR */
    #####################
    $mail->isSMTP();                                       // envoi avec le SMTP du serveur
    $mail->Host       = 'smtp.gmail.com';                  // serveur SMTP
    $mail->SMTPAuth   = true;                              // le serveur SMTP nécessite une authentification ("false" sinon)
    $mail->Username   = 'secretariat@merkazohrjoseph.fr';     // login SMTP
    $mail->Password   = 'infobachelor3619';                // Mot de passe SMTP
    $mail->SMTPSecure = 'ssl';                             // encodage des données TLS (ou juste 'tls') > "Aucun chiffrement des données"; sinon PHPMailer::ENCRYPTION_SMTPS (ou juste 'ssl')
    $mail->Port       = 465;                               // port TCP (ou 25, ou 465...)

    /* DONNEES DESTINATAIRES */
    ##########################
    $mail->setFrom('secretariat@merkazohrjoseph.fr', 'No-Reply');            //adresse de l'expéditeur (pas d'accents)
    $mail->addAddress($destinataire, 'Nom facultatif');        // Adresse du destinataire (le nom est facultatif)
   
    /* CONTENU DE L'EMAIL*/
    ##########################
    $mail->isHTML(true);                                      // email au format HTML
    $mail->Subject = utf8_decode($objet);                     // Objet du message (éviter les accents là, sauf si utf8_encode)
    $mail->Body    = $contenu;                                // corps du message en HTML - Mettre des slashes si apostrophes
    $mail->AltBody = 'Contenu au format texte pour les clients e-mails qiui ne le supportent pas'; // ajout facultatif de texte sans balises HTML (format texte)

    $mail->send();
    echo 'Message envoyé.';
  }
  // si le try ne marche pas > exception ici
  catch (Exception $e) {
    echo "Le Message n'a pas été envoyé. Mailer Error: {$mail->ErrorInfo}"; // Affiche l'erreur concernée le cas échéant
  
    
  }
}?>


?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width = device-width, initial-scale = 1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.98.0">
        <title>Checkout example · Bootstrap v5.2</title>
        <style>
           .couper{ word-wrap: break-word;}
            </style>
    <!-- Custom styles for this template -->

</head>
<body>

    <div class="container">
        <form action="index.php" method="post">
            <br><div class="row justify-content">
               <div class="col-md-7"> <h4> Coordonnées du représentant de l'enfant</h4>
                <br>
               </div></div>
            <div class="row row-cols-auto">
                
                 <div class="col">
                    <label for="firstName" class="form-label" >Nom</label>
                    <input type="text" class="form-control" id="firstName" name="nom" required>

                </div>
                 <div class="col">
                    <label for="firstName" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="firstName" name="prenom" required>

                </div>
                <div class="col">
                    <label for="firstName" class="form-label">Statut</label>
                    <input type="text" class="form-control" id="firstName" name="statut" placeholder="soeur, frère, mère..." required>
                </div>
                 <div class="col">
                    <label for="firstName" class="form-label">Email</label>
                    <input type="text" class="form-control" id="firstName" name="email" required>
                </div>
                <div class="col-3">
                    <label for="firstName" class="form-label">Adresse</label>
                    <input type="text" class="form-control" id="firstName" name="motDePasse" required>

                </div>
                
               
                
                
            </div><br><h4> Données de connexion</h4>
              <div class="row row-cols-auto">
                
               <div class="col">
                  
                    <label for="firstName" class="form-label" >Email</label>
                    <input type="text" class="form-control" id="firstName" name="nom" required>

                </div>
                   <div class="col">
                    <label for="firstName" class="form-label">Créer un mot de passe</label>
                    <input type="text" class="form-control" id="firstName" name="prenom" required>

                </div>
                     <div class="col">
                    <label for="firstName" class="form-label">Confirmer votre mot de passe</label>
                    <input type="text" class="form-control" id="firstName" name="prenom" required>

                </div>
                 
              </div>
            
                <br>
                <h4> Informations famille </h4>
                
                  <div class="row row-cols-auto">
                <div class="col">
                    <label for="firstName" class="form-label">Nom père</label>
                    <input type="text" class="form-control" id="firstName" name="nomP" required>

                </div>

                <div class="col">
                    <label for="firstName" class="form-label">Prénom père</label>
                    <input type="text" class="form-control" id="firstName" name="prenomP" required>

                </div>

                <div class="col">
                    <label for="firstName" class="form-label">Nom de jeune fille de la mère</label>
                    <input type="text" class="form-control" id="firstName" name="nomM" required>

                </div>

                <div class="col">
                    <label for="firstName" class="form-label">Prénom mère</label>
                    <input type="text" class="form-control" id="firstName" name="prenomM" required>

                </div>

                <div class="col">
                    <label for="firstName" class="form-label">Situation famille</label>
                    <input type="text" class="form-control" id="firstName" name="situation" required>
                    
                </div>
                      
                <div class="col-4">
                       <br><button class="btn btn-info" type="submit" name="valider">Valider</button>
                  </div><br>
                  </div>
           
            <div class="row">
            <div class="col-md-8">
             
                    
                     <div class="col-md-6">
                <br> <h4 class="text-small">Enfants  </h4>
                                     <table class="table border-info">
                    <thead>
                        
                        <tr class="table-warning">
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Age</th>
                            <th style="width:20px">Etablissement scolaire actuel ou profession</th>
                            <th style="width:20px">Classe actuelle (selon la situation) </th>
                        </tr>
                    </thead>  
                    <tbody>
                        <tr>
                            <td><input type="text" name="nom[]"  required></td>
                            <td> <input type="text" name="prenom[]""  id="firstName"  required></td>
                            <td><input type="text" name="age[]" id="firstName"  required></td>
                            <td> <input type="text" name="etab[]"  id="firstName" width=10" required></td>
                            <td><input type="text" name="classe[]" id="firstName"  ></td>
                        </tr>
 
<?php 
for($i=0;$i<=7;$i++)
{
?>
                        <tr>
                            <td><input class="floatingInput" type="text" name="nom[]"  ></td>
                            <td> <input type="text" name="prenom[]""  id="firstName"  ></td>
                            <td><input type="text" name="age[]" id="firstName"  ></td>
                            <td> <input type="text" name="etab[]"  id="firstName"  ></td>
                            <td><input type="text" name="classe[]" id="firstName"  ></td>
                        </tr>
 <?php
 }
 ?>
                    </tbody>  
                </table>
                      <div class="col-md-6">
                    <br><button class="btn btn-info" type="submit" name="valider2">Valider</button>

                </div>
           
            </div>
                

           
            

                </div>
                             
        </form>
    
    <footer><br><?php include '../vues/v_piedDePage.php'; ?>
    </footer>

</div>
</body>
</html>
