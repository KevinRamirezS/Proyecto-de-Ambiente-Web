<?php
include "Conexion.php";

class Reserva extends Conexion
{
    private $id;
    private $nombre;
    private $email;
    private $fecha;
    private $cantidad;

    public function __construct($id, $nombre, $email, $fecha, $cantidad)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->fecha = $fecha;
        $this->cantidad = $cantidad;
    }

    public function create()
{
    $this->conectar();

   /* if (empty($this->nombre)) {
        $this->desconectar();
        return "Error: El campo 'nombre' es obligatorio.";
    }
*/
    $query = "INSERT INTO reservas (nombre, email, fecha, cantidad) VALUES (?, ?, ?, ?)";

    $prepare = mysqli_prepare($this->link, $query);

    $prepare->bind_param(
        "sssi", 
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

        $query = "UPDATE reservas SET " .
            "nombre = ?," .
            "email = ?," .
            "fecha = ?," .
            "cantidad = ? " . 
            "WHERE id = ?";

        $prepare = mysqli_prepare($this->link, $query);

        $prepare->bind_param(
            "sssii",
            $this->nombre,
            $this->email,
            $this->fecha,
            $this->cantidad,
            $this->id
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

        $query = "DELETE FROM reservas WHERE id = ?";

        $prepare = mysqli_prepare($this->link, $query);

        $prepare->bind_param("i", $this->id);

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

        $query = "SELECT * FROM reservas";

        $prepare = mysqli_prepare($conexion->link, $query);
        $prepare->execute();

        $respuesta = $prepare->get_result();
        $dataArray = $respuesta->fetch_all(); 

        $reservas = [];

        foreach ($dataArray as $data) {
            $reserva = new Reserva($data[0], $data[1], $data[2], $data[3], $data[4]);
            array_push($reservas, $reserva);
        }

        return $reservas;
    }

    public static function getById($id)
    {
        $conexion = new Conexion();
        $conexion->conectar();

        $query = "SELECT * FROM reservas WHERE id = ?";

        $prepare = mysqli_prepare($conexion->link, $query);
        $prepare->bind_param("i", $id);
        $prepare->execute();

        $respuesta = $prepare->get_result();
        $dataArray = $respuesta->fetch_row();

        $conexion->desconectar();

        if (!empty($dataArray)) {
            return new Reserva($dataArray[0], $dataArray[1], $dataArray[2], $dataArray[3], $dataArray[4]);
        }

        return false;
    }

    public function getId(): int {
        return $this->id;
    }
    

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getFecha(): string // Cambié el tipo de retorno a string
    {
        return $this->fecha;
    }

    public function getCantidad(): int
    {
        return $this->cantidad;
    }

    public function accion($accion): string
    {
        if ($accion == "1") {
            return "";
        } else {
            return "disabled";
        }
    }
}
