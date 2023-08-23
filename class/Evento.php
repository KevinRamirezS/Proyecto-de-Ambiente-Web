<?php
include "Conexion.php";

class Evento extends Conexion
{
    // ATRIBUTOS
    private $codigo;
    private $nombre;
    private $descripcion;
    private $duracion;

    public function __construct($codigo, $nombre, $descripcion, $duracion)
    {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->duracion = $duracion;
    }

    // METODOS (CRUD)
    public function create()
    {
        $this->conectar();

        $query = "INSERT INTO evento (nombre, descripcion, duracion)" .
            "VALUES (?, ?, ?)";

        $prepare = mysqli_prepare($this->link, $query);

        // s => cadenas de texto
        // d => decimal
        // i => enteros
        // b => binarios

        $prepare->bind_param(
            "sss",
            $this->nombre,
            $this->descripcion,
            $this->duracion
        );


        if ($prepare->execute()) {
            $this->desconectar();
            return "Ok";
        }else{
            $this->desconectar();
            return "Error: " . $prepare->error;
        }
        
    }

    // METODOS READ [STATIC]

    public static function getAll()
    {
        $conexion = new Conexion();
        $conexion->conectar();

        $query = "SELECT * FROM evento";

        $prepare = mysqli_prepare($conexion->link, $query);
        $prepare->execute();

        $respuesta = $prepare->get_result();
        $dataArray = $respuesta->fetch_all();

        $eventos = [];

        foreach ($dataArray as $data) {
            $evento = new Evento($data[0], $data[1], $data[2], $data[3]);
            array_push($eventos, $evento);
        }

        return  $eventos;
    }


    // METODOS GET Y SET
    public function getCodigo(): int
    {
        return $this->codigo;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function getDuracion(): string
    {
        return $this->duracion;
    }

}
