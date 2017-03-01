/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var datosFormMateria = new Object();
var respuestForm = new Object();
function validateFormMateria(){
    datosFormMateria.txtNombre = document.getElementById("txtNombre").value;
    datosFormMateria.txtNumCup = document.getElementById("txtNumCup").value;
    datosFormMateria.descipArea = document.getElementById("descipArea").value;
    datosFormMateria.txtHorario = document.getElementById("txtHorario").value;
    datosFormMateria.txtProfesor = document.getElementById("txtProfesor").value;
    respuestForm.respuest = false;
    if(datosFormMateria.txtNombre==""){
        alert("Ingrese el nombre de la materia por favor");
        document.getElementById("txtNombre").focus();
        respuestFormEstudiante()();
    }
    else if(datosFormMateria.txtNumCup==0||datosFormMateria.txtNumCup==""){
        alert("Ingrese el número de cupos de la materia por favor");
        document.getElementById("txtNumCup").focus();
        respuestFormEstudiante()();
    }
    else if(datosFormMateria.descipArea==""){
        alert("Ingrese la descripción de la materia");
        document.getElementById("descipArea").focus();
        respuestFormEstudiante()();
    }
    else if(datosFormMateria.txtHorario==""){
        alert("Ingrese el horario de la materia por favor");
        document.getElementById("txtHorario").focus();
        respuestFormEstudiante()();
    }
    else if(datosFormMateria.txtProfesor==""){
        alert("Ingrese el nombre del profesor por favor");
        document.getElementById("txtProfesor").focus();
        respuestFormEstudiante()();
    }
    else{
        respuestForm.respuest = true;
        document.getElementById("hidValueForm").value = 1;
        respuestFormEstudiante()();
    }
}

function respuestFormEstudiante(){
    return respuestForm.respuest;
}

