<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<?php
class Conexiones {
    // Registra a un usuario en la base de datos
    function registrarUsuarios($nombre, $avatar, $usuario, $apellido1, $apellido2, $email, $pass){
        try {
            require 'config/conexion.php';

            $stmt = $pdo->prepare("INSERT INTO usuarios(nombre, avatar, nick, password_login, apellido1, apellido2, rol_usuario, fecha_alta, email) 
            VALUES(:nom, :avatar, :nick, :pass, :ape1, :ape2, :rol, NOW(), :email)");

            $stmt->bindValue(':nom', $nombre, PDO::PARAM_STR);
            $stmt->bindValue(':avatar', $avatar['nombre'], PDO::PARAM_STR);
            $stmt->bindValue(':nick', $usuario, PDO::PARAM_STR);
            $stmt->bindValue(':pass', password_hash($pass, PASSWORD_DEFAULT), PDO::PARAM_STR);
            $stmt->bindValue(':ape1', $apellido1, PDO::PARAM_STR);
            $stmt->bindValue(':ape2', $apellido2, PDO::PARAM_STR);
            $stmt->bindValue(':rol', "user", PDO::PARAM_STR);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);

            $stmt->execute();

            if ($avatar['tamano'] <= 1000000){
                $tipo = substr($avatar['tipo'], 0, 5);
                if ($tipo == 'image'){
                    $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/images/avatars/';
                    move_uploaded_file($avatar['tmp'], $carpeta_destino . $usuario . '_'. $avatar['nombre']);
                }
            }

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

            while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                if (password_verify($password, $registro['password_login'])){
                    session_start();
                    $_SESSION['id_usuario'] = $registro['id_usuario'];
                    $_SESSION['nombre_usuario'] = $registro['nombre'];
                    $_SESSION['avatar'] = $registro['avatar'];
                    $_SESSION['usuario'] = $registro['nick'];
                    $_SESSION['password'] = $password;
                    $_SESSION['rol'] = $registro['rol_usuario'];
                    $_SESSION['fechaAlta'] = $registro['fecha_alta'];
                    $_SESSION['email'] = $registro['email'];
                    $contador++;
                }
            }

            if ($contador > 0){
                switch ($_SESSION['rol']) {
                    case "admin":
                        header("Location:inicio.php?rol=admin");
                        break;
                    case "user":
                        header("Location:inicio.php?rol=user");
                        break;
                }           
            }else{
                session_destroy();
                header("Location:index.php");
            }

            $resultado->closeCursor();
        }catch(Exception $e){
            die("Error: " . $e->getMessage());
        }
    }

    // Envía un mail
    function envioCorreo($usuario, $email, $pass){
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        //para el envío en formato HTML 
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        //dirección del remitente 
        $headers .= "From: Key-site <sitioclave@key-site.online>\r\n";  

        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $texto_mail = '
        <h1 style="text-align: center;">Tu contraseña ha sido generada</h1>
        <p style="text-align: center;">A continuación le damos los datos necesarios para iniciar sesión</p>
        <table border="1" style="margin: auto;">
            <tr>
                <td><strong>Usuario</strong></td>
                <td><strong>Contraseña</strong></td>
            </tr>
            <tr>
                <td>'. $usuario .'</td>
                <td>'. $pass .'</td>
            </tr>
        </table>';

        $asunto = 'Key-site';

        $exito = mail($email, $asunto, $texto_mail, $headers, 'Generación de contraseña');

        if ($exito){
            header("Location:index.php?registro=si");
        }else{
            header("Location:index.php?registro=no");
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
    $avatar = array(
        "nombre" => $_FILES["avatar"]['name'],
        "tipo" => $_FILES["avatar"]['type'],
        "tamano"   => $_FILES["avatar"]['size'],
        "tmp"  => $_FILES["avatar"]['tmp_name'],
    );
    $pass = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@_"), 0, 10);
    $clase->registrarUsuarios($nombre, $avatar, $usuario, $apellido1, $apellido2, $email, $pass); // Llama a la función registrarUsuarios()
    $clase->envioCorreo($usuario, $email, $pass);
} elseif ($_POST['oculto'] == 'inicio'){
    $login = $_POST['usuario'];
    $password = $_POST['contrasenya'];
    $clase->comprobarLogin($login, $password); // Llama a la función comprobarLogin()
}
?>