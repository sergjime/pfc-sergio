<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Conexiones {
    // Registra a un usuario en la base de datos
    function registrarUsuarios($nombre, $usuario, $apellido1, $apellido2, $email, $pass){
        try {
            require 'config/conexion.php';

            $stmt = $pdo->prepare("INSERT INTO usuarios(nombre, nick, password_login, apellido1, apellido2, rol_usuario, fecha_alta, email) 
            VALUES(:nom, :nick, :pass, :ape1, :ape2, :rol, NOW(), :email)");

            $stmt->bindValue(':nom', $nombre, PDO::PARAM_STR);
            $stmt->bindValue(':nick', $usuario, PDO::PARAM_STR);
            $stmt->bindValue(':pass', password_hash($pass, PASSWORD_DEFAULT), PDO::PARAM_STR);
            $stmt->bindValue(':ape1', $apellido1, PDO::PARAM_STR);
            $stmt->bindValue(':ape2', $apellido2, PDO::PARAM_STR);
            $stmt->bindValue(':rol', "user", PDO::PARAM_STR);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);

            $stmt->execute();

        } catch (Exception $e) {
            echo "Línea del error: " . $e->getLine() . "<br/>";
            echo $e->getMessage();
        } finally{
            $base = null;
        }
    }

    // Comprueba que el nombre de usuario y la contraseña introducidos existen en la base de datos y redirecciona según su rol
    function comprobarLogin($login, $password){
        try {
            require_once 'config/conexion.php';
            $sql="SELECT * FROM usuarios WHERE nick= :login";
            $contador = 0;
            $resultado=$pdo->prepare($sql);	
            $resultado->execute(array(":login"=>$login));
            
                require_once "FuncionesDatos.php";
                $funciones = new FuncionesDatos();
                $login = $_POST['usuario'];
                $password = $_POST['contrasenya'];
                $funciones->obtenerDatos($login, $password);
            
            while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                $rol = $registro['rol_usuario'];
                if (password_verify($password, $registro['password_login'])){
                    $contador++;
                }	
            }
            if ($contador > 0){
                if ($rol == 'admin'){
                    header("Location:zona_privada/admin");
                }else{
                    header("Location:zona_privada/user");
                }               
            }else{
                header("Location:index.php");
            }
            $resultado->closeCursor();
        }catch(Exception $e){
            die("Error: " . $e->getMessage());
        }
    }

    // Envía un mail
    function envioCorreo($usuario, $email, $pass){

        require 'src/Exception.php';
        require 'src/PHPMailer.php';
        require 'src/SMTP.php';
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = 'smtp.hostinger.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'sitioclave@key-site.online';                     // SMTP username
            $mail->Password   = 'Admingenius$$09';                               // SMTP password
            $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 465;                                    // TCP port to connect to
            //Recipients
            $mail->setFrom('sitioclave@key-site.online', 'Key-site');
            $mail->addAddress($email);     // Add a recipient
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Generación de contraseña';
            $mail->Body    = '<h1>Tu contraseña ha sido generada</h1><br><br>
            Sus datos para poder iniciar sesión en key-site son lon siguientes:
            <ul><li>Nombre de usuario: <strong>'.$usuario.'</strong></li><li>Contraseña: <strong>'.$pass.'</strong></li></ul>';
            $mail->CharSet = 'UTF-8';
            $mail->send();
            echo '<h2>Mensaje enviado con éxito</h2>';
        } catch (Exception $e) {
            echo "El mensaje NO ha sido enviado con éxito. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}

$clase = new Conexiones();
if ($_POST['oculto'] == 'registro'){
    $nombre = $_POST["nombre"];
    $usuario = $_POST["usu"];
    $apellido1 = $_POST["apellido1"];
    $apellido2 = $_POST["apellido2"];
    $email = $_POST["mail"];
    $pass = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@_"), 0, 10);
    $pass_cifrado = password_hash($pass, PASSWORD_DEFAULT);
    $clase->registrarUsuarios($nombre, $usuario, $apellido1, $apellido2, $email, $pass); // Llama a la función registrarUsuarios()
    $clase->envioCorreo($usuario, $email, $pass);
} elseif ($_POST['oculto'] == 'inicio'){
    $login = $_POST['usuario'];
    $password = $_POST['contrasenya'];
    $clase->comprobarLogin($login, $password); // Llama a la función comprobarLogin()
}

?>