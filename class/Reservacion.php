<?php
include 'Conexion.php'; // Asegúrate de tener este archivo para la conexión a la base de datos

class Reservacion extends Conexion
{
    private $nombre;

    private $email;

    private $fecha;

    private $cantidad;

    public function __construct($nombre, $email, $fecha, $cantidad)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->fecha = $fecha;
        $this->cantidad = $cantidad;
    }

    //METODOS CRUD
    public function create()
    {
        $this->conectar();

        $query = "INSERT INTO reservar (nombre, email, fecha, cantidad)" .
            "VALUES (?, ?, ?, ?)";

        $prepare = mysqli_prepare($this->link, $query);

        $prepare->bind_param(
            "ssii",
            $this->nombre,
            $this->email,
            $this->fecha,
            $this->cantidad
        );

        if ($prepare->execute()) {
            $this->desconectar();
            return "Ok";
        } else {
            $this->desconectar();
            return "Error: " . $prepare->error;
        }
    }

    public function update()
    {
        $this->conectar();

        $query = "UPDATE reservar SET " .
            "nombre = ?," .
            "email = ?," .
            "fecha = ?," .
            "cantidad = ?," .
            "WHERE cantidad = ?";

        $prepare = mysqli_prepare($this->link, $query);

        $prepare->bind_param(
            "ssii",
            $this->nombre,
            $this->email,
            $this->fecha,
            $this->cantidad
        );

        if ($prepare->execute()) {
            $this->desconectar();
            return "Ok";
        } else {
            $this->desconectar();
            return "Error: " . $prepare->error;
        }
    }

    public function delete()
    {
        $this->conectar();

        $query = "DELETE FROM reservar WHERE email = ?";

        $prepare = mysqli_prepare($this->link, $query);

        $prepare->bind_param("i", $this->email);

        if ($prepare->execute()) {
            $this->desconectar();
            return "Ok";
        } else {
            $this->desconectar();
            return "Error: " . $prepare->error;
        }
    }

    public static function getAll()
    {
        $conexion = new Conexion();
        $conexion->conectar();

        $query = "SELECT * FROM reservar";

        $prepare = mysqli_prepare($conexion->link, $query);
        $prepare->execute();

        $respuesta = $prepare->get_result();
        $dataArray = $respuesta->fetch_all();

        $ordenes = [];

        foreach ($dataArray as $data) {
            $reservar = new Reservacion($data[0], $data[1], $data[2], $data[3]);
        }

        return  $reservar;
    }

}