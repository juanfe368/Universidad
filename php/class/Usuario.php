<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author juanfe
 */
class Usuario {
    //put your code here
    
    private $txtUsuario;
    private $txtPassWord;
    
    public function Usuario($pUsuario, $pPassword) {
        $this->txtUsuario = $pUsuario;
        $this->txtPassWord = $pPassword;
    }
    
    public function functionLogin($ruta, $objUsuario){
        include $ruta.'DataBase.php';
        $conexion = new DataBase();
        $linkDb = $conexion->connectDataBase();
        $txtUsuario = $objUsuario->txtUsuario;
        $respuest = false;
        $passWordMd5 = md5($objUsuario->txtPassWord);
        $sqlLogin = "SELECT 
                        *
                    FROM
                        tblUsuario
                    WHERE
                        txtNameUsuario = '$txtUsuario'
                            AND txtClaveUsuario = '$passWordMd5';";
        $respuesLogin = mysql_query($sqlLogin);
        if($respuesLogin){
            //session_start();
            $arrayLogin = mysql_fetch_assoc($respuesLogin);
            $_SESSION['id'] = $arrayLogin['idUsuario'];
            $_SESSION['tp'] = $arrayLogin['idTipoUsuario'];
        }
        if($_SESSION['id']!=''&&$_SESSION['tp']!=''){
            $respuest = true;
        }
        return $respuest;
    }
    
    public function insertUsuario($ruta, $idUsuario,$objUsuario){
        include_once($ruta.'DataBase.php');
        $conexion = new DataBase();
        $linkDb = $conexion->connectDataBase();
        $sqlInsertUsuario = "INSERT INTO `dbUniversidad`.`tblUsuario`
                                (`idUsuario`,
                                `txtNameUsuario`,
                                `txtClaveUsuario`,
                                `idTipoUsuario`)
                            VALUES
                                ($idUsuario,
                                '$objUsuario->txtUsuario',
                                '".md5($objUsuario->txtPassWord)."',
                                2);";
        $respuestUsuario = mysql_query($sqlInsertUsuario);
        return $respuestUsuario;
    }
    
    public function insertEstudianteUsuario($ruta, $objEstudiante, $objUsuario) {
        include_once $ruta.'DataBase.php';
        $conexion = new DataBase();
        $linkDb = $conexion->connectDataBase();
        //transaction
        mysql_query("SET AUTOCOMMIT=0");
        mysql_query("START TRANSACTION");
        $respuestEstudiante = $objEstudiante->insertEstudiante($ruta,$objEstudiante);
        $idEstudiante = mysql_insert_id();
        $respuestUsuario = $this->insertUsuario($ruta, $idEstudiante, $objUsuario);
        $respuestInsert = false;
        if($respuestEstudiante&&$respuestUsuario){
            mysql_query("COMMIT");
            mysql_query("SET AUTOCOMMIT=1");
            $respuestInsert = true;
        }
        else{
            mysql_query("ROLLBACK");
            mysql_query("SET AUTOCOMMIT=1");
        }
        return $respuestInsert;
        
    }
    
}
