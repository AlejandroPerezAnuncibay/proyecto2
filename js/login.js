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
    //TODO probar regex de contraseña, en el log in cambiar y no validar mas que longitud
    var passwordRegex = new RegExp("^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,64}$");
    // ^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,64}$
    //segun desde que submit se llame a la funcion el type sera "login" o "signup"
    try {
        if (type == "login") {
            return true;
        } else {
            //signUp
            var username = $(".username").eq(1).val();
            var password = $(".password").eq(1).val();

            if (!usernameRegex.test(username)) {
                throw "El nombre de usuario no es valido";
            }
            if (passwordRegex.test(password)) {
                if (password!=$("#password2").val()){
                    throw "Las contraseñas no coinciden";
                }
            }else {
                alert(password);
                alert(passwordRegex.test(password));
                throw "La contraseña debe contener 8 caracteres, una mayuscula, una minuscula, un numero y un caracter especial (!@#$&)";
            }
            var nombreRegex = new RegExp("^(([a-zA-Z ])?[a-zA-Z]*){1,3}$");
            if (!nombreRegex.test($("#nombre").val())) {
                throw "El nombre no es valido";
            }
            var apellidoRegex = new RegExp("^(([a-zA-Z ])?[a-zA-Z]*){1,4}$");
            if (!apellidoRegex.test($("#apellido").val())) {
                throw "El apellido no es valido";
            }
            //el regex del email lo valida el html
            return true;
        }
    } catch (error) {
        alert(error);
        return false;
    }
}
function clearForms() {
    $("form")[0].reset();
    $("form")[1].reset();
}