<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

deconnecter();
?>
<div class="alert alert-info" role="alert">
    <p>Vous avez bien été déconnecté ! <a href="index.php">Cliquez ici</a> <!--système d'ancre => adresse vers un autre fichier
        pour revenir à la page de connexion.</p>
</div>
<?php
header("Refresh: 3;URL=index.php");//url = redirection vers un autre fichier La on est redirigé vers la page index


