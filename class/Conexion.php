<?php

class Conexion
{
    public $link;

    public function conectar(){
                                    // Host - usuario - password - base de datos
        $this->link = mysqli_connect("localhost", "root", "", "museos_db");
    }

    public function desconectar(){
        $this->link->close();
    }

}