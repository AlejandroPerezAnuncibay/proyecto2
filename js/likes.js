$(document).ready(function () {
    var botonesLike = $(".like");
    for (x = 0; x<botonesLike.length;x++){
        botonesLike[x].addEventListener("click",likesPreguntas);
    }
    var botonesLikeRespuesta = $(".likeRespuesta");
    for (x = 0; x<botonesLikeRespuesta.length;x++){
        botonesLikeRespuesta[x].addEventListener("click",likesRespuestas);
    }
});
function likesPreguntas(){
        var idPregunta = this.id;
        $.ajax({
            type: "post",
            url: "../php/ajax.php",
            data: {action: "likePregunta", value: idPregunta},
            success: function (response) {
                //obtengo el numero de likes de la pregunta
                var numLikes = parseInt($("#contLikes"+idPregunta).text());
                //response = 1 le ha dado like, response = 0 le ha quitado el like
                if (response==1){
                    $("#like"+idPregunta).css("color", "red");
                    $("#contLikes"+idPregunta).empty();
                    $("#contLikes"+idPregunta).append(numLikes+1);
                } else {
                    $("#like"+idPregunta).css("color", "black");
                    $("#contLikes"+idPregunta).empty();
                    $("#contLikes"+idPregunta).append(numLikes-1);
                }
            }
        });
        
}
function likesRespuestas(){
    let variosIds = this.id;
    let arrayIds = variosIds.split("-");
    var idRespuesta = parseInt(arrayIds[0]);
    var idPregunta = parseInt(arrayIds[1]);
    alert(idRespuesta)
    $.ajax({
        type: "post",
        url: "../php/ajax.php",
        data: {action: "likeRespuesta", respuesta: idRespuesta, pregunta: idPregunta},
        success: function (response) {
            alert(response);
            if (response==1){
                $("#likeRespuesta"+idRespuesta).css("color", "red");
                // $("#contLikes"+idRespuesta).empty();
                // $("#contLikes"+idRespuesta).append(numLikes+1);
            } else {
                $("#likeRespuesta"+idRespuesta).css("color", "black");
                // $("#contLikes"+idRespuesta).empty();
                // $("#contLikes"+idRespuesta).append(numLikes-1);
            }
        }
    });


}