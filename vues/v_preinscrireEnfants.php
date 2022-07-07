
<?php
//afficher session user ds une balise HTML
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>euroforma</title>
        <link rel="stylesheet" href="style/style.css"/>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <img src="images/logo.jpg" alt="alt"/>
                <h1>Preinscriptions</h1>
            </div>

            <div class="actions2">
                <button class="" type="edit" name="todo" value="newUser" onclick="ouvrirPopUp()"> Créer un ouvel Utilisateur</button>
            </div>

            <fieldset>
                <?php
                foreach ($enfants as $enfant) {


                }
                ?>
                <div class="encadre">
                    <form action="preinscription.php" method="post">
                        <div class="input_area2">
                            <label><?php echo $enfant['id'] ?></label><!-- dans un tableau le nom et le prenom-->
                            <input type="hidden" name="id" value="<?php echo $enfant['id'] ?>">
                            <input type="text" name="nom" value="<?php echo $enfant['nom'] ?>">
                            <input type="text" name="prenom" value="<?php echo enfant['prenom'] ?>">

                            <label for='preinscrit'>oui</label>
                            <input type="hidden" name="id" value="<?php echo $enfant['id'] ?>">
                            <input type="checkbox" name="preinscrit[]" value="preinscrit">


                            <!-- Bouton radio pour les utilisateurs in/actifs 
                            
                                                            <fieldset>
<legend><b>Vos go&ucirc;ts</b></legend>
<input type="checkbox" name="gout[]" value="Tarte aux fraises &agrave; la cr&egrave;me d'amandes" />Tarte aux fraises &agrave; la cr&egrave;me d'amandes<br/>
<input type="checkbox" name="gout[]" value="Tarte aux prunes" />Tarte aux prunes<br />
<input type="checkbox" name="gout[]" value="Tarte rustique aux mirabelles de Lorraine" />Tarte rustique aux mirabelles de Lorraine<br />
<input type="checkbox" name="gout[]" value="Tarte noisettes et miel" />Tarte noisettes et miel<br />
<textarea name="gouts" placeholder="D&eacute;crivez vos go&ucirc;ts en d&eacute;tail" cols="50" rows="5"></textarea> <br />
</fieldset>
                            -->

                        </div>
                    </form>
                </div> 

                <?php ?>
            </fieldset>
        </div>

    </body>
</html>
