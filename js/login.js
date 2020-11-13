$(document).ready(function () {
    buttonsChangeForm();

});

function buttonsChangeForm() {
    //variable para saber que esta mostrando, true=signUp, false=logIn
    var signUpSingInstatus = false;
    $(".changeForm").click(function () {
        if (signUpSingInstatus == false) {
            //ocultar uno de los formularios y mostrar el otro
            $("#login").css("display", "none");
            $("#signup").css("display", "flex");
            signUpSingInstatus = true;

        } else {
            //ocultar uno de los formularios y mostrar el otro
            $("#signup").css("display", "none");
            $("#login").css("display", "flex");
            signUpSingInstatus = false;
        }
        //limpio los campos de los formularios
        clearForms();
    });
}
function validateForm(type) {
    //regex
    var usernameRegex = new RegExp("^(?=[a-zA-Z0-9._-]{3,30}$)(?!.*[_.-]{2})[^_.-].*[^_.-]$");
    var passwordRegex = new RegExp("^(?=.*[A-Z])(?=.*[!@#$&])(?=.*[0-9])(?=.*[a-z].*[a-z].*[a-z]).{8,64}$");

    var username = $(".username").val();
    var password = $(".password").val();
    //segun desde que submit se llame a la funcion el type sera "login" o "signup"
    try {
        if (type == "login") {
            //logIn
            
            if (usernameRegex.test(username) && passwordRegex.test(password)) {
                return true;
            } else {
                clearForms();
                throw "Invalid user or password";
            }
        } else {
            //signUp
            if (!usernameRegex.test(username)) {
                throw "El nombre de usuario no es valido";
            }
            if (passwordRegex.test(password)) {
                if (!password==$("#password2")){
                    throw "Las contraseñas no coinciden";
                }
            }else {
                throw "La contraseña debe contener 8 caracteres, una mayuscula, una minuscula, un numero y un caracter especial (!@#$&)";
            }
            var nombreRegex = new RegExp("^(([a-zA-Z ])?[a-zA-Z]*){1,3}$");
            if (!nombreRegex.test($("#nombre"))) {
                throw "El nombre no es valido";
            }
            var apellidoRegex = new RegExp("^(([a-zA-Z ])?[a-zA-Z]*){1,4}$");
            if (!apellidoRegex.test($("#apellido"))) {
                throw "El apellido no es valido";
            }
            var emailRegex = new RegExp("^(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$");
            if (!emailRegex.test($("#email"))) {
                throw "El email no es valido";
            }
            return true;
        }
    } catch (error) {
        
        return false;
    }
}
function clearForms() {
    $("form")[0].reset();
    $("form")[1].reset();
}