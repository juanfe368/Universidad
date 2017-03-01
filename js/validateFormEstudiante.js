/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var datosFormEstudiante = new Object();
var respuestForm = new Object();
function validateFormLogin(){
    datosFormEstudiante.txtNombre = document.getElementById("txtNombre").value;
    datosFormEstudiante.txtApellido = document.getElementById("txtApellido").value;
    datosFormEstudiante.txtCedula = document.getElementById("txtCedula").value;
    datosFormEstudiante.txtCelular = document.getElementById("txtCelular").value;
    datosFormEstudiante.txtTelefono = document.getElementById("txtTelefono").value;
    datosFormEstudiante.txtCorreo = document.getElementById("txtCorreo").value;
    respuestForm.respuest = false;
    if(datosFormEstudiante.txtNombre==""){
        alert("Ingrese el nombre del estudiante por favor");
        document.getElementById("txtNombre").focus();
        respuestFormEstudiante()();
    }
    else if(datosFormEstudiante.txtApellido==""){
        alert("Ingrese el apellido del estudiante por favor");
        document.getElementById("txtApellido").focus();
        respuestFormEstudiante()();
    }
    else if(datosFormEstudiante.txtCedula==""){
        alert("Ingrese la cedula del estudiante por favor");
        document.getElementById("txtCedula").focus();
        respuestFormEstudiante()();
    }
    else if(datosFormEstudiante.txtCelular==""){
        alert("Ingrese el celular del estudiante por favor");
        document.getElementById("txtCelular").focus();
        respuestFormEstudiante()();
    }
    else if(datosFormEstudiante.txtTelefono==""){
        alert("Ingrese el teléfono del estudiante por favor");
        document.getElementById("txtTelefono").focus();
        respuestFormEstudiante()();
    }
    else if(datosFormEstudiante.txtCorreo==""){
        alert("Ingrese el correo del estudiante por favor");
        document.getElementById("txtCorreo").focus();
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

