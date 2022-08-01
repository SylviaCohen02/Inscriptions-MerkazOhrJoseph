<?php
/**
 * Description of pdoDb
 * @author sylvia
 */

include'connexionBdd.php';
class pdoMoj {

   
    private static $monPdo;
    private static $bddMoj = null;

    private function __construct() {
        pdoMoj::$monPdo = new PDO("mysql:host=".SERVERNAME.";"
                . "dbname=".DBNAME.";charset:utf8", USERNAME, PASSWORD);
    }

    
    
    public static function getBddMoj() {
        if (pdoMoj::$bddMoj == null) {
            pdoMoj::$bddMoj = new pdoMoj();
        }
        return pdoMoj::$bddMoj;
    }

    public function __destruct() {
        pdoMoj::$monPdo = null;
    }
    


 public function getInfosUtilisateur($email, $mdp)
    {
        $req = pdoMoj::$monPdo->prepare(
            'SELECT * FROM utilisateur WHERE email= :email AND motDePasse= 
                :motDePasse');
        $req->bindValue(':email', $email);
        $req->bindValue(':motDePasse', $mdp);
        $req->execute(); 
        return $req->fetchAll();
    }
    
     public function getInfosAdmin($email, $mdp)
    {
        $req =pdoMoj::$monPdo->prepare(
            'SELECT * FROM admin WHERE email= :email AND motDePasse= 
                :motDePasse');
        $req->bindValue(':email', $email);
        $req->bindValue(':motDePasse', $mdp);
        $req->execute(); 
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getPreinscriptions($annee){
         $req = pdoMoj::$monPdo->prepare(
           'SELECT * FROM preinscription WHERE YEAR(datePreinscription)= '
                . ':annee');
        $req->bindValue(':annee',$annee);    
         $req->execute();
        return $req->fetchAll();
    }
    
    public function getPreinscriptionsParStatutDossier($annee, $statutDossier){
        $req = pdoMoj::$monPdo->prepare(
            'SELECT * FROM preinscription WHERE SUBSTR(datePreinscription,0,3)= '
                . ':annee AND statut= :statutDossier');
        $req->bindValue(':annee',$annee); 
        $req->bindValue(':statutDossier',$statutDossier); 
         $req->execute();
        return $req->fetchAll();
    }
    
    public function reponsePreinscription($idPreinscris, $annee, $reponse){
        $req = pdoMoj::$monPdo->prepare(
            'UPDATE  preinscription SET reponse= :reponse WHERE annee= :annee AND 
                idPreinscris= :idPreinscris');
        $req->bindValue(':annee',$annee); 
        $req->bindValue(':idPreinscris',$idPreinscris);
        $req->bindValue(':reponse',$reponse); 
         $req->execute();
        return $req->fetchAll();
    }
    
    public function reponseDossierBourse($idUser, $reponse, $annee) {//bourse? ds une autre table?
       $req = pdoMoj::$monPdo->prepare(
            'UPDATE  bourse SET reponse= :reponse WHERE annee= :annee AND 
                idUser= :idUser');
        $req->bindValue(':annee',$annee); 
        $req->bindValue(':idUser', $idUser);
        $req->bindValue(':reponse',$reponse);   
         $req->execute();
        return $req->fetchAll();
    }
    
    public function anonymisePreinscription($idPreinscription, $idEnfant){
        $req = pdoMoj::$monPdo->prepare(//partout des zeros, a part l'id exemple 
           
        'UPDATE  preinscription SET idClasse=0, datePreinscription=null, statutDossier=null, reponse=null, idEnfant=0,
             WHERE idEnfant= :idEnfant 
                id= :idPreinscription');
          $req->bindValue(':idPreinscription',$idPreinscris);    
        $req->execute();
        return $req->fetchAll();
    }
    
     public function anonymiseEnfant($idEnfant){
        $req = pdoMoj::$monPdo->prepare(//partout des zeros, a part l'id exemple 
         'UPDATE  enfant SET nom=null, prenom=null, age=0,
                etablissementActuel=null, classe=null WHERE annee= :annee AND 
                id= :idPreinscription');    
     $req->bindValue(':idEnfant',$idEnfant);      
        $req->execute();
        return $req->fetchAll();
    
     }
     
    public function affirmeReceptionPaiement($idUser){
        
    }
    
    public function majStatutDossier($idUser){
        
        
    }
    public function getNbPreinscriptions($annee){
         $req = pdoMoj::$monPdo->prepare(
          'SELECT COUNT(*) FROM preinscription WHERE annee= :annee');
       $req->bindValue(':annee',$annee);  
        $req->execute();
        return $req->fetchAll();
    }
    
     public function getNbPreinscriptionsParClasse($annee, $idClasse){
         $req = pdoMoj::$monPdo->prepare(
          'SELECT COUNT(*) FROM preinscription JOIN classe ON '
                 . 'preinscription.idClasse= classe.id'
                 . ' WHERE YEAR(datePreinscription)= :annee AND classe= :classe');
       $req->bindValue(':annee',$annee);   
       $req->bindValue(':classe',$classe); 
        $req->execute();
        return $req->fetchAll();
    }
    
    //User
    public function getEnfants($idUser) {//select
    $req = pdoMoj::$monPdo->prepare(
            'SELECT * FROM enfant WHERE idUser= :idUser');
        $req->bindValue(':idUser',$idUser); 
         $req->execute();
        return $req->fetchAll();
    }
    

    //ferme preinscription ou pas? if date > 07/03/2022 par ex, alors qd clic 
    //valider, erreur trop tard

    public function modifInfosEnfant() {   //update
    }

    public function ajoutInfosFamille($nom, $prenom, $email,$adresse, $statut, $motDePasse, 
         $nomPere, $prenomPere, $nomMere, $prenomMere, $situation){
        $req = pdoMoj::$monPdo->prepare(
            'INSERT INTO utilisateur (nomUser, prenomUser, statut, nomPere, 
                prenomPere, nomMereJeuneFille, prenomMere, email, motDePasse, 
                adresse, situationFamille)
            VALUES (:nom, :prenom, :statut,  :nomPere, 
                :prenomPere, :nomMere, :prenomMere, :email, :motDePasse, :adresse, :situation)');
        
         $req->bindValue(':nom', $nom);
         $req->bindValue(':prenom', $prenom);
         $req->bindValue(':email', $email);
         $req->bindValue(':adresse', $adresse);
         $req->bindValue(':statut', $statut);
         $req->bindValue(':motDePasse', $motDePasse);
         $req->bindValue(':nomPere', $nomPere);
         $req->bindValue(':prenomPere', $prenomPere);
         $req->bindValue(':nomMere', $nomMere);
         $req->bindValue(':prenomMere', $prenomMere);
         $req->bindValue(':situation', $situation); 
         $req->execute();
        return $req->fetchAll();     
    }
    
    public function ajoutEnfant($nom, $prenom,$age, $etabActuel, $classe) { //insert  
    
        $req = pdoMoj::$monPdo->prepare(
            'INSERT INTO enfants (nom, prenom, age)
           VALUES (:nom, :prenom, :age, :etabActuel, :classe' 
        );
        $req->bindValue(':nom', $nom);
        $req->bindValue(':prenom', $prenom);
        $req->bindValue(':age', $age);
        $req->bindValue(':etabActuel', $etabActuel);
        $req->bindValue(':classe', $classe);
        $req->execute();
        return $req->fetchAll();
    }

    public function creePreinscription($idEnfant, $idUser, $inscription) {
        $req = pdoMoj::$monPdo->prepare(
            'INSERT INTO preinscription'
            . 'VALUES :idEnfant, :idUser, CURDATE()'  
        );
         $req->execute();
        return $req->fetchAll();
    }
 
    public function majModePaiment($idUser, $annee, $modePaiement){
         if($modePaiement=="prelevement"){  
        $req = pdoMoj::$monPdo->prepare(
                 'UPDATE  paiement SET prelevement= true AND cheque= false WHERE annee= :annee AND 
                idUser= :idUser');
                  }else{
                        $req = pdoMoj::$monPdo->prepare(
                       'UPDATE  paiement SET prelevement= false AND cheque= true WHERE annee= :annee AND 
                        idUser= :idUser');
                  } 
        $req->bindValue(':annee',$annee); 
        $req->bindValue(':idPreinscris',$idPreinscris); 
        $req->execute();
        return $req->fetchAll();
    }
    
    public function getNbEnfantsPreinscrisMoj($idUser){
         $req = pdoMoj::$monPdo->prepare(
            'SELECT COUNT(*) FROM preinscription JOIN enfant ON 
                preinscription.idEnfant=enfant.id WHERE 
                preinscription.idUser= :idUser AND enfant.id IN
                (SELECT preinscription.idEnfant FROM preinscription
                WHERE idUser= :idUser'); 
        $req->bindValue(':idUser',$idUser);   
        $req->execute();
        return $req->fetchAll();
    }
         public function anonymiseInfos($idEnfant){
        
        $req = pdoMoj::$monPdo->prepare(
                 'UPDATE enfant SET ');
            $req = pdoMoj::$monPdo->prepare(
       'UPDATE utilisateur SET ');
                        
                  
        $req->bindValue(':annee',$annee); 
        $req->bindValue(':idPreinscris',$idPreinscris); 
        $req->execute();
        return $req->fetchAll();
    }
}
