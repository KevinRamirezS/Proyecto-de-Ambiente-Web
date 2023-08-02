<?php

class Cuenta{
    private $con;
    public function __construct($con){
        $this -> con = $con;
    }


    public function registrar($nombre, $correo, $clave){
        $success = $this->insertarDB($nombre, $correo, $clave);
        if($success){
            return true;
        }else {
            return false;
        }
    }


    private function insertarDB($nombre, $correo, $clave){
        $query = $this -> con -> prepare("INSERT INTO usuario (usuario, correo, clave) VALUES (:usuario, :correo, :clave)");

        $query -> bindParam(":usuario", $nombre);
        $query -> bindParam(":correo", $correo);
        $query -> bindParam(":clave", $clave);

        return $query->execute();
    }


    

    public function login($usuario, $clave){
        $query = $this -> con -> prepare("SELECT * FROM usuario WHERE usuario = :user");
        $query -> bindParam(":user", $usuario);
        $query -> execute();

        if($query->rowCount()=="1"){
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $passwordHashed = $row["clave"];


            if (password_verify($clave, $passwordHashed)) {
                return true;
            } else {
                return false;
            }
        } else {
        return false;
        }

    }

    
}


