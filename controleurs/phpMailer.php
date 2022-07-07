<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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
  
    
  }?>

