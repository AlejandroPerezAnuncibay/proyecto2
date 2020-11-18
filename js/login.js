$(document).ready(function () {
    buttonsChangeForm();
    checkUsernameEmail();
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
    var usernameRegex = new RegExp("^(?=[a-zA-Z0-9._-]{3,16}$)(?!.*[_.-]{2})[^_.-].*[^_.-]$");
    //TODO probar regex de contraseña, en el log in cambiar y no validar mas que longitud
    var passwordRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%&?¿!¡._-]).{8,64}$");
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
                throw "El nombre de usuario tiene un formato incorrecto";
            }
            if (passwordRegex.test(password)) {
                if (password!=$("#password2").val()){
                    throw "Las contraseñas no coinciden";
                }
            }else {
                throw "La contraseña debe contener 8 caracteres, una mayuscula, una minuscula, un numero y un caracter especial (@#$%&?¿!¡._-)";
            }
            var nombreRegex = new RegExp("^(([a-zA-Z ])?[a-zA-Z]*){1,3}$");
            if (!nombreRegex.test($("#nombre").val())) {
                throw "El nombre tiene un formato incorrectp";
            }
            var apellidoRegex = new RegExp("^(([a-zA-Z ])?[a-zA-Z]*){1,4}$");
            if (!apellidoRegex.test($("#apellido").val())) {
                throw "El apellido tiene un formato incorrecto";
            }
            var emailRgex = new RegExp("^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$");
            if (!emailRgex.test($("#email").val())){
                throw "El email tiene un formato incorrecto"
            }
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
function checkUsernameEmail(){
    $(".username").eq(1).on("input", function(){
        var tmp_username = $(".username").eq(1).val().trim();

        if (tmp_username!=""){
        $.ajax({
            type: "post",
            url: "../php/ajax.php",
            data: {action: "checkUsername", value: tmp_username},
            success: function (response) {
                alert(response);
            }
        });
    }
})
}