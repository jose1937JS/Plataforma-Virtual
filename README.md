# Plataforma-Virtual

### Instrucciones

Para poder usar el sistema es necesario que tengas instalado en tu equipo un servidor local, php y mysql. [WAMP](http://www.wampserver.com/en/) o [XAMPP](https://www.apachefriends.org/es/index.html) son excelentes herramientas que ya traen todo eso.

Descomprime la carpeta del proyecto en tu servidor local, en `C:\\xammp\htdocs\` si usas XAMPP, en `C:\\wamp\www\` si usas wamp, en el caso de linux es en `/var/www/html/` asegurate de que la carpeta tenga permisos de escritura, de no ser así puedes añadirlos con: `sudo chmod -R 777 /var/www/html`.

**Es muy importante que no le cambies el nombre a la carpeta ya que el proyecto no funcionaría** (Plataforma-Virtual)

Una vez tengas todo preparado, lo primero sería cambiarle los credenciales de acceso a la base de datos que trae, eso lo encuentras en el archivo database.php que se encuantra en `application/config/database.php` busca las lineas que correspondan con username y password y reemplaza su valor por tus credenciales de acceso.

En la raíz del proyecto hay un archivo `plataforma-virtual.sql` debes de importarlo a tu base de datos, no es necesario que crees una bd para importarlo, el archivo se encarga de eso por ti.

Ya con el archivo .sql importado a tu bd y los credenciales correctos, puedes ir al navegador y colocar en la barra de busqueda http://127.0.0.1/Plataforma-Virtual/ para visualizar el proyecto.