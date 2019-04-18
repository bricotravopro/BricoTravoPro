<?php
/**
 * CONFIGURATION DE L'envoi
 **/
$conf = array(
    'success' => 'Bravo : Votre pigeon s&#39;est bien envolé',
    'errname' => 'Vous devez entrer un nom',
    'errmail' => 'Vous devez entrer un email valide',
    'errobjet' => 'Attention ! Vous devez choisir un objet',
    'errmessage' => 'Vous devez entrer un message',
    'to' => 'teddy@tdipointcom.fr',
    'copie' => 'webmaster@tdipointcom.fr',
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
// On vérifie le nom
if(empty($_POST['name'])){
    $d['errors']['name'] = $conf['errname'];
}
// On vérifie le prenom
if(empty($_POST['prenom'])){
    $d['errors']['prenom'] = $conf['errname'];
}
// On vérifie l'objet
if(empty($_POST['objet'])){
    $d['errors']['objet'] = $conf['errobjet'];
}
// On vérifie le mail
if(empty($_POST['mail']) || !preg_match('#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#',$_POST['mail'])){
    $d['errors']['mail'] = $conf['errmail'];
}
// On vérifie le message
if(empty($_POST['message'])){
    $d['errors']['message'] = $conf['errmessage'];
}
// On vérifie l url
if(!empty($_POST['url'])){
    $d['errors']['url'] = 'SPAAAAM';
}
// On vérifie le message
if(empty($_POST['nospam'])){
    $d['errors']['nospam'] = 'SPAAAAAM';
}
// Si aucune erreur on envois le message
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