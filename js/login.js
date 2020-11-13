$(document).ready(function () {
    buttonsChangeForm();

});

function buttonsChangeForm(){
    //variable para saber que esta mostrando, true=signUp, false= signIn
    var signUpSingInstatus = false;
    $(".changeForm").click(function () { 
        if (signUpSingInstatus==false) {
            //ocultar uno de los formularios y mostrar el otro
            $("#login").css("display","none");
            $("#signup").css("display","flex");
            signUpSingInstatus = true;

        }else {
            //ocultar uno de los formularios y mostrar el otro
            $("#signup").css("display","none");
            $("#login").css("display","flex");
            signUpSingInstatus = false;
        }
        //limpio los campos de los formularios
        $("form")[0].reset();
        $("form")[1].reset();
       
        
    });
}