# TPE_WEB2
Alquiler de vehiculos

## Nombre integrantes:
BREIJO, MICAELA JAZMÍN \
ALVAREZ, GUILLERMO NICOLAS

## Breve descripción:
Esta aplicación web permite a los usuarios alquilar vehículos de manera sencilla

## Estructura de la base de datos

La base de datos del proyecto esta compuesta por tres tablas principales
* Usuarios: contiene la informacion basica de los usuarios como nombre, email, telefono y un campo "tipo" para distinguir usuarios comunes de administradores
* Vehiculos: almacena detalles de los vehículos disponibles para alquiler, como marca, modelo, matricula, precio por dia y disponibilidad.
* Reservas: registra las reservas realizadas por los usuarios, incluyendo fechas de inicio, cantidad de dias, y los id's de usuario y vehiculo (llaves foraneas) que pertenecen a la reserva.

![Diagrama](https://github.com/GNicoDev/TPE-Web-2-/blob/main/diagrama%20de%20base%20de%20datos.jpg)
