<?php
if($_SERVER['REQUEST_METHOD'] != 'POST' ){
    header("Location: index.html" );
}
/*
if( ! isset( $_POST['nombre'] ) ){
    header("Location: index.html" );
}
*/


$nombre = $_POST['nombre'];
$email = $_POST['email'];
$asunto =$_POST["asunto"];
$mensaje = $_POST['mensaje'];

if( empty(trim($nombre)) ) $nombre = 'anonimo';

$body = <<<HTML
    <h1>Contacto desde la web</h1>
    <p>De: $nombre / $email</p>
    <p>cel: $asunto</p>
    <h2>Mensaje</h2>
    $mensaje
HTML;

//sintaxis de los emails email@algo.com || 
// nombre <email@algo.com>

$headers = "MIME-Version: 1.0 \r\n";
$headers.= "Content-type: text/html; charset=utf-8 \r\n";
$headers.= "From: $nombre <$email> \r\n";
$headers.= "To: Sitio web <info@beenglisheducation.com> \r\n";
// $headers.= "Cc: copia@email.com \r\n";
// $headers.= "Bcc: copia-oculta@email.com \r\n";


//REMITENTE (NOMBRE/APELLIDO - EMAIL)
//ASUNTO 
//CUERPO 
$rta = mail('info@beenglisheducation.com', " $asunto", $body, $headers );
var_dump($rta);

//header("Location: gracias.html" );