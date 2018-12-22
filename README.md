# Plataforma-Virtual

Plataforma-Virtual es un sistema simple en el cual los estudiantes de un liceo tienen acceso de manere remota a las clases que imparta el profesor de la materia.

### Características

1. Inicio de sesion y crear cuenta.
2. Dos niveles de usario (profesor y alumno).
3. Publicaciones.
4. Comentarios.
5. Realizar pruebas (con la herramienta google form).
6. Manejo de Notas por materia.
7. Buscar y entrar a una clase.
8. Perfil del usuario.

### Herramientas Usadas

1. CodeIgniter en el lado del servidor. Para más información puedes ir a su [página](https://codeigniter.com/).
2. MDB (Material Design Bootstrap) para maquetar las vistas. https://mdbootstrap.com/
3. jQuery como complemento para MDB y realizar consultas ajax al servidor https://jquery.com/
4. MySQL como administrador de base de datos https://www.mysql.com/

### Instrucciones

Para poder usar el sistema es necesario que tengas instalado en tu equipo un servidor local, php y mysql. [WAMP](http://www.wampserver.com/en/) o [XAMPP](https://www.apachefriends.org/es/index.html) son excelentes herramientas que ya traen todo eso.

Descomprime la carpeta del proyecto en tu servidor local, en `C:\\xammp\htdocs\` si usas XAMPP, en `C:\\wamp\www\` si usas wamp, en el caso de linux es en `/var/www/html/` asegurate de que la carpeta tenga permisos de escritura, de no ser así puedes añadirlos con: `sudo chmod -R 777 /var/www/html`.

**Es muy importante que no le cambies el nombre a la carpeta ya que el proyecto no funcionaría** (Plataforma-Virtual).

Una vez tengas todo preparado, lo primero sería cambiarle los credenciales de acceso a la base de datos que trae, eso lo encuentras en el archivo database.php que se encuantra en `application/config/database.php` busca las lineas que correspondan con username y password y reemplaza su valor por tus credenciales de acceso.

En la raíz del proyecto hay un archivo `plataforma-virtual.sql` debes de importarlo a tu base de datos, no es necesario que crees una bd para importarlo, el archivo se encarga de eso por ti.

Ya con el archivo .sql importado a tu bd y los credenciales correctos, puedes ir al navegador y colocar en la barra de busqueda http://127.0.0.1/Plataforma-Virtual/ para visualizar el proyecto.