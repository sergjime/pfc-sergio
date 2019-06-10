# **Sistema de Gestión y Administración de contraseñas online**
**Índice**
- [Introducción](#id1)
- [Objetivos](#id2)
- [Descripción técnica](#id3)
- [Proceso de desarrollo](#id4)
- [Planificación y estimación temporal](#id5)
- [Materiales necesarios](#id6)
- [Despliegue](#id7)
- [Bibliografía y enlaces de interés](#id8)
## Introducción<a name="id1"></a>
En la actualidad, hay montones de aplicaciones web en las cuales nos registramos a diario (email, mensajería instantànea, foros, etc.). 

El problema que esto representa para el usuario es que ha de recordar el nombre de usuario más sus respectivas contraseñas de todo aquello a lo que se registra, terminando esto en un caos y un desastre para el usuario recordando tanta información.

Las ventaja que presenta, es la comodidad de recordar al usuario una sola contraseña para que éste pueda acceder a las demás.

Esta web permite gestionar y administrar los usuarios y contraseñas los cuales le introduzca un usuario registrado y logueado, permitiéndole recuperar el usuario y la contraseña que le haga falta.
## Objetivos<a name="id2"></a>
El objetivo de este proyecto es el facilitar la gestión de contraseñas.
La web contará de un sistema de login el cual permita a un usuario el loguearse en la web para permitirle el funcionamiento de la misma.
En principio existirá un solo usuario administrador con la posibilidad de crear más usuarios con dicho rol.

Todos los usuarios deberán tener un usuario y una contraseña para acceder a su respectiva cuenta y ser capaz de utilizar la aplicación.
Con el desarrollo de este proyecto se pretende facilitar el hecho de tener que recordar tantas contraseñas al mismo tiempo.

### HISTORIAS DE USUARIO
**Métodos funcionales**

    - Capaz de recordar contraseñas dadas y recordar los sitios.	
    - Esas contraseñas que las almacene encriptadas.
    - Que puedas iniciar sesión.	
    - Que recuerde las contraseñas guardadas.

**Métodos no funcionales**

    - Al registrarse por primera vez genera una contraseña.
    - La contraseña que genera la mande por email o SMS.
    - El administrador podrá monitorizar para saber cuantos usuarios están registrados y cuales de ellos están online.
    
## Descripción técnica<a name="id3"></a>
El proyecto consiste en la realización de una aplicación la cual permita guardar las contraseñas de los usuarios logeados.

1. Sistema de login de usuarios.
   - El administrador (admin) tendrá posibilidad de hacer CRUD a todos los usuarios registrados con todos sus sitios.
   - El usuario (user) sólo verá sus propios sitios. 
2. Contraseña generada al registrarse.
3. Envío de email con contraseña generada.
4. Encriptación de las contraseñas almacenadas.

Cuando un usuario se registra, se le generará usa contraseña aleatoria la cual se le enviará dicha contraseña mediante email. Dicha contraseña se almacenará encriptada en la base de datos.

Una vez dentro el usuario podrá añadir los sitios en los cuales se registra (Nombre del sitio, usuario con el que se registró, contraseña del sitio y url del sitio).

La aplicación web se conectará a una base de datos MySQL para realitzar varias acciones: consultar si el usuario que hace login existe en la base de datos, determinar qué rol tendrá este usuario.

![Modelo Relacional](https://rawcdn.githack.com/sergjime/images-pfc/295c23d12434cf2173144ac62d5f09fc1b02f644/relacional.png)
## Modelo de tres capas
En las 3 capas utilizaré PHP y MySQL, ya que ambos son gratuitos y se descargan desde la web o desde aplicaciones que podemos descargar desde la misma, como por ejemplo XAMPP, que instala PHP y MySQL juntos. Además de PHP hay muchísima documentación y tiene una interacción muy buena con HTML para crear sitios web de una forma sencilla.

Es fácil desplegar un proyecto en PHP porque dispones de paquetes totalmente autoinstalables que integran PHP: Apache y MySQL, tanto para UNIX (LAMPP), como para Windows (XAMPP).
### Capa de presentación <code>**Tecnologías usadas:** HTML, bootstrap 4, PHP, JavaScript</code>

    - Recoge la información del usuario y la envía al servidor
    - Manda información a la capa de proceso para su procesado
    - Recibe los resultados de la capa de proceso	
    - Generan la presentación	
    - Visualizan la presentación al usuario
    
### Capa de negocios <code>**Tecnologías usadas:** PHP</code>

    - Recibe la entrada de datos de la capa de presentación
    - Interactúa con la capa de datos para realizar operaciones
    - Manda los resultados procesados a la capa de presentación
    
### Capa de datos <code>**Tecnologías usadas:** MySQL</code>

    - Almacena los datos
    - Recupera datos
    - Mantiene los datos
    - Asegura la integridad de los datos
    
![Modelo de capas](https://rawcdn.githack.com/sergjime/images-pfc/295c23d12434cf2173144ac62d5f09fc1b02f644/capas.png)
## Diagrama de la aplicación
![Diagrama](https://rawcdn.githack.com/sergjime/images-pfc/9a5ff422c3d0a8a16956cf8d0135e747dd271274/proyecto/diagramaPFC.png)
## Estructura de la aplicación
- **config:** Aquí irán los ficheros de configuración de la base de datos, globales, constantes, etc.
- **css:** Aquí va el estilo de la aplicación.
- **images:** Aquí iran todos esos archivos los cuales son imágenes de la aplicación (también contiene un directorio con los avatares de los usuarios).
- **zona_privada:** Aquí está aquella zona en la cual sólo los usuarios logeados pueden acceder.
- **index.php:** Esta es la página principal de la aplicación.

![Estructura](https://rawcdn.githack.com/sergjime/images-pfc/9a5ff422c3d0a8a16956cf8d0135e747dd271274/proyecto/estructura.png)
## Proceso de desarrollo<a name="id4"></a>
### Metodología
La metodología a seguir sera la de Modelo de prototipo (perteneciente a los modelos de desarrollo evolutivo).

Es bastante frecuente que el producto de ingeniería desarrollado presente un buen rendimiento durante la fase de pruebas realizada por los ingenieros antes de entregarlo al cliente (pruebas que se realizarán normalmente con unos pocos registros en la base de datos o un único terminal conectado al sistema), pero que sea muy ineficiente, o incluso inviable, a la hora de almacenar o procesar el volumen real de información que debe manejar el cliente.

![Prototipado](https://rawcdn.githack.com/sergjime/images-pfc/295c23d12434cf2173144ac62d5f09fc1b02f644/prototipo.png)

En estos casos, la construcción de un prototipo de parte del sistema y la realización de pruebas de rendimiento, sirven para decidir, antes de empezar la fase de diseño, cuál es el modelo más adecuado de entre la gama disponible para el soporte hardware o cómo deben hacerse los accesos a la base de datos para obtener buenas respuestas en tiempo cuando la aplicación esté ya en funcionamiento.

¿Motivo? No hay ese riesgo de construir productos que no satisfagan las necesidades de los usuarios (Interfaz, funcionalidades, ...).

### Flujo de trabajo

![Flujo](https://rawcdn.githack.com/sergjime/images-pfc/295c23d12434cf2173144ac62d5f09fc1b02f644/flujo-trabajo.png)

- **Formación y búsqueda:** Se forma sobre los detalles de la o las tecnologías a aprender para la implementación del proyecto. También se harán unas búsquedas para obtener información ante cualquier duda.	
- **Análisis:** Se documentan y especifican los requisitos identificados. 		
- **Diseño:** Se selecciona la vista de cada funcionalidad, front y maquetación.	
- **Implementación:** En ella se implementará el código a seguir en este proyecto. En función del lenguaje o lenguajes utilizados se crearán las bibliotecas necesarias y componentes.
- **Pruebas:** Una vez tengamos una versión del proyecto se realizan una serie de 	pruebas a realizar para su correcto funcionamiento.
## Planificación y estimación temporal<a name="id5"></a>
### Planificación temporal
![Horas invertidas y coste](https://rawcdn.githack.com/sergjime/images-pfc/5596983e9ccc3b63d73ccbf462097139e8c8576c/proyecto/horasCoste.PNG)
### Diagrama de gantt
![]()
[Enlace al diagrama de gantt](https://rawcdn.githack.com/sergjime/images-pfc/5596983e9ccc3b63d73ccbf462097139e8c8576c/proyecto/GanttDefinitivo.pdf)
## Materiales necesarios<a name="id6"></a>
### HARDWARE
#### Materiales necesarios para el desarrollo
- Equipo con conexión a internet
    - Procesador: Intel Core i7.
    - Memoria Ram: 16GB de RAM.
    - Capacidad: Dos discos, uno de 120GB (C:) y otro de 1TB (D:).
### SOFTWARE
     - Sistema Operativo: Windows 10 Home.
     - Procesador de textos: LibreOffice Writer.
     
#### Materiales necesarios para el front
     SweetAlert2: Librería.
#### Materiales necesarios para el back
    XAMPP es un paquete de software libre que contiene:
           - Apache: Servidor web HTTP de código abierto.
           - MySQL: Sistema de gestión de bases de datos.
           - PHP: Lenguaje de programación.
           - Perl: Lenguaje de programación.
           
    API SMS: Api para el envio de mensajes SMS.
#### Sistema gestor de base de datos
    MariaDB es un sistema de gestión de bases de datos derivado de MySQL.
           - phpMyAdmin: Herramienta para la administración de MySQL.
           
![Materiales](https://rawcdn.githack.com/sergjime/images-pfc/15ba55cbbe2042099482b4d30803043d35a4d0a1/materiales.PNG)
## Despliegue<a name="id7"></a>
Para el despliegue he elegido subir dicha aplicación en un hosting (000webhost) y utilizar un cliente FTP (en mi caso filezilla client) para subir los ficheros a la misma (la estructura de la aplicación).

Freenom te ofrece un nombre de dominio totalmente gratuito y 000webhost un hosting gratuito el cual soporta PHP (que es el lenguaje de la aplicación) y es suficiente para poder desplegarla mediante un navegador.

![Clente FTP](https://rawcdn.githack.com/sergjime/images-pfc/295c23d12434cf2173144ac62d5f09fc1b02f644/despliegue.png)
Mediante un navegador web accederemos a la url del dominio para desplegar la app.

- **Nompre de dominio ->** key-site.online
- **Hosting ->** hostinger
- **Cliente FTP ->** FileZilla Client
## Bibliografía y enlaces de interés<a name="id8"></a>
http://php.net/manual/es/function.password-hash.php
-> Encriptación (Función password_hash).

http://php.net/manual/es/function.crypt.php
-> Encriptación (Función crypt).

https://mimentevuela.wordpress.com/2015/10/08/establecer-blowfish-como-salt-en-crypt-2/
-> Establecer Blowfish como salt en crypt().

https://www.microsiervos.com/archivo/seguridad/password-checkup-extension-proteccion-contrasenas-google.html
-> Password Checkup.

http://gamanet.pe/api-sms-envio-mensajes-texto/
-> API SMS para envio de mensajes de texto.

https://github.com/PHPMailer/PHPMailer
-> Enviar correos eléctrónicos (Librería PHPMailer).

https://es.wikipedia.org/wiki/Modelo_de_prototipos
-> Modelo de prototipos.


[Enlace al proyecto aquí](https://key-site.online)
