<?php

class Reserva
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

    function getReservas()
    {
        try {

            $query = $this->db->prepare('SELECT * FROM reservas');
            $query->execute();

            $reservas = $query->fetchAll(PDO::FETCH_OBJ);
            return $reservas;
        } catch (PDOException $pe) {
            echo "Error al intentar acceder a los vehiculos. $pe";
        }
    }

    function getReservaById($id)
    {
        try {

            $query = $this->db->prepare('SELECT * FROM reservas WHERE id = ?');
            $query->execute([$id]);

            $reserva = $query->fetch(PDO::FETCH_OBJ);
            return $reserva;
        } catch (PDOException $pe) {
            echo "Error al intentar acceder al vehiculo con id $id. $pe";
        }
    }

    function getReservasByCar($id)
    {
        try {

            $query = $this->db->prepare('SELECT * FROM reservas WHERE id_vehiculo = ?');
            $query->execute([$id]);

            $reservas = $query->fetchAll(PDO::FETCH_OBJ);
            return $reservas;
        } catch (PDOException $pe) {
            echo "Error. $pe";
        }
    }


    function deleteReservaById($id)
    {

        $query = $this->db->prepare('DELETE FROM reservas WHERE id = ?');
        $query->execute([$id]);
    }

    function insertReserva($fecha, $cantDias, $idVehiculo)
    {

        $query = $this->db->prepare('INSERT INTO reservas(fecha_reserva,cant_dias,id_vehiculo) VALUES (?,?,?)');
        $query->execute([$fecha, $cantDias, $idVehiculo]);
    }

    function updateCar($id, $fecha, $cantDias, $idVehiculo)
    {

        $query = $this->db->prepare("UPDATE reservas SET  fecha_reserva = ?, cant_dias = ?, id_vehiculo = ? WHERE vehiculos.id = ?");
        $query->execute([$fecha, $cantDias, $idVehiculo, $id]);
        $reserva = $this->getReservaById($id);
        return $reserva;
    }
}
