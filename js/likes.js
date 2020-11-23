$(document).ready(function () {
    likesPreguntas();
});
function likesPreguntas(){
    $(".like").click(function() {
        var idPregunta = $(".like").attr("id");
        $.ajax({
            type: "post",
            url: "../php/ajax.php",
            data: {action: "likePregunta", pregunta: idPregunta},
            success: function (response) {
                //response = 1 le ha dado like, response = 0 le ha quitado el like
                if (response==1){
                    $("#like"+idPregunta).css("color", "red");
                } else {
                    $("#like"+idPregunta).css("color", "black");
                }
            }
        });
        
    });
}