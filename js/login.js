$(document).ready(function () {
    buttons();

});

function buttons(){
    //variable para saber que esta mostrando, true=signUp, false= signIn
    var signUpSingInstatus = false;
    $(".btnSignmbl").click(function () { 
        if (signUpSingInstatus==false) {
            $("#login").css("display","none");
            $("#signup").css("display","flex");
            signUpSingInstatus = true;
        }else {
            $("#signup").css("display","none");
            $("#login").css("display","flex");
            signUpSingInstatus = false;
        }

       
        
    });
}