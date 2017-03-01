<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Materia
 *
 * @author juanfe
 */
class Materia {
    
    private $nombreMateria;
    private $numCuposMateria;
    private $descripMateria;
    private $horarioMateria;
    private $profesorMateria;
    
    public function Materia($pNombre, $pNumCup, $pDescripMa, $phorario, $pProfesor) {
        
        $this->nombreMateria = $pNombre;
        $this->numCuposMateria = $pNumCup;
        $this->descripMateria = $pDescripMa;
        $this->horarioMateria = $phorario;
        $this->profesorMateria = $pProfesor;
        
    }
    
    public function insertMateria($ruta, $objMateria) {
        include_once($ruta.'DataBase.php');
        $conexion = new DataBase();
        $linkDb = $conexion->connectDataBase();
        $sqlInsertMateria = "INSERT INTO `tblMateria`
                                (`txtNombreMateria`,
                                `numCupMateria`,
                                `txtDescripMateria`,
                                `txtHorarioMateria`,
                                `txtProfesorMateria`)
                            VALUES
                                ('$objMateria->nombreMateria',
                                $objMateria->numCuposMateria,
                                '$objMateria->descripMateria',
                                '$objMateria->horarioMateria',
                                '$objMateria->profesorMateria');";
        $respuestInsert = mysql_query($sqlInsertMateria);
        return $respuestInsert;
        
    }
    
    public function getMaterias($ruta) {
        include_once($ruta.'DataBase.php');
        $conexion = new DataBase();
        $linkDb = $conexion->connectDataBase();
        $sqlSelectMateria = "SELECT 
                                idMateria,
                                txtNombreMateria,
                                numCupMateria,
                                txtDescripMateria,
                                txtHorarioMateria,
                                txtProfesorMateria
                            FROM 
                                tblMateria;";
        $respuestMaterias = mysql_query($sqlSelectMateria);
        return $respuestMaterias;
    }
    
    public function insertMatriculaMateria($ruta, $idMateria, $idEstudiante){
        include_once($ruta.'DataBase.php');
        $conexion = new DataBase();
        $linkDb = $conexion->connectDataBase();
        $sqlInsertMateriaEstudiante = "INSERT INTO `tblMateriasEstudiantes`
                                            (`idMateria`,
                                            `idEstudiante`)
                                        VALUES
                                            ($idMateria,
                                            $idEstudiante);";
        $respuestMateriaEstudiante = mysql_query($sqlInsertMateriaEstudiante);
        return $respuestMateriaEstudiante;
    }
    
    public function getMateriasEstudiante($ruta, $idEstudiante) {
        include_once($ruta.'DataBase.php');
        $conexion = new DataBase();
        $linkDb = $conexion->connectDataBase();
        $sqlSelect  = "SELECT 
                            tblMateria.idMateria,
                            tblMateria.txtNombreMateria,
                            tblMateria.numCupMateria,
                            tblMateria.txtDescripMateria,
                            tblMateria.txtHorarioMateria,
                            tblMateria.txtProfesorMateria
                        FROM
                                tblMateria
                                    INNER JOIN
                                tblMateriasEstudiantes ON tblMateria.idMateria = tblMateriasEstudiantes.idMateria
                                    INNER JOIN
                                 tblEstudiante ON tblMateriasEstudiantes.idEstudiante = tblEstudiante.idEstudiante
                        WHERE
                                tblMateriasEstudiantes.idEstudiante = $idEstudiante;";
        $respuestMateriaEstudiante = mysql_query($sqlSelect);
        return $respuestMateriaEstudiante;
    }
    
}
