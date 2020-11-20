
document.getElementById('imagen').onchange = function () {
    var x = this.value;
    var y = x.split("\\");
    $("label[for=imagen]").text(y[y.length - 1]);

};
function validarContrasenas() {
    try {



            regexPassword($("#pass1").val(),$("#pass2").val());

            return true;

    } catch (error) {
        alert(error);
        return false;
    }
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