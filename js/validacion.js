
/////////////////////
//VALIDACION USUARIO
////////////////////

        function validar(){
            
            var nombre,apellido1,apellido2,cedula,correo,direccion,fnacimiento,contrasena1,contrasena2,expresion;
            
            nombre = document.getElementById("nombre").value;
            apellido1 = document.getElementById("apellido1").value;
            apellido2 = document.getElementById("apellido2").value;
            cedula = document.getElementById("cedula").value;
            correo = document.getElementById("email").value;
            direccion = document.getElementById("direccion").value;
            fnacimiento = document.getElementById("fechanacimiento").value;
            contrasena1 = document.getElementById("password").value;
            contrasena2 = document.getElementById("password2").value;
            
            if (nombre === ""){
                alert("Complete el campo nombre");
                return false;
            }
        }
