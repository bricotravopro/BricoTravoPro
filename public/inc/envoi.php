<?php
/**
 * Configuration del'envoi
 **/
$conf = array(
    'success' => 'Votre mail est bien envoyé !',
    'errname' => 'Vous devez entrer un nom',
    'errmail' => 'Vous devez entrer un email valide',
    'errobjet' => 'Vous devez choisir un objet',
    'errmessage' => 'Vous devez entrer un message',
    'to' => 'contact@bricotravopro.fr',
    'copie' => 'teddy@tdipointcom.fr',
    'subject' => '[TDI.com] Formulaire de contact',
    'message' => "
L'utilisateur nommé : %name% - %prenom% à essayer de vous contacter pour %objet%
Vous pourrez lui répondre par mail : %mail%
Voici le contenu de son message :
%message%
"
);
/**
 * Le code, ne pas toucher sauf si vous savez ce que vous faites
 **/
$d['errors'] = array();
// Vérification du nom
if(empty($_POST['name'])){
    $d['errors']['name'] = $conf['errname'];
}
// Vérification du prénom
if(empty($_POST['prenom'])){
    $d['errors']['prenom'] = $conf['errname'];
}
// Vérification de l'objet
if(empty($_POST['objet'])){
    $d['errors']['objet'] = $conf['errobjet'];
}
// Vérification du mail
if(empty($_POST['mail']) || !preg_match('#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#',$_POST['mail'])){
    $d['errors']['mail'] = $conf['errmail'];
}
// Vérification du message
if(empty($_POST['message'])){
    $d['errors']['message'] = $conf['errmessage'];
}
// Vérification de l url
if(!empty($_POST['url'])){
    $d['errors']['url'] = 'SPAAAAM';
}
// Vérification du message
if(empty($_POST['nospam'])){
    $d['errors']['nospam'] = 'SPAAAAAM';
}
// Si aucune erreur : envoi du mail
if(empty($d['errors'])){
    $d['errors'] = false;
    $mail = $_POST['mail'];
    $name = $_POST['name'];
    $prenom = $_POST['prenom'];
    $objet = $_POST['objet'];
    $message = $conf['message'];
    foreach($_POST as $k=>$v){
        $message = str_replace("%$k%",$v,$message);
    }
    $headers = 'From: ' . $mail . "\r\n";
    mail($conf['to'],$conf['subject'],$message,$headers);
    mail($conf['copie'],$conf['subject'],$message,$headers);
    $d['message'] = $conf['success'];
}
echo json_encode($d);