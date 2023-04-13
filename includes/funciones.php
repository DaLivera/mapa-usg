<?php
session_start();
// Conexion con la base de datos
include("secur-usgmapa.php");
/*----------  SET DE FECHA Y HORA  ----------*/
$rutafinal = 'https://brandhubusg.com.mx/';
$anio_servidor = date("Y");
$mes_servidor = date("m");
$dia_hoy = date("d");
$hora_servidor = date("H");
$hora = date("B");
$ahora = date($anio_servidor . "-" . $mes_servidor . "-" . $dia_hoy);
$mes = array("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

$numeroResultados = 20;

/* ----------- CONFIG SMTP ---------------- */
$Host = 'ssl://smtp.dreamhost.com';
$Username = 'noreply@academiausg.com.mx';
$Password = 'N0r3pl7$2021';
$Port = 465;
$setFrom = 'noreply@academiausg.com.mx';
$setFromNombre = 'Academia USG';
$addReplyTo = 'noreply@academiausg.com.mx';
$addReplyToNombre = 'Academia USG';

function objetoSMTP($para, $paraNombre, $subjet, $Host, $Username, $Password, $Port, $setFrom, $setFromNombre, $addReplyTo, $addReplyToNombre, $codigohtmlfinal, $attachmentArchivo){
  //echo 'inicio de codigo<br>';
  require('phpmailer/src/Exception.php');
  require("phpmailer/src/PHPMailer.php");
  require("phpmailer/src/SMTP.php");
  //echo 'toma clases<br>';
  //use PHPMailer/PHPMailerPHPMailer;
  // Instantiation and passing `true` enables exceptions
  $mail = new PHPMailer(true); 
  //Server settings
  /**
   * Debug output level.
   * Options:
   * * self::DEBUG_OFF (`0`) No debug output, default
   * * self::DEBUG_CLIENT (`1`) Client commands
   * * self::DEBUG_SERVER (`2`) Client commands and server responses
   * * self::DEBUG_CONNECTION (`3`) As DEBUG_SERVER plus connection status
   * * self::DEBUG_LOWLEVEL (`4`) Low-level data output, all messages
   * @type integer
   */
  $mail->SMTPDebug = SMTP::DEBUG_OFF;                       // Enable verbose debug output
  $mail->isSMTP();                                            // Send using SMTP
  $mail->Host       = $Host;                    // Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
  $mail->Username   = $Username;                     // SMTP username
  $mail->Password   = $Password;                               // SMTP password
  $mail->SMTPSecure = 'ssl';         // Enable TLS encryption PHPMailer::ENCRYPTION_STARTTLS; `PHPMailer::ENCRYPTION_SMTPS` also accepted
  //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;    
  $mail->Port       = $Port;                                    // TCP port to connect to
  //echo 'config<br>';
  //Recipients
  $mail->setFrom($setFrom, $setFromNombre);
  $mail->addAddress($para, $paraNombre);     // Add a recipient
  //$mail->addAddress('ellen@example.com');               // Name is optional
  $mail->addReplyTo($addReplyTo, $addReplyToNombre);
  //$mail->addBCC($emailbcc, $emailbccNombre);
  // Attachments
  $mail->addAttachment($attachmentArchivo);         // Add attachments
  //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
  // Content
  $mail->isHTML(true);                                  // Set email format to HTML
  //echo 'Sets<br>';
  $mail->Subject = $subjet;
  $mail->Body    = $codigohtmlfinal;
  //echo $codigohtmlfinal;
  //$mail->Body    = 'Contenido de correo';
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  $mail->CharSet = 'UTF-8';
  //echo 'Previo<br>';
  if ($mail->send()) {
    //echo 'final de codigo<br>';
    //echo "<script>alert('Formulario Enviado');location.href ='index.html';</script>";
} else {
  //echo 'Error<br>';
  echo "<script>alert('Error al enviar el formulario');location.href ='javascript:history.back()';</script>";
}
  
  //$mail->ClearAddresses();
}

function objetoSMTPContacto($para, $paraNombre, $subjet, $Host, $Username, $Password, $Port, $setFrom, $setFromNombre, $addReplyTo, $addReplyToNombre, $codigohtmlfinal){
  //echo 'inicio de codigo<br>';
  require('phpmailer/src/Exception.php');
  require("phpmailer/src/PHPMailer.php");
  require("phpmailer/src/SMTP.php");
  //echo 'toma clases<br>';
  //use PHPMailer/PHPMailerPHPMailer;
  // Instantiation and passing `true` enables exceptions
  $mail = new PHPMailer(true); 
  //Server settings
  /**
   * Debug output level.
   * Options:
   * * self::DEBUG_OFF (`0`) No debug output, default
   * * self::DEBUG_CLIENT (`1`) Client commands
   * * self::DEBUG_SERVER (`2`) Client commands and server responses
   * * self::DEBUG_CONNECTION (`3`) As DEBUG_SERVER plus connection status
   * * self::DEBUG_LOWLEVEL (`4`) Low-level data output, all messages
   * @type integer
   */
  $mail->SMTPDebug = SMTP::DEBUG_OFF;                       // Enable verbose debug output
  $mail->isSMTP();                                            // Send using SMTP
  $mail->Host       = $Host;                    // Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
  $mail->Username   = $Username;                     // SMTP username
  $mail->Password   = $Password;                               // SMTP password
  $mail->SMTPSecure = 'ssl';         // Enable TLS encryption PHPMailer::ENCRYPTION_STARTTLS; `PHPMailer::ENCRYPTION_SMTPS` also accepted
  //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;    
  $mail->Port       = $Port;                                    // TCP port to connect to
  //echo 'config<br>';
  //Recipients
  $mail->setFrom($setFrom, $setFromNombre);
  $mail->addAddress($para, $paraNombre);     // Add a recipient
  //$mail->addAddress('ellen@example.com');               // Name is optional
  $mail->addReplyTo($addReplyTo, $addReplyToNombre);
  //$mail->addBCC($emailbcc, $emailbccNombre);
  // Attachments
  //$mail->addAttachment($attachmentArchivo);         // Add attachments
  //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
  // Content
  $mail->isHTML(true);                                  // Set email format to HTML
  //echo 'Sets<br>';
  $mail->Subject = $subjet;
  $mail->Body    = $codigohtmlfinal;
  //echo $codigohtmlfinal;
  //$mail->Body    = 'Contenido de correo';
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  $mail->CharSet = 'UTF-8';
  //echo 'Previo<br>';
  if ($mail->send()) {
    //echo 'final de codigo<br>';
    echo "<script>alert('Gracias por su mensaje, en breve nos contactaremos con usted');location.href ='index.php';</script>";
} else {
  //echo 'Error<br>';
  echo "<script>alert('Error al enviar el formulario');location.href ='javascript:history.back()';</script>";
}
  
  //$mail->ClearAddresses();
}

function estadosSelect($linkconx)
{
    $busca = mysqli_query($linkconx, "SELECT * FROM estados_electorales ORDER BY cve_edo ASC ");
    while ($info = mysqli_fetch_array($busca)) {
        echo '<option value="'.$info['cve_edo'].'">'.$info['estado'].'</option>';
    }
    //return $prestacion;
}
function nombreEstados($linkconx, $estado)
{
    $busca = mysqli_query($linkconx, "SELECT estado FROM estados_electorales WHERE cve_edo='$estado' ");
    $info = mysqli_fetch_array($busca);
    //echo $info['Name'];
    return $info['estado'];
}

//https://www.google.com/maps/place/Toluca+de+Lerdo,+Méx./@19.29419,-99.6663189,13z/data=!3m1!4b1!4m5!3m4!1s0x85cd89892a50ebb9:0xad3f4ad5550208c4!8m2!3d19.2826098!4d-99.6556653

//19.29419,-99.6663189

//19.2824352 -99.6736192
//19.2872608 -99.6813163
//19.2873791 -99.6241114
//19.2766272 -99.5823769

function localizacionSucursales($linkconx, $lat, $lng)
{
  $i=1;
    $busca = mysqli_query($linkconx, "SELECT nombre_sucursal, direccion, horario, telefono FROM sucursales ORDER BY id ASC ");
    while ($info = mysqli_fetch_array($busca)) {
        echo '<li>
                                <span>'.$i.'</span> '.$info['nombre_sucursal'].'
                                <p>
                                    '.$info['direccion'].'
                                </p>
                                <p>
                                    '.$info['horario'].'
                                </p>
                                <p>
                                    '.$info['telefono'].'
                                </p>
                            </li>';
        $i++;
    }
}

function localizacionSucursalestablas($linkconx)
{
  $i=1;
    $busca = mysqli_query($linkconx, "SELECT id, item, direccion, pais FROM sucursales ORDER BY id ASC LIMIT 10 OFFSET 0 ");
    while ($info = mysqli_fetch_array($busca)) {
        echo '<tr><td>'.$info['id'].'</td>
        <td>'.$info['item'].'</td>
                                <td><div id="latitude'.$i.'"></div></td>
                                <td><div id="longitude'.$i.'"></div></td>
                            </tr><script type="text/javascript">
                            setTimeout(function () {
          getLatLngByZipcode("'.$info['pais'].', '.$info['direccion'].'", "latitude'.$i.'", "longitude'.$i.'");
        }, 500);
        
    </script>';
        $i++;
    }
}

?>