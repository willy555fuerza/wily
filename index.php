<?php

require_once "controladores/plantilla.controlador.php";

require_once "controladores/usuarios.controlador.php";
require_once "controladores/servicios.controlador.php";
require_once "controladores/pacientes.controlador.php";


require_once "modelos/usuarios.modelo.php";
require_once "modelos/servicios.modelo.php";
require_once "modelos/pacientes.modelo.php";


$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();