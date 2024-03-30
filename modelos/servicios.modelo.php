<?php

require_once "conexion.php";

class ModeloServicios
{
    /*=============================================
	CREAR SERVICIO
	=============================================*/

    static public function mdlIngresarServicio($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, precio) VALUES (:nombre, :precio)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    /*=============================================
	MOSTRAR SERVICIO
	=============================================*/

    static public function mdlMostrarServicios($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt-> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();

           /* $stmt = Conexion::conectar()->prepare("SELECT * FROM servicio WHERE idservicio = 8 ");

            $stmt->execute();

            return $stmt->fetch(); */

        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }

    static public function mdlMostrarDetalleServicios($item, $valor, $orden){

        $stmt = Conexion::conectar()->prepare("SELECT s.nombre, d.cantidad as cantidad, d.precio, (d.cantidad * d.precio) as total FROM detallepagoservicio d INNER JOIN servicio s ON d.idservicio = s.idservicio WHERE d.id_pagoservicio= :$item");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;

    }
    /*=============================================
	EDITAR SERVICIO
	=============================================*/

    static public function mdlEditarServicio($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, precio = :precio WHERE idservicio = :idservicio");

        $stmt->bindParam(":idservicio",$datos["idservicio"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);


        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    /*=============================================
	ACTUALIZAR SERVICIO
	=============================================*/

    static public function mdlActualizarServicio($tabla, $item1, $valor1, $item2, $valor2)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

        /*=============================================
        ELIMINAR SERVICIO
        =============================================*/

    static public function mdlBorrarServicio($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idservicio = :idservicio");

        $stmt->bindParam(":idservicio", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }
}
