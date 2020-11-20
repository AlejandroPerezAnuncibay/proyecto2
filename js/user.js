$(document).ready(function () {
    checkAvailability("Username");
    checkAvailability("Email");
});

document.getElementById('imagen').onchange = function () {
    var x = this.value;
    var y = x.split("\\");
    $("label[for=imagen]").text(y[y.length - 1]);

};

function checkAvailability(variable){
    var originalValue;
    var field;
    var input;
    var inputVal;
    var regex;
    var errorField;
    //defino variables segun se tenga que validar el username o el email
    switch (variable) {
        case "Username":
            field = "Username";
            input = $(".username");
            regex = new RegExp("^(?=[a-zA-Z0-9._-]{3,16}$)(?!.*[_.-]{2})[^_.-].*[^_.-]$");
            errorField = $("#errorUsername");
            originalValue = $(".username").eq(0).val().trim();
            break;
        case "Email":
            field = "Email";
            input = $("#email");
            regex =  new RegExp("^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$");
            errorField = $("#errorEmail");
            originalValue = $("#email").val().trim();
            break;
    }

    input.on("input", function Availability(){

        if (field=="Username"){
            inputVal = $(".username").eq(0).val().trim();
        }else{
            inputVal = $("#email").val().trim();
        }

        if (regex.test(inputVal) && originalValue!==inputVal){
            $.ajax({
                type: "post",
                url: "../php/ajax.php",
                data: {action: "check"+field, value: inputVal },
                success: function (response) {
                    //si devuelve 1 es que esta pillado si no devuelve nada es que no
                    if (response==1){
                        errorField.append(field+" no disponible.");
                        $("#submit").attr("disabled", true);
                        $(".check-"+field).css("display", "none");
                        $(".times-"+field).css("display", "inline");
                    } else {
                        errorField.empty();
                        $("#submit").attr("disabled", false);
                        $(".check-"+field).css("display", "inline");
                        $(".times-"+field).css("display", "none");
                    }
                }
            });
        } else {
            $("#submit").attr("disabled", true);
            $(".check-"+field).css("display", "none");
            $(".times-"+field).css("display", "none");
        }
    })

}
function regexPassword(password, password2){
    var passwordRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%&?¿!¡._-]).{8,64}$");
    if (passwordRegex.test(password)) {
        if (password !== password2) {
            throw "Las contraseñas no coinciden";
        } else {
            return true;
        }
    } else {

        throw "La contraseña debe contener 8 caracteres, una mayuscula, una minuscula, un numero y un caracter especial (@#$%&?¿!¡._-)";

    }
}
function validarCampos(){
    try {
//TODO regex de todos los campos
//https://stackoverflow.com/questions/43157936/javascript-import-function-syntax





    } catch (error){
        alert(error);
        return false;
    }
}
function validarContrasenas() {
    try {
        regexPassword($("#pass1").val(),$("#pass2").val());

        return true;

    } catch (error) {
        alert(error);
        return false;
    }
}