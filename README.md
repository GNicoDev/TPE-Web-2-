# TPE_WEB2
Alquiler de vehiculos

## Nombre integrante:
ALVAREZ, GUILLERMO NICOLAS

## Breve descripción:
Esta aplicación web permite a los usuarios alquilar vehículos de manera sencilla. El sitio web es de acceso publico con lo cual todos pueden navegar en el y solo usuarios administradores pueden loguearse para el manejo de la base de datos (CRUD). La intension, a medida que avance el proyecto, es que usuarios comunes tambien puedan loguearse con la posibilidad de alquilar vehiculos.

## Estructura de la DB y como cargarla

La base de datos del proyecto esta compuesta por tres tablas principales
* **Usuarios**: contiene la informacion basica de los usuarios como nombre, email, password, telefono y un campo "tipo" para distinguir usuarios comunes de administradores. Por el momento solo exite un solo usuario de tipo administrador para loguearse y manipular la base de datos: **email**: `web@admin.com` --- **password**: `admin`
* **Vehiculos**: almacena detalles de los vehículos disponibles para alquiler, como marca, modelo, matricula y precio por dia.
* **Reservas**: registra las reservas realizadas, incluyendo fechas de inicio, cantidad de dias, y el id del vehiculo (llave foranea) que pertenecen a la reserva.

Para cargar el sitio en un servidor web Apache, deberas tener instalado XAMPP (Puedes descargarlo [aquí](https://www.apachefriends.org/es/download.html)). Una vez instalado, deberas iniciarlo y correr el servidor Apache y Mysql. Luego tendras que importar la base de datos MYSQL que se encuentra en la carpeta Database del proyecto (alquilerautos.sql) [aqui](http://localhost/phpmyadmin/index.php).
El paso siguiente sera clonar el proyecto en la carpeta 'htdocs' del directorio de XAMMP y ejecutarlo desde el navegador.

## Diagrama E/R
![Diagrama](https://github.com/GNicoDev/TPE-Web-2-/blob/main/database/Diagrama%20E-R.jpeg)
