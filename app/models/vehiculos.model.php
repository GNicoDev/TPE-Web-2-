<?php
include 'config.php';

class Vehiculos
{
    private $db;

    function __construct()
    {
        $this->db = $this->getConection();
    }


    private function getConection()
    {
        try {
            return new PDO("mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DB . ";charset=utf8", MYSQL_USER, MYSQL_PASS);
        } catch (PDOException $pe) {
            echo "No fue posible conectar con la base de datos. $pe";
        }
    }

    function getAllCars()
    {
        try {

            $query = $this->db->prepare('SELECT * FROM vehiculos');
            $query->execute();

            $cars = $query->fetchAll(PDO::FETCH_OBJ);
            return $cars;
        } catch (PDOException $pe) {
            echo "Error al intentar acceder a los vehiculos. $pe";
        }
    }

    function getCarById($id)
    {
        try {

            $query = $this->db->prepare('SELECT * FROM vehiculos WHERE id = ?');
            $query->execute([$id]);

            $car = $query->fetch(PDO::FETCH_OBJ);
            return $car;
        } catch (PDOException $pe) {
            echo "Error al intentar acceder al vehiculo con id $id. $pe";
        }
    }

    function getCarsByYear($year)
    {
        try {

            $query = $this->db->prepare('SELECT * FROM vehiculos WHERE modelo = ?');
            $query->execute([$year]);

            $cars = $query->fetchAll(PDO::FETCH_OBJ);
            return $cars;
        } catch (PDOException $pe) {
            echo "Error. $pe";
        }
    }


    function deleteCarById($id)
    {

        $query = $this->db->prepare('DELETE FROM vehiculos WHERE id = ?');
        $query->execute([$id]);
    }

    function insertCar($marca, $modelo, $matricula, $precio, $imagen)
    {

        $query = $this->db->prepare('INSERT INTO vehiculos(marca,modelo,matricula,precio_dia,imagen) VALUES (?,?,?,?,?)');
        $query->execute([$marca, $modelo, $matricula, $precio, $imagen]);
    }

    function updateCar($id, $marca, $modelo, $matricula, $precio, $imagen)
    {

        $query = $this->db->prepare("UPDATE vehiculos SET  marca = ?, modelo = ?, matricula = ?, precio_dia = ?, imagen = ? WHERE vehiculos.id = ?");
        $query->execute([$marca, $modelo, $matricula, $precio, $imagen, $id]);
        $vehiculo = $this->getCarById($id);
        return $vehiculo;
    }
}
