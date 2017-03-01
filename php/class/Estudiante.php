<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Estudiante
 *
 * @author juanfe
 */
class Estudiante {
    
    private $txtNombreEstudiante;
    private $txtApellidoEstudiante;
    private $txtCedulaEstudiante;
    private $txtCelularEstudiante;
    private $txtTelefonoestudiante;
    private $txtCorreoEstudiante;
    
    public function Estudiante($pNombre, $pApellido, $pCedula, $pCeular, $pTelefono, $pCorreo) {
        $this->txtNombreEstudiante = $pNombre;
        $this->txtApellidoEstudiante = $pApellido;
        $this->txtCedulaEstudiante = $pCedula;
        $this->txtCelularEstudiante = $pCeular;
        $this->txtTelefonoestudiante = $pTelefono;
        $this->txtCorreoEstudiante = $pCorreo;
    }
    
    
    public function insertEstudiante($ruta,$objEstudiante) {
        include_once($ruta.'DataBase.php');
        $conexion = new DataBase();
        $linkDb = $conexion->connectDataBase();
        $sqlInsert  = "INSERT INTO `dbUniversidad`.`tblEstudiante`
                            (`txtNombreEstudiante`,
                            `txtApellidoEstudiante`,
                            `txtCedulaEstudiante`,
                            `txtCelularEstudiante`,
                            `txtTelefonoestudiante`,
                            `txtCorreoEstudiante`)
                        VALUES
                            ('$objEstudiante->txtNombreEstudiante',
                            '$objEstudiante->txtApellidoEstudiante',
                            '$objEstudiante->txtCedulaEstudiante',
                            '$objEstudiante->txtCelularEstudiante',
                            '$objEstudiante->txtTelefonoestudiante',
                            '$objEstudiante->txtCorreoEstudiante');";
        $respuestInsertestudiante = mysql_query($sqlInsert);
        return $respuestInsertestudiante;
    }
    
}
