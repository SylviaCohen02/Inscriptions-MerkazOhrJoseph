<?php

/**
 * Description of pdoMojTest
 * Classe de test de la classe de fonctions pdoMoj
 * @author sylvia
 */
use PHPUnit\Framework\TestCase;

require_once '../includes/pdoMoj.php';
$bdd = pdoMoj::getBddMoj();

class pdoMojTest extends TestCase {

    public function testGetInfosEnfant() {
        $id = 2;
        $enfant = $bdd->getInfosEnfant($id);
        $this->assertNotNull($enfant['id']);
        $this->assertEquals("Yabra", $enfant['nom']);
        $this->assertEquals("Elie", $enfant['prenom']);
        $this->assertEquals("10", $enfant['age']);
        $this->assertEquals("Ner eliahou", $enfant["etablissementActuel"]);
        $this->assertEquals("cm1", $enfant['classe']);
    }

    public function testGetPreinscription() {
        $id = 3;
        $return = $bdd->getPreinscription($id);
        $this->assertNotNull($return['id']);
        $this->assertEquals(8, $return['idClasse']);
        $this->assertEquals(3, $return['idUser']);
        $this->assertEquals(4, $return['idEnfant']);
        $this->assertEquals("complet", $return['statutDossier']);
        $this->assertEquals("2022-02-15", $return["datePreinscription"]);
    }

    public function getInfosUtilisateur($email, $mdp) {
        if ($email == "dupontd@gmail.com" && $mdp == "erH23sj!!") {
            return 1;
        }
    }

    public function testGetInfosUtilisateur() {
        $this->assertEquals(1, $this->object->getInfosUtilisateur("dupontd@gmail.com", "erH23sj!!"));
    }

}
