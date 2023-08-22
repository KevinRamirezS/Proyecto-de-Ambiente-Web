<?php
include "Conexion.php";

class Usuario extends Conexion
{
    // ATRIBUTOS
    protected $codigo;
    protected $usuario;
    protected $clave;

    public function __construct($codigo, $usuario, $clave)
    {
        $this->codigo = $codigo;
        $this->usuario = $usuario;
        $this->clave = $clave;
    }

    // METODOS PARA BASE DE DATOS (CRUD)

    public static function getByUserName($user_name) // Ana999
    {
        $conexion = new Conexion();
        $conexion->conectar();

        $query = "SELECT * FROM usuario WHERE usuario = ?";

        $prepare = mysqli_prepare($conexion->link,  $query);

        // s => cadenas de texto
        // d => decimal
        // i => enteros
        // b => binarios

        $prepare->bind_param("s", $user_name);
        $prepare->execute();


        $respuesta = $prepare->get_result();
        $dataArray = $respuesta->fetch_row();

        $conexion->desconectar();

        if (!empty($dataArray)) {
            return new Usuario($dataArray[0], $dataArray[1], $dataArray[2]);
        }

        return false;
    }

    public function create()
    {
        $this->conectar();

        $query = "INSERT INTO usuario (usuario, clave)" .
            "VALUES (?, ?)";

        $prepare = mysqli_prepare($this->link, $query);

        $prepare->bind_param(
            "ss",
            $this->usuario,
            $this->clave
        );

        if ($prepare->execute()) {
            $this->desconectar();
            return "Ok";
        } else {
            $this->desconectar();
            return "Error: " . $prepare->error;
        }
    }


















    // METODOS SET y GET
    public function getCodigo(): int
    {
        return $this->codigo;
    }

    public function getUsuario(): string
    {
        return $this->usuario;
    }

    public function getClave(): string
    {
        return $this->clave;
    }


}