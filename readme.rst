###################
MANEJO DE ESTADOS DE USUARIOS
###################

El siguiente proyecto es una prueba de aplicación a el área de desarollo en OneLink, para el puesto de desarrollador

*******************
Informacion
*******************
El siguiente proyecto, está desarollado en su mayoria basado en el framework CodeIgniter, junto con un plugin de CodeIgniter llamado 
Grocery Crud  y el framework Bootstrap de Twitter.


*******************
Requerimientos
*******************

Una version de PHP 5.6 mayor es recomendada para su buen funcionamiento.
De igual manera, y por ende, se requiere un servidor web, ya sea apache o nginx, pero configurado para ejecutar nativamente codigo PHP.
La base de datos fue modelada nativamente en MariaDB, por lo tanto es adaptable a cualquier gestor de bases de datos.

************
Instalación
************
-La Instalacion del proyecto es sencilla.
Consta unicamente de clonar este repositorio en la carpeta raiz de su servidor web, dirigirse a la carpeta application, dentro de ella a la carpeta config, editar el archivo database.php de esta manera:
  en la seccion de configuraciones
    db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost', // Donde acá se especifica el url hacia el servidor de bases de datos
	'username' => 'root', // el usuario que se se conectará a la base de datos
	'password' => '', //la contraseña para autenticarse
	'database' => 'loggerOneLink', // la base de datos, disponible en este mismo repositorio como agentLogManagement.sql
	'dbdriver' => 'mysqli', // el driver de la base de datos
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
)

En el archivo config.php de la misma carpeta
$config['base_url'] = ''; especificar ahi el url estatico para acceder a recurso.

y estará configurada la app para iniciar su funcionamiento.

  *Se recomienda añadir los primeros usuarios a la base de datos, directamente desde el gestor de bases de datos que se utilize.
  

