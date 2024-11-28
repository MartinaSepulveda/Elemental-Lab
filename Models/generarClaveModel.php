<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require '../PHPMailer/Exception.php';
    require '../PHPMailer/PHPMailer.php';
    require '../PHPMailer/SMTP.php';

    class GenerarClave{

        public function enviarNuevaClave($identificacion, $email){
            $f = null;

            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            
            $consultar = "SELECT * FROM usuarios WHERE idUsuario=:identificacion AND correoUsuario=:email";
            $result = $conexion->prepare($consultar);

            $result->bindParam(":identificacion", $identificacion);
            $result->bindParam(":email", $email);

            $result->execute();

            $f = $result->fetch();

            if ($f) {
                // Generamos la nueva clave a partir de un codigo aleatorio
                $caracteres = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
                $longitud = 8;
                $newPass = substr(str_shuffle($caracteres),0,$longitud);                

                $claveMd = md5($newPass);

                $actualizarClave = "UPDATE usuarios SET claveUsuario=:claveMd WHERE idUsuario=:identificacion";
                $result = $conexion->prepare($actualizarClave);

                $result->bindParam(":identificacion", $identificacion);
                $result->bindParam(":claveMd", $claveMd);

                $result->execute();

                               
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'elementalPruebas12@gmail.com';                     //SMTP username
                    $mail->Password   = 'mnrsuhbgmuzomyjd';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    // Emisor
                    $mail->setFrom('elementalPruebas12@gmail.com', ' Soporte Elemental Lab');
                    // Receptor
                    $emailFor = $f['correoUsuario'];

                    $mail->addAddress($emailFor);     //Add a recipient
                    // $mail->addAddress('ellen@example.com');               //Name is optional
                    // $mail->addReplyTo('info@example.com', 'Information');
                    // $mail->addCC('cc@example.com');
                    // $mail->addBCC('bcc@example.com');

                    //Attachments
                    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                    //Content

                    // <h1 style="font-size:50px;color: #2396bd; text-align:center">Hola Usuario</h1>
                    // <p style="text-align:center; color: #999; font-size: 22px">Su nueva contraseña se ha generado éxitosamente, úsela para acceder al sistema</p>
                    // <p style="font-size: 60px; color:#2396bd; text-aling:center">'.$newPass.'</p>

                    $mail->isHTML(true);
                    $mail->CharSet = 'UTF-8';                                 //Set email format to HTML
                    $mail->Subject = 'REASIGNACIÓN DE CONTRASEÑA';
                    $mail->Body    = '
                    
                            <!DOCTYPE html>
                                <html lang="es">
                                <head>
                                    <meta charset="UTF-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                    <title>Recuperación de Contraseña</title>
                                </head>
                                <body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4; color: #333;">

                                    <!-- Header -->
                                    <table style="width: 100%; background-color: #548cba; padding: 20px; text-align: center;">
                                        <tr>
                                            <td>
                                                <img src="https://github.com/MartinaSepulveda/Elemental-Lab/blob/main/Views/assets/img/NombreLogoTransparente.png?raw=true" alt="Logo" style="max-width: 200px; height: auto;">
                                            </td>
                                        </tr>
                                    </table>

                                    <!-- Main Content -->
                                    <table style="width: 100%; max-width: 600px; margin: 20px auto; background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                                        <tr>
                                            <td style="text-align: center;">
                                                <h1 style="font-size: 28px; color: #056cc0;">Recuperación de Contraseña</h1>
                                                <img width="80%" style="margin:0 auto 30px" src="https://github.com/MartinaSepulveda/Elemental-Lab/blob/main/Views/assets/img/2151107460.jpg?raw=true">
                                                <p style="font-size: 16px; color: #333; margin: 20px 0;">
                                                    Hola, hemos generado una nueva contraseña para tu cuenta. Por favor, úsala para acceder al sistema. Te recomendamos cambiarla después de iniciar sesión.
                                                </p>
                                                <p style="font-size: 24px; font-weight: bold; color: #2a9d90cb; background-color: #f0f0f0; padding: 10px; border-radius: 5px; display: inline-block;">
                                                   '.$newPass.'
                                                </p>
                                                <p style="font-size: 14px; color: #777; margin-top: 20px;">
                                                    Si no solicitaste este cambio, ignora este correo o contacta a soporte.
                                                </p>
                                            </td>
                                        </tr>
                                    </table>

                                    <!-- Footer -->
                                    <table style="width: 100%; text-align: center; margin-top: 20px; padding: 10px;">
                                        <tr>
                                            <td style="font-size: 12px; color: #777;">
                                                © 2024 Elemental Lab. Todos los derechos reservados.
                                            </td>
                                        </tr>
                                    </table>

                                </body>
                                </html>

                    
                    ';
                    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                    echo '<script>alert("Se ha enviado una nueva clave a tu correo con la cual podrás acceder al sistema")</script>';
                    echo "<script> location.href='../Views/Login.html' </script>";
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }


            }
            else{

                $f = null;

                $objConexion = new Conexion;
                $conexion = $objConexion->get_conexion();
                
                $consultar = "SELECT * FROM veterinaria WHERE nitVeterinaria=:identificacion AND correoVeterinaria=:email";
                $result = $conexion->prepare($consultar);
    
                $result->bindParam(":identificacion", $identificacion);
                $result->bindParam(":email", $email);
    
                $result->execute();
    
                $f = $result->fetch();

                $caracteres = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
                $longitud = 8;
                $newPass = substr(str_shuffle($caracteres),0,$longitud);                

                $claveMd = md5($newPass);

                $actualizarClave = "UPDATE veterinaria SET claveVeterinaria=:claveMd WHERE nitVeterinaria=:identificacion";
                $result = $conexion->prepare($actualizarClave);

                $result->bindParam(":identificacion", $identificacion);
                $result->bindParam(":claveMd", $claveMd);

                $result->execute();

                               
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'elementalPruebas12@gmail.com';                     //SMTP username
                    $mail->Password   = 'mnrsuhbgmuzomyjd';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    // Emisor
                    $mail->setFrom('elementalPruebas12@gmail.com', 'Elemental Lab');
                    // Receptor
                    $emailFor = $f['correoVeterinaria'];

                    $mail->addAddress($emailFor);     //Add a recipient
                    // $mail->addAddress('ellen@example.com');               //Name is optional
                    // $mail->addReplyTo('info@example.com', 'Information');
                    // $mail->addCC('cc@example.com');
                    // $mail->addBCC('bcc@example.com');

                    //Attachments
                    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                    //Content
                    $mail->isHTML(true);
                    $mail->CharSet = 'UTF-8';                                 //Set email format to HTML
                    $mail->Subject = 'REASIGNACIÓN DE CONTRASEÑA';
                    $mail->Body    = '
                    
                    
                            <!DOCTYPE html>
                                <html lang="es">
                                <head>
                                    <meta charset="UTF-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                    <title>Recuperación de Contraseña</title>
                                </head>
                                <body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4; color: #333;">

                                    <!-- Header -->
                                    <table style="width: 100%; background-color: #548cba; padding: 20px; text-align: center;">
                                        <tr>
                                            <td>
                                                <img src="https://github.com/MartinaSepulveda/Elemental-Lab/blob/main/Views/assets/img/NombreLogoTransparente.png?raw=true" alt="Logo" style="max-width: 200px; height: auto;">
                                            </td>
                                        </tr>
                                    </table>

                                    <!-- Main Content -->
                                    <table style="width: 100%; max-width: 600px; margin: 20px auto; background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                                        <tr>
                                            <td style="text-align: center;">
                                                <h1 style="font-size: 28px; color: #056cc0;">Recuperación de Contraseña</h1>
                                                <img width="80%" style="margin:0 auto 30px" src="https://github.com/MartinaSepulveda/Elemental-Lab/blob/main/Views/assets/img/2151107460.jpg?raw=true">
                                                <p style="font-size: 16px; color: #333; margin: 20px 0;">
                                                    Hola, hemos generado una nueva contraseña para tu cuenta. Por favor, úsala para acceder al sistema. Te recomendamos cambiarla después de iniciar sesión.
                                                </p>
                                                <p style="font-size: 24px; font-weight: bold; color: #2a9d90cb; background-color: #f0f0f0; padding: 10px; border-radius: 5px; display: inline-block;">
                                                   '.$newPass.'
                                                </p>
                                                <p style="font-size: 14px; color: #777; margin-top: 20px;">
                                                    Si no solicitaste este cambio, ignora este correo o contacta a soporte.
                                                </p>
                                            </td>
                                        </tr>
                                    </table>

                                    <!-- Footer -->
                                    <table style="width: 100%; text-align: center; margin-top: 20px; padding: 10px;">
                                        <tr>
                                            <td style="font-size: 12px; color: #777;">
                                                © 2024 Elemental Lab. Todos los derechos reservados.
                                            </td>
                                        </tr>
                                    </table>

                                </body>
                                </html>

                    
                    ';
                    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                    echo '<script>alert("Mensaje Enviado")</script>';
                    echo "<script> location.href='../Views/Login.html' </script>";
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }


                // echo '<script>alert("Los datos de usuario no se encuentran en el sistema")</script>';
                // echo "<script> location.href='../Views/Extras/page-login.html' </script>";
            }

        }

    }

?>