<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pdoMojTest
 *
 * @author sylvi
 */
 use PHPUnit\Framework\TestCase;
     require_once '../includes/pdoMoj.php';
class pdoMojTest extends PHPUnit_Framework_TestCase {
   
    //put your code here
    protected $object;
    
    public function getInfosUtilisateur($email, $mdp){
       if($email=="dupontd@gmail.com" && $mdp=="zz"){
           return 1;
       }
    }
    
    public function testGetInfosUtilisateur()
    {
        $this->assertEquals(1,$this-> object-> getInfosUtilisateur("dupontd@gmail.com","zz"));
    }


}

