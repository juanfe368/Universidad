<?php
    session_start();
    if($_SESSION['id']==null||$_SESSION['id']==''){
        echo header('Location: ../index.php');
    }
    
    $rutaActual = dirname(__FILE__).'/../php/';
    if($_POST['hidValueForm']==1){
        include_once '../php/class/Materia.php';
        $materia = new Materia($_POST['txtNombre'], $_POST['txtNumCup'], $_POST['descipArea'], $_POST['txtHorario'], $_POST['txtProfesor']);
        $respuestMateria = $materia->insertMateria($rutaActual, $materia);
        if($respuestMateria){
            echo '<script>alert("Materia guardada");</script>';
            echo '<script>location.href="mainPag.php";</script>';
            exit;
        }
        else{
            echo '<script>alert("Ha ocurrido un problema en el servidor intentelo nuevamente");</script>';
        }
        
    }
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="../bootstrap/js/bootstrap.min.js">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../css/styleCerulean.css">
        <script type="text/javascript" src="../js/validateFormMateria.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand text-center" href="#">Universidad Nacional Abierta y a Distancia</a>
                  <a class="navbar-brand text-right" href="../php/process/exitSession.php">Cerrar Sesión</a>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="text-center">
                    <h2>Registrar Materia</h2>
                </div>
                <div class="col-lg-8 col-md-offset-2">
                    <form class="form-vertical" method="POST" onsubmit="return respuestFormEstudiante();" action="">
                        <div class="form-group">
                            <label class="control-label">Nombre:</label>
                            <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Nombre materia">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Número de cupos:</label>
                            <input type="number" class="form-control" id="txtNumCup" name="txtNumCup" placeholder="Número de cupos">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Descripción:</label>
                            <textarea class="form-control" rows="3" id="descipArea" name="descipArea" placeholder="Descripción de la materia"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Horario:</label>
                            <input type="text" class="form-control" id="txtHorario" name="txtHorario" placeholder="Horari materia">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Profesor:</label>
                            <input type="text" class="form-control" id="txtProfesor" name="txtProfesor" placeholder="Nombre profesor">
                        </div>
                        <div class="form-group text-right">
                            <a href="mainPag.php" class="btn">Cancelar</a>
                            <button type="reset" class="btn">Limpiar</button>
                            <button type="submit" class="btn btn-primary" onclick="validateFormMateria();">Guardar</button>
                        </div>
                        <input type="hidden" id="hidValueForm" name="hidValueForm" value="0">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
